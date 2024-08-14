<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;



class Materiales extends Model
{
    use HasFactory;
    public function categorias():BelongsTo
    {
        return $this->belongsTo(Categorias::class);
    }
    public function tasas():HasMany
    {
        return $this->hasMany(Tasas::class);
    }
    public function imagenes():MorphOne
    {
        return $this->morphOne(Media::class, 'imagenable');
    }

    public function detalles()
    {
        return $this->hasMany('App\Models\Detalles_entregas');
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

    public static function ObtenerCategorias()
    {
        $materialesEnTasas = Tasas::pluck('materiales_id')->toArray();

        // Obtener las categorías con materiales filtrados que no existen en Tasas
        $categorias = Categorias::where('estado', 1)
            ->with([
                'materiales' => function ($query) use ($materialesEnTasas) {
                    $query->whereIn('id', $materialesEnTasas);
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
