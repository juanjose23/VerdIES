<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMateriales;
use App\Http\Requests\UpdateMateriales;
use App\Models\Categorias;
use App\Models\Materiales;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class MaterialesController extends Controller
{
   
    public function index()
    {
        return view('Gestion_Catalogos.Materiales.index');
    }

    public function create()
    {
        $categorias = Categorias::where('estado', 1)->get();
        return view('Gestion_Catalogos.Materiales.create', compact('categorias'));
    }

    public function store(StoreMateriales $request)
    {
        $materiales = new Materiales();
        $materiales->categorias_id = $request->categorias;
        $categoria = Categorias::find($request->categorias);
        $codigo = Materiales::generarCodigoMaterial($categoria);
        $materiales->codigo = $codigo;
        $materiales->nombre = $request->nombre;
        $materiales->descripcion = $request->descripcion;
        $materiales->estado = $request->estado;
        $materiales->save();
        if ($request->hasFile('imagen')) {
            // Subir la imagen a Cloudinary y obtener el resultado
            $result = $request->file('imagen')->storeOnCloudinary('Verdies/Productos');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $materiales->id;
            $imagen->imagenable_type = get_class($materiales);
            $imagen->save();
        }
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('materiales.index');
    }
    public function edit($materiales)
    {
        $material = Materiales::findOrFail($materiales);
        $categorias = Categorias::where('estado', 1)->get();

        return view('Gestion_Catalogos.Materiales.edit', compact('material','categorias'));
    }
    //
    public function update(UpdateMateriales $request, $materiales)
    {
        $material = Materiales::findOrFail($materiales);


        $material->categorias_id = $request->categorias;
        $material->nombre = $request->nombre;
        $material->descripcion = $request->descripcion;
        $material->estado = $request->estado;
        $material->save();
        if ($request->hasFile('imagen')) {
            // Subir la nueva imagen a Cloudinary y obtener el resultado
            $imagenes = $material->imagenes;

            if ($imagenes) {
                $public_id = $imagenes['public_id'];
                Cloudinary::destroy($public_id);
                Media::destroy($imagenes['id']);
            }
          

            $result = $request->file('imagen')->storeOnCloudinary('Verdies/Productos');
           
            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $material->id;
            $imagen->imagenable_type = get_class($material);
            $imagen->save();
            //return $result->getSecurePath();
        }

        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->route('materiales.index');
    }
    //
    public function destroy($materiales)
    {
        // Encuentra el cargo por su ID
        $material = Materiales::findOrFail($materiales);

        // Cambia el estado del cargo
        $material->estado = $material->estado == 1 ? 0 : 1;
        $material->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado del material ha sido cambiado exitosamente.');

        return redirect()->route('materiales.index');
    }



}
