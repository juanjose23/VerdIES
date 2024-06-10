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

    public function tasas()
    {
        return $this->hasMany('App\Models\Tasas');
    }
}
