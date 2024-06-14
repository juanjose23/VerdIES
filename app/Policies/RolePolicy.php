<?php

namespace App\Policies;


use App\Models\RolesUsuarios;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
class RolePolicy
{
    use HandlesAuthorization;

    public function viewRole(User $user, RolesUsuarios $roleUsuario, $roleId)
    {
        // Verificar si el usuario tiene asignado el rol con el ID dado
        return $roleUsuario->users_id === $user->id && $roleUsuario->roles_id === $roleId;
    }
}
