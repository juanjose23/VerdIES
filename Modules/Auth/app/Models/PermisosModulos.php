<?php

namespace Modules\Auth\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermisosModulos extends Model
{
    use HasFactory;
    public function modulos()
    {
        return $this->belongsTo(Modulos::class);
    }
    public function permisosp()
    {
        return $this->belongsTo(Permisos::class);
    }

    public function permisosRoles()
    {
        return $this->hasMany(PermisosRoles::class);
    }

    /**
     * Obtiene los permisos de módulos para un usuario específico.
     *
     * @param int $idUsuario El ID del usuario para el que se obtendrán los permisos.
     * @return array Un array con los ID de permiso y módulo para el usuario.
     */
    public function obtenerPermisosModulos($idUsuario)
    {
        $permisos = [];
        $resultados = DB::table('permisosroles')
            ->select('permisos.id as permiso_id', 'modulos.id as modulo_id')
            ->join('permisosmodulos', 'permisosroles.permisosmodulos_id', '=', 'permisosmodulos.id')
            ->join('modulos', 'permisosmodulos.modulos_id', '=', 'modulos.id')
            ->join('roles', 'permisosroles.roles_id', '=', 'roles.id')
            ->join('rolesusuarios', 'roles.id', '=', 'rolesusuarios.roles_id')
            ->join('users', 'rolesusuarios.users_id', '=', 'users.id')
            ->where('users.id', '=', $idUsuario)
            ->get();

        foreach ($resultados as $fila) {
            $permisos[] = [
                'id_permiso' => $fila->permiso_id,
                'id_modulo' => $fila->modulo_id
            ];
        }

        // Retornar el arreglo con los ID de permiso y módulo
        return $permisos;
    }
}
