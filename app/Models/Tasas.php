<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasas extends Model
{
    use HasFactory;
    protected $table="tasa_cambios";

    public function materiales()
    {
        return $this->belongsTo('App\Models\Materiales');
    }

    public function monedas()
    {
        return $this->belongsTo('App\Models\Monedas');
    }
   
}
