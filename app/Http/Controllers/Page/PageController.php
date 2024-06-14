<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Detalles_entregas;
use App\Models\Entregas;
use App\Models\Media;
use App\Models\Tasas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Session;
use App\Notifications\EntregaRegistrada;

class PageController extends Controller
{
    //
    public function home()
    {
        return view('Page.index');
    }
    public function perfil()
    {
        return view('Page.index');
    }
    public function index()
    {
        return view('Page.index');
    }
    public function acerca()
    {
        return view('Page.acerca');
    }
    public function educacion()
    {
        return view('Page.educacion');
    }
    public function materiales()
    {
        return view('Page.materiales');
    }
    public function acopios()
    {
        return view('Page.acopios');
    }

    public function recepcion()
    {
        return view('Page.recepcion');
    }

    public function recepcionMaterial($centroAcopio)
    {
        $id = $centroAcopio;
        // Haz lo que necesites con el ID del centro de acopio, como cargar datos y mostrar la vista
        return view('Page.listas', compact('id'));
    }
    public function entrega()
    {
        $entrega = new Entregas();
        $codigo = $entrega->generarCodigoUnico();
        return view('Page.entrega', compact('codigo'));
    }

    public function registrarEntrega(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que el campo 'foto' sea requerido, una imagen y cumpla con los formatos y tamaño especificados
        ]);

        $cartItems = Cart::session(Auth::id())->getContent();
        $primerCentroAcopio = Session::get('primerCentroAcopio');

        $entregas = new Entregas();
        $entregas->users_id = Auth::id();
        $entregas->acopios_id = $primerCentroAcopio;
        $entregas->codigo = $request->codigo;
        $entregas->nota="";
        $entregas->estado=1;
        $entregas->save();
        if ($request->hasFile('imagen')) {
            // Subir la imagen a Cloudinary y obtener el resultado
            $result = $request->file('imagen')->storeOnCloudinary('Verdies/Entregas');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $entregas->id;
            $imagen->imagenable_type = get_class($entregas);
            $imagen->save();


        }
        $detalles = new Detalles_entregas();
        foreach ($cartItems as $item) {
            // Accede a las propiedades de cada artículo del carrito
            $tasa = Tasas::where('materiales_id', $item->id)->where('estado', 1)->first();

            // Verifica si se encontró una tasa válida
            if ($tasa) {
                // Crea un nuevo detalle de entrega
                $detalle = new Detalles_entregas();
                $detalle->entregas_id = $entregas->id;
                $detalle->materiales_id = $item->id;
                $detalle->monedas_id = $tasa->monedas_id; // Asegúrate de que 'monedas_id' sea una propiedad válida en el modelo 'Tasas'
                $detalle->cantidad = $item->quantity;
                $detalle->valor = $item->price * $item->quantity;
                $detalle->save();
            } else {
                // Maneja el caso donde no se encontró una tasa válida (opcional)
            }
        }

        $user = User::find(Auth::id()); // Obtener el usuario por su ID
        $user->notify(new EntregaRegistrada()); // Enviar la notificación al usuario
        Cart::session(Auth::id())->clear();
        return redirect()->route('home')->with('success','se ha registrado tu entrega');
    }
}
