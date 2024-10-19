<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use App\Services\RegistroUsuariosService;
use Throwable;
class GithubController extends Controller
{
    //
    protected $registroUsuariosService;
    public function __construct(RegistroUsuariosService $registroUsuariosService)
    {

        $this->registroUsuariosService = $registroUsuariosService;
    }
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback(): RedirectResponse
    {
        try {
            // Verifica si hubo un error antes de intentar obtener al usuario
            if (request()->has('error')) {
                return redirect('/')->with('error', 'Has cancelado el inicio de sesión con Github.');
            }

            // Obtén la información del usuario de Github
            $user = Socialite::driver('github')->user();

            // Verifica o crea el usuario en tu sistema
            $users = $this->registroUsuariosService->buscarOcrearUsuario($user, 'github');

            if ($users == false) {
                return redirect('/login')->with('error', 'Ya existe un usuario con este correo electrónico');
            }

            // Gestiona la sesión para el usuario autenticado
            $this->registroUsuariosService->gestionarSesion($users);

        } catch (Throwable $e) {
            \Log::error('Error en la autenticación con Github: ' . $e->getMessage());
            return redirect(route('login'))->with('error', 'Github authentication failed.');
        }

        return redirect()->intended('clientes/inicio');
    }

}
