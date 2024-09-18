<?php

namespace App\Services;

use App\Models\Entregas;
use App\Models\Detalles_entregas;
use App\Models\Tasas;
use App\Models\Inventarios;
use App\Models\Puntos;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class RecepcionMaterialesService
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
    public function ActualizarMateriales($entrega, array $materialesInfo)
    {
        foreach ($materialesInfo as $item) {
            // Verificar si $item es un array u objeto
            $materialId = is_array($item) ? $item['id'] : $item->id;
            $cantidad = is_array($item) ? $item['cantidad'] : $item->cantidad;
            // Obtener la tasa válida
            $tasa = $this->ObtenerTasaValida($materialId);
            if ($tasa) {
                $this->ActualizarDetalleEntrega($entrega->id, $materialId, $cantidad, $tasa);
                $this->ActualizarInventario($materialId, $cantidad, $entrega->acopios_id);
                $this->AcumularPuntos($entrega->users_id, $tasa, $cantidad);
            } else {
                Log::info('No se Encontro ');
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
    protected function ActualizarDetalleEntrega($entregaId, $materialId, $nuevaCantidad, $tasa)
    {
        // Buscar el detalle de entrega existente
        $detalle = $this->DetalleEntregasModel->where('entregas_id', $entregaId)
            ->where('materiales_id', $materialId)
            ->first();

        if ($detalle) {
            // Si se encuentra el detalle, actualiza la cantidad y el valor
            $detalle->cantidad = $nuevaCantidad;
            $detalle->valor = $tasa->cantidad * $nuevaCantidad;
            $detalle->save();
        } else {
            // Si no se encuentra el detalle, crear uno nuevo
            $this->CrearDetalleEntrega($entregaId, $materialId, $nuevaCantidad, $tasa);
        }
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

  

    public function ObtenerDetalleEntrega($Entrega)
    {

        return $this->DetalleEntregasModel->where('entregas_id', $Entrega->id)->get();
    }

    public function ActualizarEntrega($EntregaId, $data)
    {
        $entrega = $this->ObtenerEntrega($EntregaId);
        $entrega->nota = $data['nota'] ?? $entrega->nota;
        $entrega->estado = $data['estado'] ?? $entrega->estado;
        $entrega->save();
        return $entrega;
    }

    public function ObtenerEntrega($Entrega)
    {
        $entrega = $this->EntregaModel->findorfail($Entrega);
        $entrega->load('imagenes', 'acopios', 'users');
        return $entrega;
    }

    public function CambiarEstado($EntregasId)
    {
        $entrega=$this->ObtenerEntrega($EntregasId);
        $entrega->estado = $entrega->estado == 1 ? 2 : 1;
        $entrega->save();
        return $entrega;
    }

}
