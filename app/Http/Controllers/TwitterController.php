<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Throwable;
use App\Services\RegistroUsuariosService;
class TwitterController extends Controller
{
    //
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
