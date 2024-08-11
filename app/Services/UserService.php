<?php 

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserService
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function hasPrivilege($userId, $privilegeId): bool
    {
        // Ejecuta la consulta para verificar si el usuario tiene el privilegio deseado
        $result = DB::table('privilegiosroles as pr')
            ->select('m.id AS id_modulo')
            ->join('submodulos AS sm', 'sm.id', '=', 'pr.submodulos_id')
            ->join('modulos AS m', 'm.id', '=', 'sm.modulos_id')
            ->leftJoin('rolesusuarios AS rt', 'rt.roles_id', '=', 'pr.roles_id')
            ->leftJoin('users AS u', 'rt.users_id', '=', 'u.id')
            ->where('rt.users_id', '=', $userId)
            ->where('rt.estado', '=', 1)
            ->where('pr.submodulos_id', '=', $privilegeId)
            ->exists();
        
        return $result;
    }
}
