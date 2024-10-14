<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidades extends Model
{
    use HasFactory;
    
    public function detalles()
    {
        return $this->hasMany(DetalleUniversidad::class);
    }
   
    public function carreras()
    {
        return $this->hasMany('App\Models\Carreras','area_conocimientos_id');
    }

    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }

}
