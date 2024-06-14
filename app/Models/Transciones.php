<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transciones extends Model
{
    use HasFactory;

    public function promociones()
    {
        return $this->belongsTo('App\Models\Promociones');
    }
    public function monedas()
    {
        return $this->belongsTo('App\Models\Monedas');
    }
    
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function obtenerHistorialTransaccionesPorUsuario($idUsuario)
{
    // Obtiene las transacciones para el usuario específico
    $transacciones = static::where('users_id', $idUsuario)
        ->with('monedas') // Carga la relación con las monedas
        ->get();

    // Inicializa el historial
    $historial = [];

    // Procesa cada transacción
    foreach ($transacciones as $transaccion) {
        $monedaNombre = $transaccion->monedas->nombre;
        $cantidadPuntos = $transaccion->puntos;

        // Si no existe la moneda en el historial, inicializa
        if (!isset($historial[$monedaNombre])) {
            $historial[$monedaNombre] = 0;
        }

        // Suma los puntos de la transacción a la moneda correspondiente
        $historial[$monedaNombre] += $cantidadPuntos;
    }

    return $historial;
}

    
}
