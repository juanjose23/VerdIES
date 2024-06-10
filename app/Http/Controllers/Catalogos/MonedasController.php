<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMonedas;
use App\Http\Requests\UpdateMonedas;
use App\Models\Media;
use App\Models\Monedas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class MonedasController extends Controller
{
    public function index()
    {
        return view('Gestion_Catalogos.Monedas.index');
    }

    public function create()
    {
       
        return view('Gestion_Catalogos.Monedas.create');
    }

    public function store(StoreMonedas $request)
    {
        $moneda = new Monedas();

        $moneda->nombre = $request->nombre;
        $moneda->descripcion = $request->descripcion;
        $moneda->estado = $request->estado;
        $moneda->save();
        if ($request->hasFile('imagen')) {
            // Subir la imagen a Cloudinary y obtener el resultado
            $result = $request->file('imagen')->storeOnCloudinary('Verdies/Productos');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $moneda->id;
            $imagen->imagenable_type = get_class($moneda);
            $imagen->save();
        }
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('monedas.index');
    }
    public function edit($monedas)
    {
        $moneda = Monedas::findOrFail($monedas);
    
        return view('Gestion_Catalogos.Monedas.edit', compact('moneda'));
    }
    //
    public function update(UpdateMonedas $request, $monedas)
    {
        $moneda = Monedas::findOrFail($monedas);


      
        $moneda->nombre = $request->nombre;
        $moneda->descripcion = $request->descripcion;
        $moneda->estado = $request->estado;
        $moneda->save();
        if ($request->hasFile('imagen')) {
            // Subir la nueva imagen a Cloudinary y obtener el resultado
            $imagenes = $moneda->imagenes;

            if ($imagenes) {
                $public_id = $imagenes['public_id'];
                Cloudinary::destroy($public_id);
                Media::destroy($imagenes['id']);
            }
          

            $result = $request->file('imagen')->storeOnCloudinary('Verdies/VerdCoins');
           
            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $moneda->id;
            $imagen->imagenable_type = get_class($moneda);
            $imagen->save();
            //return $result->getSecurePath();
        }

        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->route('monedas.index');
    }
    //
    public function destroy($monedas)
    {
        // Encuentra el cargo por su ID
        $moneda = Monedas::findOrFail($monedas);

        // Cambia el estado del cargo
        $moneda->estado = $moneda->estado == 1 ? 0 : 1;
        $moneda->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado de la moneda ha sido cambiado exitosamente.');

        return redirect()->route('monedas.index');
    }

}
