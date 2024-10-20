<?php

namespace App\Policies;

use App\Models\Universidades;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Models\permisosroles;

class UniversidadesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Universidades $areas): bool
    {
        //
        return true;
    }
/**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //

        $idPermisoDeseado = 7;
      
        if ($this->tienePermiso($user, $idPermisoDeseado)) {
           
            return true;

        }

        
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        //
        $idPermisoDeseado = 8;
        if ($this->tienePermiso($user, $idPermisoDeseado)) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        //
        $idPermisoDeseado = 9;
        if ($this->tienePermiso($user, $idPermisoDeseado)) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        //
        $idPermisoDeseado = 3;
        if ($this->tienePermiso($user, $idPermisoDeseado)) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        //
        $idPermisoDeseado = 3;
        if ($this->tienePermiso($user, $idPermisoDeseado)) {
            return true;
        }

        return false;
    }
    private function tienePermiso(User $user, $idPermisoDeseado): bool
    {
        $userId = $user->id;
        $permisos = permisosroles::obtenerPermisosRoles($userId);

        // Verifica si el usuario tiene el permiso deseado
        return collect($permisos)->contains('permisosmodulos_id', $idPermisoDeseado);
    }
    
}
