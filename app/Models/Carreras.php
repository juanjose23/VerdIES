<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    use HasFactory;
    public function areas()
    {
        return $this->belongsTo('App\Models\Areas','area_conocimientos_id');
    }
    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }

}
