<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privilegios;
use App\Models\RolesUsuarios;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Crypt;

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


            $redirectRoute = $validarRol ? 'categorias.index' : '/';
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
    public function error403()
    {
        return view('Error.403');
    }

}
