<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
class UserService
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function ObtenerUsuario($usuario)
    {
        return $this->userModel->findOrFail($usuario);
    }
    public function ObtenerUsuariosActivos()
    {
        return $this->userModel->where("estado",1)->get();
    }
    public function hasPrivilege($userId, $privilegeId): bool
    {
        // Genera una clave única para la caché basada en el ID del usuario y el ID del privilegio
        $cacheKey = "user_{$userId}_privileges_{$privilegeId}";

        // Utiliza Cache::remember para almacenar en caché el resultado de la consulta
        return Cache::remember($cacheKey, 60, function () use ($userId, $privilegeId) {
            // Optimiza la consulta para verificar si el usuario tiene el privilegio deseado
            return DB::table('privilegiosroles as pr')
                ->join('rolesusuarios as ru', 'ru.roles_id', '=', 'pr.roles_id')
                ->where('ru.users_id', $userId)
                ->where('ru.estado', 1)
                ->where('pr.submodulos_id', $privilegeId)
                ->exists();
        });
    }
}
