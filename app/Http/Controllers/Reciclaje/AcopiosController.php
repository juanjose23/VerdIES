<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAcopios;
use App\Http\Requests\UpdateAcopios;
use App\Models\Acopios;
use App\Services\CentroAcopioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AcopiosController extends Controller
{
    //
    protected $CentroAcopioService;
    public function __construct(CentroAcopioService $CentroAcopioService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Acopios')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Acopios')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Acopios')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Acopios')->except(['index', 'show']);

        $this->CentroAcopioService = $CentroAcopioService;
    }
    public function index()
    {
        return view('Gestion_Reciclaje.Acopios.index');
    }

    public function create()
    {
        return view('Gestion_Reciclaje.Acopios.create');
    }

    public function store(StoreAcopios $request)
    {
        $this->CentroAcopioService->CrearAcopio($request);
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('acopios.index');
    }
    public function edit($acopios)
    {
        $acopio = $this->CentroAcopioService->ObtenerAcopio($acopios);

        return view('Gestion_Reciclaje.Acopios.edit', compact('acopio'));
    }
    //
    public function update(UpdateAcopios $request, $acopios)
    {
        $this->CentroAcopioService->ActualizarAcopio($acopios,$request);
        Session::flash('success', 'El proceso se ha completado exitosamente.');
        return redirect()->route('acopios.index');
    }
    //
    public function destroy($acopios)
    {
        $this->CentroAcopioService->CambiarEstado($acopios);
        Session::flash('success', 'El estado  ha sido cambiado exitosamente.');
        return redirect()->route('acopios.index');
    }

}
