<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegister;
use Illuminate\Http\Request;
use App\Models\Privilegios;
use App\Models\RolesUsuarios;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\PageController;

class LoginController extends Controller
{
    //
    public function login()
    {

        return view("Auth.login");
    }
    public function validarLogin(Request $request)
    {

        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        $usuarios = new User();
        $user = $usuarios->ValidarUsuario($request->email);
        if ($user !== null) {
            $privilegio = new Privilegios();
            $userId = $user['id'];
            $InformacionPersonal = $usuarios->ObtenerInformacionUsuario($userId);
            $privilegios = $privilegio->ObtenerPrivilegiosUsuario($userId);
            $credenciales = $request->only('email', 'password');
            if (!Auth::attempt($credenciales, $request->filled('recordar'))) {
                return redirect()->back()->withInput()->with('error', 'Credenciales incorrectas');
            }
            $request->session()->regenerate();

            $validarRol = RolesUsuarios::where('users_id', $userId)
                ->where('roles_id', '!=', 1)
                ->where('estado', 1)
                ->exists();


            $redirectRoute = $validarRol ? 'categorias.index' : 'home';
            $redirectMessage = $validarRol ? '¡Bienvenido!' : '¡Bienvenido!';

            // Crear las sesiones
            Session::put('IdUser', $userId);
            Session::put('nombre', $InformacionPersonal['nombre']);
            Session::put('Foto', $InformacionPersonal['foto']);
            Session::put('privilegios', $privilegios);


            // Obtener los datos de sesión y agregar los datos adicionales al payload
            $sessionData = [
                'IdUser' => $userId,
                'nombre' => $InformacionPersonal['nombre'],
                'Foto' => $InformacionPersonal['foto'],
                'privilegios' => $privilegios
            ];
            $sessionId = $request->session()->getId();
            $payload = Crypt::encrypt(json_encode($sessionData));

            // Almacenar los datos en la tabla sessions
            DB::table('sessions')->insert([
                'id' => $sessionId,
                'user_id' => $userId,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'payload' => $payload,
                'last_activity' => now()->timestamp,
                'active' => true,
            ]);
            return redirect()->route($redirectRoute)->with('success', $redirectMessage);
        }
        return redirect()->back()->withInput()->with('error', 'Credenciales incorrectas');
    }

    public function logout(Request $request)
    {
        // Obtener el identificador único de la sesión actual
        $sessionId = $request->session()->getId();




        // Cerrar la sesión del usuario
        Auth::logout();
        DB::table('sessions')
            ->where('id', $sessionId)
            ->delete();
        // Invalidar la sesión actual
        $request->session()->invalidate();

        // Regenerar el token de CSRF
        $request->session()->regenerateToken();


        // Redirigir al usuario a la página de inicio
        return redirect('/');
    }
    public function registro()
    {

        return view("Auth.register");
    }
    public function register(StoreRegister $request)
    {
        try {
          
        
            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            $user->sendEmailVerificationNotification();


           return redirect()->route('login')->with('success','Se ha enviado un correo de verificacion');
        } catch (ValidationException $e) {
            Log::error($e->getMessage());

            return response()->json(['errors' => $e->validator->errors()], 422);
        }

    }

    //Verficacion de correos
    public function verify(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);
    
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->with('error', 'El enlace de verificación es inválido.');
        }
    
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('info', 'La cuenta ya ha sido verificada anteriormente.');
        }
    
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
            return response()->json(['message' => 'Contraseña restablecida con éxito'],200);
        } else {
            return response()->json(['error' => 'No se pudo restablecer la contraseña'], 500);
        }
    }
    public function error403()
    {
        return view('Error.403');
    }

}
