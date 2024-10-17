<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Materiales extends Model
{
    use HasFactory;
    public function categorias()
    {
        return $this->belongsTo(Categorias::class);
    }
    public function tasas()
    {
        return $this->hasMany(Tasas::class);
    }
    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }

    public function detallesrecepciones()
    {
        return $this->hasMany(Detalles_Recepciones::class);
    }

    public function inventarios()
    {
        return $this->hasMany('App\Models\Inventarios');
    }
    public function material()
    {
        return $this->hasMany('App\Models\EntregaMaterial');
    }

    /**
     * Genera el código de un producto basado en la categoría.
     *
     * @param  \App\Models\Categorias  $categoria
     * @return string
     */
    public static function generarCodigoMaterial(Categorias $categoria)
    {
        // Obtener el prefijo del nombre de la categoría y convertirlo a slug
        $prefijo = Str::slug($categoria->nombre, '-');

        $ultimoProducto = self::where('categorias_id', $categoria->id)->orderBy('id', 'desc')->first();
        $siguienteId = $ultimoProducto ? $ultimoProducto->id + 1 : 1;

        // Generar el código del producto concatenando el prefijo y el ID
        return $prefijo . '-' . str_pad($siguienteId, 5, '0', STR_PAD_LEFT);
    }



    /**
     * 
     */
    public static function ObtenerCategoriasConMateriales()
    {
        $materialesEnTasas = Tasas::pluck('materiales_id')->toArray();

        // Obtener las categorías con materiales filtrados que no existen en Tasas
        $categorias = Categorias::where('estado', 1)
            ->with([
                'materiales' => function ($query) use ($materialesEnTasas) {
                    $query->whereNotIn('id', $materialesEnTasas);
                }
            ])
            ->get();


        $resultados = [];

        foreach ($categorias as $categoria) {
            $nombreCategoria = $categoria->nombre;

            if ($categoria->materiales !== null && $categoria->materiales->count() > 0) {
                foreach ($categoria->materiales as $material) {
                    $resultados[$nombreCategoria][] = [
                        'id' => $material->id,
                        'nombre' => $material->nombre
                    ];
                }
            }
        }

        return $resultados;
    }

    public static function ObtenerInventario()
    {
        // Obtener los inventarios agrupados por acopio, categoría y material, y sumar las cantidades
        $inventarios = Inventarios::select('id','acopios_id', 'materiales_id', 'cantidad as total_cantidad')
            ->where('estado', 1)
            ->where('cantidad', '>', 0)
            ->with(['acopios', 'materiales.categorias'])
            ->get();
    
        $resultados = [];
    
        // Agrupar los resultados
        foreach ($inventarios as $inventario) {
            $acopioNombre = $inventario->acopios->nombre;
            $categoriaNombre = $inventario->materiales->categorias->nombre;
            $materialNombre = $inventario->materiales->nombre;
    
            $resultados[$acopioNombre][$categoriaNombre][] = [
                'acopio'=> $inventario->acopios_id,
                'id' => $inventario->id,
                'id_materiales'=> $inventario->materiales->id,
                'nombre' => $materialNombre,
                'cantidad' => $inventario->total_cantidad,
            ];
        }
    
        return $resultados;
    }
    
}
