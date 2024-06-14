<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Entregas extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function acopios()
    {
        return $this->belongsTo('App\Models\Acopios');
    }
    public function detalles()
    {
        return $this->hasMany('App\Models\Detalles_entregas');
    }
    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }
    public static function generarCodigoUnico()
    {
        $codigo = Str::random(8); // Generar un código aleatorio de 8 caracteres

        // Verificar si el código ya existe en el modelo Entrega
        while (self::where('codigo', $codigo)->exists()) {
            // Si el código ya existe, generar otro código único
            $codigo = Str::random(8);
        }

        return $codigo;
    }
}
