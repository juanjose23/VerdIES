<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Laravel\Socialite\Facades\Socialite;
use App\Services\RegistroUsuariosService;
use Exception;
class GoogleController extends Controller
{
    //
    protected $registroUsuariosService;
    public function __construct(RegistroUsuariosService $registroUsuariosService)
    {
     
        $this->registroUsuariosService = $registroUsuariosService;
    }
    public function redirectToGoogle()
   
    {
        return Socialite::driver('google')->with(['prompt' => 'consent'])->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            if (request()->has('error')) {
                return redirect('/')->with('error', 'Has cancelado el inicio de sesión con Google.');
            }
            $client = new Client();

            // Configura los datos para el intercambio de código por token
            $response = $client->post('https://oauth2.googleapis.com/token', [
                'form_params' => [
                    'code' => request('code'),
                    'client_id' => env('GOOGLE_CLIENT_ID'),
                    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                    'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
                    'grant_type' => 'authorization_code',
                ],
            ]);

            $body = json_decode((string) $response->getBody(), true);

            // Usa el token de acceso para obtener la información del usuario
            $userResponse = $client->get('https://www.googleapis.com/oauth2/v1/userinfo', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $body['access_token'],
                ],
            ]);

            $googleUser = json_decode((string) $userResponse->getBody(), true);


            $user = $this->registroUsuariosService->buscarOcrearUsuario($googleUser,'google');

            if ($user == false) {
                return redirect('/login')->with('error', 'Ya existe un usuario con este correo electrónico');
            }
        
          $this->registroUsuariosService->gestionarSesion($user);
            return redirect('/clientes/inicio');

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // Captura el error específico de Guzzle y muestra los detalles
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return response()->json(['error' => 'Failed to authenticate with Google', 'details' => $responseBodyAsString], 500);
        } catch (Exception $e) {
            // Captura cualquier otro tipo de error y muestra los detalles
            return response()->json(['error' => 'Failed to authenticate with Google', 'message' => $e->getMessage()], 500);
        }

    }
   
}
