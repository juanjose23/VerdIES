<?php

namespace App\Services;

use App\Models\Entregas;
use App\Models\Detalles_entregas;
use App\Models\Tasas;
use App\Models\Inventarios;
use App\Models\Puntos;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class EntregaMaterialService
{
    protected $EntregaModel;
    protected $DetalleEntregasModel;
    protected $TasaModel;
    protected $PuntosModel;

    public function __construct(Entregas $EntregaModel, Detalles_entregas $DetalleEntregasModel, Tasas $TasaModel, Puntos $PuntosModel)
    {
        $this->EntregaModel = $EntregaModel;
        $this->DetalleEntregasModel = $DetalleEntregasModel;
        $this->TasaModel = $TasaModel;
        $this->PuntosModel = $PuntosModel;
    }
    public function GenerarCodigoUnico()
    {
        do {
            // Generar un código aleatorio de 8 caracteres
            $codigo = Str::random(8);
        } while ($this->CodigoExiste($codigo));

        return $codigo;
    }

    protected function CodigoExiste($codigo)
    {
        // Verificar si el código ya existe en el modelo Entregas
        return $this->EntregaModel->where('codigo', $codigo)->exists();
    }

    public function CrearEntrega(array $data)
    {
        $entrega = $this->EntregaModel->newInstance();
        $codigo = $this->GenerarCodigoUnico();

        $entrega->users_id = $data['user_id'];
        $entrega->acopios_id = $data['acopios_id'];
        $entrega->codigo = $codigo;
        $entrega->nota = $data['nota'] ?? '';
        $entrega->estado = $data['estado'] ?? 2;
        $entrega->save();

        return $entrega;
    }

    public function ProcesarMateriales($entrega, array $materialesData)
    {
        foreach ($materialesData as $item) {
            // Verificar si $item es un array u objeto
            $materialId = is_array($item) ? $item['id'] : $item->id;
            $cantidad = is_array($item) ? $item['cantidad'] : $item->cantidad;

            // Obtener la tasa válida
            $tasa = $this->ObtenerTasaValida($materialId);




            if ($tasa) {
                $this->CrearDetalleEntrega($entrega, $materialId, $cantidad, $tasa);
                $this->ActualizarInventario($materialId, $cantidad, $entrega->acopios_id);
              $this->AcumularPuntos($entrega->users_id, $tasa, $cantidad);
            
            } else {
                Log::info('No se Encontro una Tasa Valida');
            }
        }
    }

    protected function ObtenerTasaValida($materialId)
    {
        $tasa = $this->TasaModel->where('materiales_id', $materialId)
            ->where('estado', 1)
            ->first();

        return $tasa;
    }


    protected function CrearDetalleEntrega($entrega, $materialId, $cantidad, $tasa)
    {
        $detalle = $this->DetalleEntregasModel->newInstance();
        $detalle->entregas_id = $entrega->id;
        $detalle->materiales_id = $materialId;
        $detalle->monedas_id = $tasa->monedas_id;
        $detalle->cantidad = $cantidad;
        $detalle->valor = $tasa->cantidad * $cantidad;
        $detalle->save();
    }

    protected function ActualizarInventario($materialId, $cantidad, $acopiosId)
    {
        $inventario = Inventarios::firstOrNew([
            'materiales_id' => $materialId,
            'acopios_id' => $acopiosId
        ]);

        if ($inventario->exists) {
            $inventario->cantidad += $cantidad;
        } else {
            $inventario->cantidad = $cantidad;
        }

        $inventario->estado = 1;
        $inventario->save();
    }

    protected function AcumularPuntos($userId, $tasa, $cantidad)
    {
        
        $punto = $this->PuntosModel->newInstance();
        $punto->users_id = $userId;
        $punto->monedas_id = $tasa->monedas_id;
        $punto->puntos = $tasa->cantidad * $cantidad;
        $punto->save();
    }




}
