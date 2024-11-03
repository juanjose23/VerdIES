<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    use HasFactory;
    public function detalle()
    {
        return $this->hasMany(DetalleUniversidad::class);
    }
   
    public function user_carrera()
    {
        return $this->hasMany('App\Models\User_carreras', 'carreras_id');
    }
    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }
 
    

}
