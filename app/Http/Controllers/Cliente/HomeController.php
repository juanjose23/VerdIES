<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Carreras;
use App\Models\Detalles_entregas;
use App\Models\DetallesPromociones;
use App\Models\Entregas;
use App\Models\Media;
use App\Models\Tasas;
use App\Models\Transciones;
use App\Models\User;
use App\Models\User_carreras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Session;
use App\Notifications\EntregaRegistrada;
use App\Models\session as inicio;
use Jenssegers\Agent\Agent;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use App\Models\Puntos;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function clientes_home()
    {
        return view('Clientes.Home.home');
    }
    public function perfil()
    {
        $idUsuario = session('IdUser');


        $user = User::findOrFail($idUsuario);
        $sessiones = inicio::where('user_id', $idUsuario)->where('active', true)->orderBy('last_activity', 'DESC')->get();
        $categorias = Carreras::ObtenerCarrera();
        $agent = new Agent();
        foreach ($sessiones as $session) {
            $agent->setUserAgent($session->user_agent);
            $session->browser_name = $agent->browser();
            $session->platform_name = $agent->platform();
        }
        // return $categorias;
        $usuarioCarrera = User_carreras::where('users_id', $idUsuario)->first();

        return view('Page.perfil', compact('user', 'sessiones', 'categorias', 'usuarioCarrera'));
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
        $entregas->nota = "";
        $entregas->estado = 1;
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
        return redirect()->route('home')->with('success', 'se ha registrado tu entrega');
    }

    public function inicio()
    {
        return view('Inicio.index');
    }

    public function canjes()
    {
        return view('Page.canjear');
    }

    public function actualizarperfil(Request $request)
    {
        try {
            $idUsuario = session('IdUser');

            $user = User::findOrFail($idUsuario);
            $user->name = $request->name;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            if ($request->hasFile('imagen')) {
                // Subir la nueva imagen a Cloudinary y obtener el resultado
                $imagenes = $user->imagenes;

                if ($imagenes) {
                    $public_id = $imagenes['public_id'];
                    Cloudinary::destroy($public_id);
                    Media::destroy($imagenes['id']);
                }


                $result = $request->file('imagen')->storeOnCloudinary('Verdies/Users');

                // Crear una nueva entrada de imagen en la base de datos
                $imagen = new Media();
                $imagen->url = $result->getSecurePath();
                $imagen->public_id = $result->getPublicId();
                $imagen->imagenable_id = $idUsuario;
                $imagen->imagenable_type = get_class($user);
                $imagen->save();
                session(['Foto' => $result->getSecurePath()]);
                //return $result->getSecurePath();
            }

            // Buscar si el registro ya existe
            $usuarioCarrera = User_carreras::where('users_id', $idUsuario)->first();

            if ($usuarioCarrera) {

            } else {
                // Crear un nuevo registro
                $usuarioCarrera = new User_carreras();
                $usuarioCarrera->carreras_id = $request->categorias;
                $usuarioCarrera->users_id = $idUsuario;
                $usuarioCarrera->save();
            }

            session(['nombre' => $request->name]);
            return redirect()->back()->with('success', 'Se ha actualizado tu informacion');
        } catch (ValidationException $e) {
            Log::error($e->getMessage());

            return response()->json(['errors' => $e->validator->errors()], 422);
        }

    }

    public function puntos()
    {
        $userId = session('IdUser');
        $puntosPorMoneda = Puntos::where('users_id', $userId)
        ->with('monedas') // Cargar la relación monedas
        ->select('monedas_id', DB::raw('SUM(puntos) as total_puntos'))
        ->groupBy('monedas_id')
        ->get();
        $historial = Entregas::obtenerHistorialEntregasPorUsuario($userId);
        $historialT = Transciones::obtenerHistorialTransaccionesPorUsuario($userId);
      
        return view('Page.puntos', compact('puntosPorMoneda','historial','historialT'));
    }

    public function canjear(Request $request)
    {
        $userId = session('IdUser');
        $IdPromocion = $request->input('material_id'); 
    
        // Verificar que la promoción exista
        $monedas = DetallesPromociones::where('promociones_id', $IdPromocion)->first();
        if (!$monedas) {
            return redirect()->back()->with('error', 'Promoción no encontrada.');
        }
    
        // Obtener los puntos del usuario agrupados por tipo de moneda
        $puntosPorMoneda = Puntos::where('users_id', $userId)
            ->select('monedas_id', DB::raw('SUM(puntos) as total_puntos'))
            ->groupBy('monedas_id')
            ->get();
    
        $totalPuntos = 0;
        $tipoMonedaUsuario = null;
    
        // Verificar que el usuario tenga puntos suficientes en la moneda requerida
        foreach ($puntosPorMoneda as $punto) {
            if ($punto->monedas_id == $monedas->monedas_id) {
                $tipoMonedaUsuario = $punto->monedas_id;
                $totalPuntos = $punto->total_puntos;
                break; // Salir del bucle si encontramos la moneda requerida
            }
        }
    
        // Comparar la moneda y los puntos
        if ($tipoMonedaUsuario && $monedas->cantidadmoneda <= $totalPuntos) {
            $transacion = new Transciones();
            $transacion->monedas_id = $monedas->monedas_id;
            $transacion->users_id = $userId;
            $transacion->puntos = $monedas->cantidadmoneda;
            $transacion->promociones_id = $IdPromocion;
            $transacion->estado = 0;
            $transacion->save();
    
            return redirect()->back()->with('success', 'Espera un momento para que acepten tu canje');
        } else {
            return redirect()->back()->with('error', 'No tienes suficientes puntos para esta promoción.');
        }
    }
    

}
