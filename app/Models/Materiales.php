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
}
