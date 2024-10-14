<?php

namespace App\Http\Controllers\Facultades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAreas;
use App\Http\Requests\UpdateAreas;
use App\Models\Areas;
use App\Models\Media;
use App\Services\CarreraService;
use App\Services\UniversidadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class AreasController extends Controller
{
    //
    protected $universidadService;
    protected $carreraService;
    public function __construct(UniversidadService $universidadService, CarreraService $carreraService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Universidades')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Universidades')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Universidades')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Universidades')->except(['index', 'show']);
        $this->universidadService = $universidadService;
        $this->carreraService = $carreraService;
    }
    public function index()
    {
        return view('Gestion_Areas.Areas.index');
    }

    public function create()
    {
        $carreras = $this->carreraService->ObtenerCarreras();
        return view('Gestion_Areas.Areas.create', compact('carreras'));
    }

    public function store(StoreAreas $request)
    {

        $data = $request->validated();
        $this->universidadService->CrearUniversidad($data);

        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('areas.index');
    }
    public function edit($areas)
    {
        $areas = $this->universidadService->obtenerArea($areas);
        $carrera = $this->carreraService->ObtenerCarrerasNoAsociadas($areas->id);

        return view('Gestion_Areas.Areas.edit', compact('areas', 'carrera'));
    }
    //
    public function update(UpdateAreas $request, $areas)
    {
        $result = $this->universidadService->ActualizarArea($request, $areas);

        // Mostrar mensaje solo si hay cambios
        Session::flash('success', 'El proceso se ha completado exitosamente.');
       

        return redirect()->route('areas.index');
    }
    //
    public function destroy($areas)
    {
        // Encuentra el  por su ID
        $area = $this->universidadService->CambiarEstado($areas);

        // Cambia el estado del cargo
        $area->estado = $area->estado == 1 ? 0 : 1;
        $area->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado del categoria ha sido cambiado exitosamente.');

        return redirect()->route('areas.index');
    }
    public function destroydetalles($id)
    {

       $this->universidadService->CambiarEstadoDetalle($id);

       
        return redirect()->back()->with('success', 'se ha realizado la operación correctamente');
    }

}
