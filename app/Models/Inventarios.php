<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'acopios_id',
        'materiales_id',
        'cantidad',
        'estado',
    ];
    public function acopios()
    {
        return $this->belongsTo('App\Models\Acopios');
    }

    public function materiales()
    {
        return $this->belongsTo('App\Models\Materiales');
    }
    
}
