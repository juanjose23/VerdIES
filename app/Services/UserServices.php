<?php
namespace App\Services;
use App\Models\RolesUsuarios;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserServices
{
    protected $UserModel;
    protected $RolesUsuario;
    public function __construct(User $UserModel, RolesUsuarios $RolesUsuario)
    {
        $this->UserModel = $UserModel;
        $this->RolesUsuario = $RolesUsuario;
    }

    public function CrearUsuario($data)
    {
        $user = $this->UserModel::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>$data['password'],
            'estado' => $data['estado'],
        ]);

        return $user;
    }

    public function ActualizarUsuario($userId, $data)
    {
        $user = $this->UserModel::find($userId);
        if ($user) {
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => !empty($data['password']) ? Hash::make($data['password']) : $user->password,
                'estado' => $data['estado'] ?? $user->estado,
            ]);

            return $user;
        }
    }
    public function CambiarEstado($userId)
    {
        $user = $this->UserModel::find($userId);
        if ($user) {
            $user->estado = $user->estado === 1 ? 0 : 1;
            $user->save();

            return $user;
        }

        return null;
    }

    public function AsignarRol($userId, $roleId)
    {
        $rolesUsuario = $this->RolesUsuario::create([
            'roles_id' => $roleId,
            'users_id' => $userId,
            'estado' => 1,
        ]);

        return $rolesUsuario;
    }

    public function CambiarEstadoRol($userId, $roleId)
    {
        $rolesUsuario = $this->RolesUsuario::where('users_id', $userId)
            ->where('roles_id', $roleId)
            ->first();

        if ($rolesUsuario) {
            $rolesUsuario->estado = $rolesUsuario->estado === 1 ? 0 : 1;
            $rolesUsuario->save();

            return $rolesUsuario;
        }

        return null;
    }

    /**
     * Genera un nombre de usuario único combinando el nombre y el apellido de una persona.
     *
     * @param string $nombre del usuario.
     * @return string|null El nombre de usuario generado o null si no se puede generar.
     */
    public function generarNombreUsuario($nombreCompleto)
    {
        // Convertir el nombre completo a minúsculas
        $nombre = strtolower($nombreCompleto);

        // Obtener el primer nombre
        $primerNombre = explode(' ', $nombre)[0];

        // Generar un número aleatorio
        $numeroAleatorio = rand(100, 999);

        // Formar el nombre de usuario
        $nombreUsuario = $primerNombre . '.' . $numeroAleatorio;

        // Verificar si el nombre de usuario ya existe en la base de datos
        while ($this->UserModel::where('email', $nombreUsuario . '@verdies.com')->exists()) {
            // Generar un nuevo número aleatorio
            $numeroAleatorio = rand(100, 999);
            // Formar el nuevo nombre de usuario
            $nombreUsuario = $primerNombre . '.' . $numeroAleatorio;
        }

        // Devolver el nombre de usuario con el dominio
        return $nombreUsuario . '@verdies.com';
    }
    /**
     * Genera una contraseña segura siguiendo estándares de seguridad comunes.
     *
     * @param int $longitud La longitud de la contraseña a generar (por defecto: 12).
     * @return string La contraseña generada.
     */
    public static function generarContrasenaSegura()
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud_caracteres = strlen($caracteres);
        $contraseña = '';

        for ($i = 0; $i < 8; $i++) {
            $indice_aleatorio = mt_rand(0, $longitud_caracteres - 1);
            $contraseña .= $caracteres[$indice_aleatorio];
        }

        return $contraseña;
    }

    /**
     * Valida si el usuario existe en la base de datos y retorna su ID y el ID de la persona asociada.
     *
     * @param string $usuario El nombre de usuario a validar.
     * @return array|null Un array con el ID del usuario y el ID de la persona asociada si el usuario existe, o null si no existe.
     */
    public function ValidarUsuario($usuario)
    {
        $user = $this->UserModel::where('email', $usuario)
            ->where('estado', 1)
            ->first();


        if ($user !== null) {
            return ['id' => $user->id];
        }
        return null;
    }
}