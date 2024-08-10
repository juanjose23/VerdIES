<?php

namespace App\Http\Controllers\Page;

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

class PageController extends Controller
{
    //
    public function index()
    {
        return view('Page.Inicio.index');
    }

    public function acerca()
    {
        return view('Page.Acerca.acerca');
    }
  

   
    public function contacto()
    {
        return view('Page.Contacto.contacto');
    }


    public function inicio()
    {
        return view('Inicio.index');
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

}
