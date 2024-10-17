<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasas extends Model
{
    use HasFactory;
    protected $table="tasa_cambios";
    protected $fillable = [
        'materiales_id', 
        'monedas_id', 
        'cantidad', 
        'cantidadlibra', 
        'estado',
    ];

    public function materiales()
    {
        return $this->belongsTo(Materiales::class);
    }

    public function monedas()
    {
        return $this->belongsTo(Monedas::class);
    }

    public static function calcularPuntosAcumulados($materialId, $cantidadRecolectada)
    {
        // Buscar la tasa activa para el material dado
        $tasaActiva = Tasas::where('materiales_id', $materialId)
            ->where('estado', 1)
            ->first();

        // Si no hay tasa activa, por defecto se asignan 5 monedas por entrega
        if (!$tasaActiva) {
            return 5; // O el valor que desees asignar por defecto
        }

        // Calcular la cantidad de puntos acumulados
        $puntosAcumulados = $cantidadRecolectada * $tasaActiva->cantidad;

        return $puntosAcumulados;
    }

    
   
}
