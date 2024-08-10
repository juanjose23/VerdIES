<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;
use App\Services\RegistroUsuariosService;

class TwitterController extends Controller
{
    //
    /**
     * Redirect to Twitter
     *
     * @return RedirectResponse
     */
    
     protected $registroUsuariosService;
     public function __construct(RegistroUsuariosService $registroUsuariosService)
     {
      
         $this->registroUsuariosService = $registroUsuariosService;
     }
    public function redirectToTwitter(): RedirectResponse
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Handle Twitter authentication callback
     *
     * @return RedirectResponse
     */
    public function handleTwitterCallback(): RedirectResponse
    {
        try
        {
            $user = Socialite::driver('twitter')->user();
            $users = $this->registroUsuariosService->buscarOcrearUsuario($user,'twitter');
            if ($users == false) {
                return redirect('/login')->with('error', 'Ya existe un usuario con este correo electrónico');
            }
            $this->registroUsuariosService->gestionarSesion($users);
       

        }

        catch (Throwable $e) {
           
            return redirect(route('login'))->with('error', 'Twitter authentication failed.');
        }

        
        return redirect()->intended('clientes/inicio');
    }
}
