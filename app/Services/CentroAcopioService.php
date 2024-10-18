<?php
namespace App\Services;
use App\Models\Acopios;
use Illuminate\Http\Request;
class CentroAcopioService
{
    protected $AcopiosModel;
    public function __construct(Acopios $AcopiosModel)
    {
        $this->AcopiosModel = $AcopiosModel;
    }

    public function CrearAcopio(Request $request)
    {
        $Acopio = $this->AcopiosModel->newInstance();
        $Acopio->nombre = $request->nombre;
        $Acopio->descripcion = $request->descripcion;
        $Acopio->latitude = $request->latitude;
        $Acopio->longitude = $request->longitude;
        $Acopio->estado = $request->estado;
        $Acopio->save();
    }
    public function ObtenerAcopioActivos()
    {
        return $this->AcopiosModel->where('estado', 1)->get();
    }
    public function ObtenerAcopio($Acopio)
    {
        return $this->AcopiosModel->findOrFail($Acopio);
    }

    public function ActualizarAcopio($id, Request $request)
    {
        $acopio = $this->ObtenerAcopio($id);
        $acopio->nombre = $request->nombre;
        $acopio->descripcion = $request->descripcion;
        $acopio->latitude = $request->latitude;
        $acopio->longitude = $request->longitude;
        $acopio->estado = $request->estado;
        $acopio->save();
    }

    public function CambiarEstado($AcopioId)
    {
        $Acopio = $this->ObtenerAcopio($AcopioId);
        $Acopio->estado = $Acopio->estado == 1 ? 0 : 1;
        $Acopio->save();
    }
    public function CambiarEstados($AcopioId,$estado)
    {
        $Acopio = $this->ObtenerAcopio($AcopioId);
        $Acopio->estado = $estado;
        $Acopio->save();
    }
}