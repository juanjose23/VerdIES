<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleUniversidad extends Model
{
    use HasFactory;
    protected $table="detalleuniversidad";
    public function carreras()
    {
        return $this->belongsTo(Carreras::class, 'carreras_id');
    }
    public function areas()
    {
        return $this->belongsTo(Universidades::class,'universidades_id');
    }
    
}
