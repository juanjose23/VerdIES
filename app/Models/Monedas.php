<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monedas extends Model
{
    use HasFactory;
    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }
    public function transciones()
    {
        return $this->hasMany('App\Models\Transciones');
    }
    public function tasas()
    {
        return $this->hasMany(Tasas::class);
    }
    public function puntos()
    {
        return $this->hasMany(Puntos::class);
    }
    public function detalles()
    {
        return $this->hasMany(Detalles_Recepciones::class);
    }
}
