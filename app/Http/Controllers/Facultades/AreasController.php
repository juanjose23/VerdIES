<?php

namespace App\Http\Controllers\Facultades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAreas;
use App\Http\Requests\UpdateAreas;
use Illuminate\Support\Facades\Session;
use App\Services\AreaService;
class AreasController extends Controller
{
    //
    protected $areaService;
    public function __construct(AreaService $areaService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Areas')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Areas')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Areas')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Areas')->except(['index', 'show']);
        $this->areaService = $areaService;
    }
    public function index()
    {
        return view('Gestion_Areas.Areas.index');
    }

    public function create()
    {
        return view('Gestion_Areas.Areas.create');
    }

    public function store(StoreAreas $request)
    {
     $this->areaService->CrearArea($request->all());
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('areas.index');
    }
    public function edit($areas)
    {
        $areas = $this->areaService->obtenerArea($areas);

        return view('Gestion_Areas.Areas.edit', compact('areas'));
    }
    //
    public function update(UpdateAreas $request, $areas)
    {

        $this->areaService->ActualizarArea($request, $areas);

        // Mostrar mensaje solo si hay cambios
        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->route('areas.index');
    }
    
    //
    public function destroy($areas)
    {
        $this->areaService->CambiarEstado($areas);
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado del categoria ha sido cambiado exitosamente.');

        return redirect()->route('areas.index');
    }


}
