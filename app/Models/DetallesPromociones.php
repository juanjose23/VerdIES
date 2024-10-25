<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesPromociones extends Model
{
    use HasFactory;
    protected $table = 'detalle_promociones';

    public function promociones()
    {
        return $this->belongsTo('App\Models\Promociones');
    }

    public function monedas()
    {
        return $this->belongsTo('App\Models\Monedas');
    }
    
    // Para acceder a la relación con la moneda
    public function moneda()
    {
        return $this->belongsTo('App\Models\Monedas', 'monedas_id');
    }
}
