<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Auth\Http\Requests\ForgetPasswordRequest;
use Modules\Auth\Http\Controllers\Controller;


use Modules\Auth\Http\Requests\StoreRegister;

use Modules\Auth\Models\Media;
use Modules\Auth\Services\LoginService;
use Modules\Auth\Services\RegistroUsuariosService;
use Illuminate\Http\Request;  // Esta probablemente está bien como está, ya que `Request` pertenece a Laravel.
use Modules\Auth\Models\User;

use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Modules\Auth\Models\session as inicio;
use Jenssegers\Agent\Agent;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class LoginController extends Controller
{
    //
    protected $loginService;
    protected $registroUsuariosService;
    public function __construct(LoginService $loginService, RegistroUsuariosService $registroUsuariosService)
    {
        $this->loginService = $loginService;
        $this->registroUsuariosService = $registroUsuariosService;
    }


    public function login()
    {
        return view("auth::Auth.login");
    }
    public function validarLogin(Request $request)
    {
        // Validar datos del request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'recordar' => 'boolean',
        ]);

        // Obtener credenciales del request
        $email = $request->input('email');
        $password = $request->input('password');
        $recordar = $request->filled('recordar');

        // Intentar autenticar al usuario
        $user = $this->loginService->autenticarUsuario($email, $password, $recordar);

        if ($user) {
            // Autenticación exitosa
            $request->session()->regenerate();

            // Gestionar sesión
            $rol = $this->loginService->gestionarSesion($request);

            return redirect()->route($rol ? 'inicio' : 'home')
                ->with('success', '¡Bienvenido!');
        } else {
            // Autenticación fallida
            return redirect()->back()->withInput()->with('error', 'Credenciales incorrectas');
        }
    }

    public function logout(Request $request)
    {
        $this->loginService->logout($request);
        // Redirigir al usuario a la página de inicio
        return redirect('/');
    }
    public function registro()
    {

        return view("auth::Auth.register");
    }
    public function register(StoreRegister $request)
    {
        try {
            $this->registroUsuariosService->register($request->all());
            return redirect()->route('login')->with('success', 'Se ha enviado un correo de verificación');
        } catch (ValidationException $e) {
            Log::error($e->getMessage());
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    }

    //Verficacion de correos
    public function verify(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);
    
        // Asegúrate de que el hash coincida con el generado en el correo electrónico
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->with('error', 'El enlace de verificación es inválido.');
        }
    
        // Verifica si el usuario ya ha sido verificado
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('info', 'La cuenta ya ha sido verificada anteriormente.');
        }
    
        // Marca el correo electrónico como verificado
        $user->markEmailAsVerified();
        return redirect()->route('login')->with('success', '¡Tu cuenta ha sido verificada con éxito!');
    }
    


    //
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink([
            'email' => $request->email
        ]);

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Correo electrónico de restablecimiento de contraseña enviado'])
            : response()->json(['error' => 'No se pudo enviar el correo electrónico de restablecimiento de contraseña'], 500);
    }
    public function reset(Request $request)
    {

    }
    public function showResetForm($token)
    {
        return response()->json(['token' => $token]);
    }

    public function resetPassword(ForgetPasswordRequest $request)
    {


        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Contraseña restablecida con éxito'], 200);
        } else {
            return response()->json(['error' => 'No se pudo restablecer la contraseña'], 500);
        }
    }
    public function error403()
    {
        return view('Error.403');
    }

    public function inicios()
    {
        $idUsuario = session('IdUser');


        $user = User::findOrFail($idUsuario);
        $sessiones = inicio::where('user_id', $idUsuario)->where('active', true)->orderBy('last_activity', 'DESC')->get();

        $agent = new Agent();
        foreach ($sessiones as $session) {
            $agent->setUserAgent($session->user_agent);
            $session->browser_name = $agent->browser();
            $session->platform_name = $agent->platform();
        }
        return view('Inicio.perfil', compact('user', 'sessiones'));
    }

    public function closeSessionForDevice(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {

            // Verificar la contraseña proporcionada
            if (!Hash::check($request->current_password, Auth::user()->password)) {
                return redirect()->back()->with('error', 'Se ha ingresado la contraseña incorrecta.');
            }


            // Cerrar la sesión en otros dispositivos
            Auth::logoutOtherDevices($request->current_password);

            // Eliminar los registros de sesión en otros dispositivos
            $this->deleteOtherSessionRecords($request);

            // Redirigir al usuario con un mensaje de éxito
            return redirect()->back()->with('success', 'Sesiones en otros dispositivos cerradas exitosamente.');
        } else {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión
            return redirect()->back()->with('error', 'Debes iniciar sesión para realizar esta acción.');
        }
    }
    protected function deleteOtherSessionRecords(Request $request)
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        DB::table(config('session.table', 'sessions'))

            ->where('id', '!=', $request->session()->getId())
            ->delete();
    }


    public function actualizar(Request $request)
    {
        try {
            $idUsuario = session('IdUser');

            $user = User::findOrFail($idUsuario);
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
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
            session(['nombre' => $request->name]);
            return redirect()->back()->with('success', 'Se ha actualizado tu informacion');
        } catch (ValidationException $e) {
            Log::error($e->getMessage());

            return response()->json(['errors' => $e->validator->errors()], 422);
        }

    }

}
