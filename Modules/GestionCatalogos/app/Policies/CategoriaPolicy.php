<?php

namespace Modules\GestionCatalogos\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use  Modules\Auth\Models\PermisosRoles;
use Modules\GestionCatalogos\Models\Categoria;
class CategoriaPolicy
{
   //
    
    public function viewAny(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Categoria $categorias): bool
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

        $idPermisoDeseado = 1;
      
        if ($this->tienePermiso($user, $idPermisoDeseado)) {
           echo $user;
            return true;

        }

        var_dump($user) ;
        exit();
        //return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        //
        $idPermisoDeseado = 2;
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
        $idPermisoDeseado = 3;
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
        var_dump($permisos);
return $userId;
        // Verifica si el usuario tiene el permiso deseado
        //return collect($permisos)->contains('permisosmodulos_id', $idPermisoDeseado);
    }

}
