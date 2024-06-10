<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Materiales extends Model
{
    use HasFactory;
    public function categorias()
    {
        return $this->belongsTo('App\Models\Categorias');
    }
    public function tasas()
    {
        return $this->hasMany('App\Models\Tasas');
    }
    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
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

}
