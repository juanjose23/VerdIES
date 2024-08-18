<?php

namespace App\Http\Controllers\Facultades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarreras;
use App\Http\Requests\UpdateCarreras;
use Illuminate\Support\Facades\Session;
use App\Services\AreaService;
use App\Services\CarreraService;
class CarrerasController extends Controller
{
    //
    protected $CarreraService;
    protected $AreaService;
    public function __construct(AreaService $AreaService, CarreraService $CarreraService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Areas')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Areas')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Areas')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Areas')->except(['index', 'show']);
        $this->AreaService = $AreaService;
        $this->CarreraService = $CarreraService;
    }
    public function index()
    {
        return view('Gestion_Areas.Carreras.index');
    }

    public function create()
    {
        $areas = $this->AreaService->ObtenerAreasActivas();
        return view('Gestion_Areas.Carreras.create', compact('areas'));
    }

    public function store(StoreCarreras $request)
    {
        $this->CarreraService->CrearCarrera($request->all());
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('carreras.index');
    }
    public function edit($carrera)
    {
        $carrera =$this->CarreraService->ObtenerCarrera($carrera);
        $areas = $this->AreaService->ObtenerAreasActivas();

        return view('Gestion_Areas.Carreras.edit', compact('carrera', 'areas'));
    }
    //
    public function update(UpdateCarreras $request, $carreras)
    {
      $this->CarreraService->ActualizarCarrera($carreras,$request);

        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->route('carreras.index');
    }
    //
        public function destroy($carreras)
        {
            $this->CarreraService->cambiarEstado($carreras);
            Session::flash('success', 'El estado de la carrera ha sido cambiado exitosamente.');

            return redirect()->route('carreras.index');
        }

}
