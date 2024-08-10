<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            $user = Socialite::driver('github')->user();
           
             $users = $this->registroUsuariosService->buscarOcrearUsuario($user, 'github');
             if ($users == false) {
                 return redirect('/login')->with('error', 'Ya existe un usuario con este correo electrónico');
             }
             $this->registroUsuariosService->gestionarSesion($users);

        
        } catch (Throwable $e) {

            return redirect(route('login'))->with('error', 'Github authentication failed.');
        }


        return redirect()->intended('clientes/inicio');

    }
}
