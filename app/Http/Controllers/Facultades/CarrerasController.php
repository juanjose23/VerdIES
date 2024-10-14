<?php

namespace App\Http\Controllers\Facultades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarreras;
use App\Http\Requests\UpdateCarreras;
use App\Models\Areas;
use App\Models\Carreras;
use App\Models\Media;
use App\Services\CarreraService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class CarrerasController extends Controller
{
    //
    protected $carreraService;
    public function __construct(CarreraService $carreraService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Universidades')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Universidades')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Universidades')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Universidades')->except(['index', 'show']);
        $this->carreraService = $carreraService;
    }
    public function index()
    {
        return view('Gestion_Areas.Carreras.index');
    }

    public function create()
    {

        return view('Gestion_Areas.Carreras.create');
    }

    public function store(StoreCarreras $request)
    {
        $data=$request->validated();
        $this->carreraService->CrearCarrera($data);
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('carreras.index');
    }
    public function edit($carrera)
    {
        $carrera =$this->carreraService->ObtenerCarrera($carrera);


        return view('Gestion_Areas.Carreras.edit', compact('carrera'));
    }
    //
    public function update(UpdateCarreras $request, $carreras)
    {
       
        $this->carreraService->ActualizarCarrera($carreras,$request);
        Session::flash('success', 'El proceso se ha completado exitosamente.');
        return redirect()->route('carreras.index');
    }
    //
    public function destroy($carreras)
    {
        $this->carreraService->cambiarEstado($carreras);

        Session::flash('success', 'El estado de la carrera ha sido cambiado exitosamente.');

        return redirect()->route('carreras.index');
    }

}
