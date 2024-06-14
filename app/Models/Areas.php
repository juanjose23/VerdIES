<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;
    protected $table="area_conocimientos";
    public function carreras()
    {
        return $this->hasMany('App\Models\Carreras','area_conocimientos_id');
    }

    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }

}
