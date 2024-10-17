<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalles_Recepciones extends Model
{
    //
    protected $table ="detalles_recepciones";
    public function materiales()
    {
        return $this->belongsTo(Materiales::class);
    }
    
    public function recepciones()
    {
        return $this->belongsTo(Recepciones::class);
    }

    
    public function monedas()
    {
        return $this->belongsTo(Monedas::class);
    }
}
