<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function detalles()
    {
        return $this->hasOne('App\Models\DetallesPromociones');
    }
    public function transciones()
    {
        return $this->hasMany('App\Models\Transciones');
    }
    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }
    public function detallePromociones()
    {
        return $this->hasMany('App\Models\DetallesPromociones', 'promociones_id');
    }
}
