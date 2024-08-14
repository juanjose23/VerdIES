<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Monedas extends Model
{
    use HasFactory;
    public function imagenes():MorphOne
    {
        return $this->morphOne(Media::class, 'imagenable');
    }
    public function transciones()
    {
        return $this->hasMany('App\Models\Transciones');
    }
    public function tasas()
    {
        return $this->hasMany('App\Models\Tasas');
    }
    public function puntos()
    {
        return $this->hasMany('App\Models\Puntos');
    }
    public function detalles()
    {
        return $this->hasMany('App\Models\Detalles_entregas');
    }
}
