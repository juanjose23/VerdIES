<?php

namespace App\Http\Controllers\Promociones;

use App\Http\Controllers\Controller;
use App\Models\DetallesPromociones;
use App\Models\Media;
use App\Models\Monedas;
use App\Models\Promociones;
use App\Models\RolesUsuarios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Validator;

class PromocionesController extends Controller
{
    //
    public function index()
    {
        return view('Gestion_Promociones.Promociones.index');
    }

    public function create()
    {
        $categorias = User::ObternerAlidados();
        $monedas = Monedas::where('estado', 1)->get();
        return view('Gestion_Promociones.Promociones.create', compact('categorias', 'monedas'));
    }
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $validator = Validator::make($request->all(), [
            'categorias' => 'required|exists:users,id',
            'nombre' => 'required|string|max:255|unique:promociones',
            'fecha' => 'required|date',
            'estado' => 'required|boolean',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'moneda' => 'required|exists:monedas,id',
            'preciomoneda' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
        ]);

        // Si la validación falla, retornar los errores
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $promocion = new Promociones();
        $promocion->users_id = $request->categorias;
        $promocion->nombre = $request->nombre;
        $promocion->fecha_vencimiento = $request->fecha;
        $promocion->estado = $request->estado;
        $promocion->descripcion = $request->descripcion;
        $promocion->save();
        if ($request->hasFile('imagen')) {
            // Subir la imagen a Cloudinary y obtener el resultado
            $result = $request->file('imagen')->storeOnCloudinary('Verdies/Promociones');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $promocion->id;
            $imagen->imagenable_type = get_class($promocion);
            $imagen->save();
        }
        // Crear una nueva instancia de Promocion


        $detallepromocion = new DetallesPromociones();
        $detallepromocion->promociones_id = $promocion->id;
        $detallepromocion->cantidad = $request->cantidad;
        $detallepromocion->valor = $request->precio;
        $detallepromocion->monedas_id = $request->moneda;
        $detallepromocion->cantidadmoneda = $request->preciomoneda;
        $detallepromocion->save();

        // Guardar la promoción en la base de datos


        // Redireccionar a la vista de promociones o hacer cualquier otra acción
        return redirect()->route('promociones.index')->with('success', 'Promoción registrada exitosamente.');
    }
    public function edit($promociones)
    {
        $promocion = Promociones::with(['users','detalles'])->findOrFail($promociones);
        $monedas = Monedas::where('estado', 1)->get();

        return view('Gestion_Promociones.Promociones.edit', compact('promocion', 'monedas'));
    }
    //
    public function update(Request $request, $id)
    {
        // Validación de los datos recibidos
        $validator = Validator::make($request->all(), [
          
            'nombre' => 'required|string|max:255|unique:promociones,nombre,' . $id,
            'fecha' => 'required|date',
            'estado' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'moneda' => 'required|exists:monedas,id',
            'preciomoneda' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
        ]);

        // Si la validación falla, retornar los errores
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Buscar la promoción existente
        $promocion = Promociones::findOrFail($id);
        $promocion->nombre = $request->nombre;
        $promocion->fecha_vencimiento = $request->fecha;
        $promocion->estado = $request->estado;
        $promocion->descripcion = $request->descripcion;
        $promocion->save();

        // Verificar si se ha subido una nueva imagen
        if ($request->has('imagen')) {
            // Eliminar la imagen antigua de Cloudinary
            $imagenes = $promocion->imagenes;

            if ($imagenes) {
                $public_id = $imagenes['public_id'];
                Cloudinary::destroy($public_id);
                Media::destroy($imagenes['id']);
            }
          

            // Subir la nueva imagen a Cloudinary y obtener el resultado
            $result = $request->file('imagen')->storeOnCloudinary('Verdies/Promociones');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $promocion->id;
            $imagen->imagenable_type = get_class($promocion);
            $imagen->save();
        }

        // Buscar el detalle de la promoción existente
        $detallepromocion = DetallesPromociones::where('promociones_id', $promocion->id)->firstOrFail();
        $detallepromocion->cantidad = $request->cantidad;
        $detallepromocion->valor = $request->precio;
        $detallepromocion->monedas_id = $request->moneda;
        $detallepromocion->cantidadmoneda = $request->preciomoneda;
        $detallepromocion->save();

        // Redireccionar a la vista de promociones o hacer cualquier otra acción
        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada exitosamente.');
    }

    //
    public function destroy($promociones)
    {
        // Encuentra el cargo por su ID
        $promocion = Promociones::findOrFail($promociones);

        // Cambia el estado del cargo
        $promocion->estado = $promocion->estado == 1 ? 0 : 1;
        $promocion->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado  ha sido cambiado exitosamente.');

        return redirect()->route('promociones.index');
    }

}
