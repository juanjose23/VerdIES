<?php

namespace App\Http\Controllers\Facultades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAreas;
use App\Http\Requests\UpdateAreas;
use App\Models\Areas;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class AreasController extends Controller
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
        return view('Gestion_Areas.Areas.index');
    }

    public function create()
    {
        return view('Gestion_Areas.Areas.create');
    }

    public function store(StoreAreas $request)
    {
        $area = new Areas();
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->estado = $request->estado;
        $area->save();
        if ($request->hasFile('logo')) {
            // Subir la imagen a Cloudinary y obtener el resultado
            $result = $request->file('logo')->storeOnCloudinary('Verdies/Facultades');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $area->id;
            $imagen->imagenable_type = get_class($area);
            $imagen->save();
        }

        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('areas.index');
    }
    public function edit($areas)
    {
        $areas = Areas::findOrFail($areas);

        return view('Gestion_Areas.Areas.edit', compact('areas'));
    }
    //
    public function update(UpdateAreas  $request, $areas)
    {
        $area = Areas::findOrFail($areas);


        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->estado = $request->estado;
        $area->save();
        if ($request->hasFile('logo')) {
            // Subir la nueva imagen a Cloudinary y obtener el resultado
            $imagenes = $area->imagenes;

            if ($imagenes) {
                $public_id = $imagenes['public_id'];
                Cloudinary::destroy($public_id);
                Media::destroy($imagenes['id']);
            }


            $result = $request->file('logo')->storeOnCloudinary('Verdies/Facultades');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $area->id;
            $imagen->imagenable_type = get_class($area);
            $imagen->save();
            //return $result->getSecurePath();
        }

        // Mostrar mensaje solo si hay cambios
        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->route('categorias.index');
    }
    //
    public function destroy($areas)
    {
        // Encuentra el  por su ID
        $area = Areas::findOrFail($areas);

        // Cambia el estado del cargo
        $area->estado = $area->estado == 1 ? 0 : 1;
        $area->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado del categoria ha sido cambiado exitosamente.');

        return redirect()->route('areas.index');
    }

}
