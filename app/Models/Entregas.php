<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Entregas extends Model
{
    use HasFactory;
    public function users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function acopios():BelongsTo
    {
        return $this->belongsTo(Acopios::class);
    }
    public function detalles():HasMany
    {
        return $this->hasMany(Detalles_entregas::class);
    }
    public function imagenes():MorphOne
    {
        return $this->morphOne(Media::class, 'imagenable');
    }
    

    public static function obtenerHistorialEntregasPorUsuario($idUsuario)
    {
        $entregas = static::where('users_id', $idUsuario)
            ->with(['acopios', 'detalles.monedas'])
            ->get();

        $historial = [];

        foreach ($entregas as $entrega) {
            $monedasPorEntrega = [];

            foreach ($entrega->detalles as $detalle) {
                $tipoMoneda = $detalle->monedas->nombre;
                $cantidad = $detalle->cantidad;
                $valor = $detalle->valor;

                if (!isset($monedasPorEntrega[$tipoMoneda])) {
                    $monedasPorEntrega[$tipoMoneda] = 0;
                }

                $monedasPorEntrega[$tipoMoneda] += $cantidad * $valor;
            }

            $historial[] = [
                'acopio' => $entrega->acopios->nombre,
                'fecha' => $entrega->created_at,
                'monedas' => $monedasPorEntrega
            ];
        }

        return $historial;
    }
}
