<?php

namespace App\Http\Controllers\Facultades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarreras;
use App\Http\Requests\UpdateCarreras;
use App\Models\Areas;
use App\Models\Carreras;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class CarrerasController extends Controller
{
    //
    public function __construct()
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Areas')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Areas')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Areas')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Areas')->except(['index', 'show']);
    }
    public function index()
    {
        return view('Gestion_Areas.Carreras.index');
    }

    public function create()
    {
        $areas = Areas::where('estado', 1)->get();
        return view('Gestion_Areas.Carreras.create', compact('areas'));
    }

    public function store(StoreCarreras $request)
    {
        $carrera = new Carreras();
        $carrera->area_conocimientos_id = $request->areas;

     
        $carrera->nombre = $request->nombre;
        $carrera->descripcion = $request->descripcion;
        $carrera->estado = $request->estado;
        $carrera->save();
        if ($request->hasFile('imagen')) {
            // Subir la imagen a Cloudinary y obtener el resultado
            $result = $request->file('imagen')->storeOnCloudinary('Verdies/Facultades');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $carrera->id;
            $imagen->imagenable_type = get_class($carrera);
            $imagen->save();
        }
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('carreras.index');
    }
    public function edit($carrera)
    {
        $carrera = Carreras::findOrFail($carrera);
        $areas = Areas::where('estado', 1)->get();

        return view('Gestion_Areas.Carreras.edit', compact('carrera','areas'));
    }
    //
    public function update(UpdateCarreras $request, $carreras)
    {
        $carrera = Carreras::findOrFail($carreras);


        $carrera->area_conocimientos_id = $request->areas;
        $carrera->nombre = $request->nombre;
        $carrera->descripcion = $request->descripcion;
        $carrera->estado = $request->estado;
        $carrera->save();
        if ($request->hasFile('imagen')) {
            // Subir la nueva imagen a Cloudinary y obtener el resultado
            $imagenes = $carrera->imagenes;

            if ($imagenes) {
                $public_id = $imagenes['public_id'];
                Cloudinary::destroy($public_id);
                Media::destroy($imagenes['id']);
            }
          

            $result = $request->file('imagen')->storeOnCloudinary('Verdies/Facultades');
           
            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $carrera->id;
            $imagen->imagenable_type = get_class($carrera);
            $imagen->save();
            //return $result->getSecurePath();
        }

        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->route('carreras.index');
    }
    //
    public function destroy($carreras)
    {
        // Encuentra el cargo por su ID
        $carrea = Carreras::findOrFail($carreras);

        // Cambia el estado del cargo
        $carrea->estado = $carrea->estado == 1 ? 0 : 1;
        $carrea->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado de la carrera ha sido cambiado exitosamente.');

        return redirect()->route('carreras.index');
    }

}
