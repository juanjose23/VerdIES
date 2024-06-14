<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_entregas extends Model
{
    use HasFactory;
    
    public function materiales()
    {
        return $this->belongsTo('App\Models\Materiales');
    }
    
    public function entregas()
    {
        return $this->belongsTo('App\Models\Entregas');
    }

    
    public function monedas()
    {
        return $this->belongsTo('App\Models\Monedas');
    }



}
