<?php

namespace App\Services;


use App\Models\User;
Use App\Services\PrivilegioServices ;
use App\Models\RolesUsuarios;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class LoginService
{
    protected $userModel;
    protected $privilegiosService;
    protected $rolesUsuariosModel;

    public function __construct(User $userModel, RolesUsuarios $rolesUsuariosModel)
    {
        $this->userModel = $userModel;
        $this->rolesUsuariosModel = $rolesUsuariosModel;
    }

    public function validarUsuario(string $email): ?array
    {
        $user = $this->userModel->where('email', $email)
            ->where('estado', 1)
            ->first();
        return $user ? ['id' => $user->id] : null;
    }

    public function validarContrasena(int $id, string $contrasena): bool
    {
        $user = $this->userModel->find($id);
        return $user ? Hash::check($contrasena, $user->password) : false;
    }

    public function obtenerInformacionUsuario(int $userId): array
    {
        $user = $this->userModel->findOrFail($userId);
        $imagen = Media::where('imagenable_type', User::class)
            ->where('imagenable_id', $userId)
            ->first();
        $fotoPerfil = $imagen ? $imagen->url : $this->obtenerFotoPerfilEstatica($user->name);

        return [
            'nombre' => $user->name,
            'foto' => $fotoPerfil,
        ];
    }

    public function autenticarUsuario($email, $password, $recordar = false)
    {
        // Intentar autenticación con los datos proporcionados
        if (Auth::attempt(['email' => $email, 'password' => $password], $recordar)) {
            // Si la autenticación es exitosa, devolver el usuario autenticado
            return Auth::user();
        }
        
        // Si la autenticación falla, devolver falso
        return false;
    }
  /**
     * Gestiona la sesión del usuario.
     *
     * @param Request $request
     * @return bool
     */
    public function gestionarSesion(Request $request)
    {
        // Validar usuario
        $userData = $this->validarUsuario($request->email);

        if ($userData) {
            $userId = $userData['id'];
            $informacionPersonal = $this->obtenerInformacionUsuario($userId);
            $privilegios = $this->obtenerPrivilegiosUsuario($userId);

            // Crear las sesiones
            Session::put('IdUser', $userId);
            Session::put('nombre', $informacionPersonal['nombre']);
            Session::put('Foto', $informacionPersonal['foto']);
            Session::put('privilegios', $privilegios);

            // Preparar datos adicionales y encriptar payload
            $sessionData = [
                'IdUser' => $userId,
                'nombre' => $informacionPersonal['nombre'],
                'Foto' => $informacionPersonal['foto'],
                'privilegios' => $privilegios,
            ];
            $sessionId = $request->session()->getId();
            $payload = Crypt::encrypt(json_encode($sessionData));

            // Actualizar o insertar en la tabla de sesiones
            DB::table('sessions')->updateOrInsert(
                ['id' => $sessionId],
                [
                    'user_id' => $userId,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'payload' => $payload,
                    'last_activity' => now()->timestamp,
                    'active' => true,
                ]
            );

            return $this->obtenerRolValido($userId);
        } else {
            // Manejar caso en que el usuario no se valide
            throw new \Exception('Usuario no válido');
        }
    }
    public function obtenerRolValido(int $userId): bool
    {
        return $this->rolesUsuariosModel->where('users_id', $userId)
            ->where('roles_id', '!=', 1)
            ->where('estado', 1)
            ->exists();
    }

    /**
     * Obtiene un enlace con una foto de perfil estática basada en la inicial del nombre de usuario.
     *
     * @param string $nombreUsuario El nombre del usuario del cual se desea obtener la foto de perfil.
     * @return string La URL de la foto de perfil estática.
     */
    public function obtenerFotoPerfilEstatica(string $nombreUsuario): string
    {
        $primerLetra = strtoupper(substr($nombreUsuario, 0, 1));
        return "https://ui-avatars.com/api/?name={$primerLetra}";
    }

    /**
     * Obtener los privilegios de un usuario por su ID.
     *
     * @param  int  $id  El ID del usuario.
     * @return array     Los privilegios del usuario.
     */
    public function ObtenerPrivilegiosUsuario(int $id)
    {
        // Realizar la consulta para obtener los privilegios del usuario
        $resultado = db::table('privilegiosroles  as pr')
            ->select('pr.submodulos_id', 'm.id AS id_modulo', 'm.nombre AS modulo', 'm.icono', 'sm.nombre AS submodulo', 'sm.enlace', 'rt.roles_id AS id_rol_temporal')
            ->join('submodulos AS sm', 'sm.id', '=', 'pr.submodulos_id')
            ->join('modulos AS m', 'm.id', '=', 'sm.modulos_id')
            ->leftJoin('rolesusuarios AS rt', 'rt.roles_id', '=', 'pr.roles_id')
            ->leftJoin('users AS u', 'rt.users_id', '=', 'u.id')
            ->where('rt.users_id', '=', $id)
            ->where('rt.estado', '=', 1)
            ->get();

        // Inicializar un arreglo para almacenar los modulos y submodulos
        $modulos = array();
        foreach ($resultado as $row) {
            $modulo_id = $row->id_modulo;
            $submodulo_id = $row->submodulos_id;

            // Verificar si el modulo ya existe en el arreglo, sino agregarlo
            if (!isset($modulos[$modulo_id])) {
                $modulos[$modulo_id] = array(
                    'id' => $modulo_id,
                    'nombre' => $row->modulo,
                    'icono' => $row->icono,
                    'submodulos' => array()
                );
            }

            // Verificar si el submodulo no está vacío, si no está vacío agregarlo al modulo correspondiente
            if (!empty($submodulo_id)) {
                $submodulo = array(
                    'id' => $submodulo_id,
                    'nombre' => $row->submodulo,
                    'enlace' => $row->enlace
                );
                $modulos[$modulo_id]['submodulos'][] = $submodulo;
            }
        }


        // Retornar los privilegios estructurados
        return $modulos;
    }

    /**
     * Maneja el proceso de cierre de sesión del usuario.
     *
     * @param $request
     * @return void
     */
    public function logout($request)
    {
        // Obtener el identificador único de la sesión actual
        $sessionId = $request->session()->getId();

        // Cerrar la sesión del usuario
        Auth::logout();

        // Eliminar la entrada correspondiente en la tabla 'sessions'
        DB::table('sessions')
            ->where('id', $sessionId)
            ->delete();

        // Invalidar la sesión actual
        $request->session()->invalidate();

        // Regenerar el token de CSRF
        $request->session()->regenerateToken();
    }

}


