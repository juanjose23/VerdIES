<?php
namespace App\Services;
use App\Models\RolesModel;
class RolServices
{
    protected $RolModel;
    public function __construct(RolesModel $RolModel)
    {
        $this->RolModel = $RolModel;
    }


    public function ListaRoles()
    {
        return $this->RolModel::where('estado', 1)->where('id', '!=', 1)->get(['id', 'nombre']);
    }

    public function ObtenerRol($RolId)
    {
        return $this->RolModel::findOrFail($RolId);
    }

    public function CrearRol($data)
    {
        $NuevoRol = $this->RolModel::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'estado' => $data['estado'],
        ]);

        return $NuevoRol;
    }

    public function ActualizarRol($RolId, $data)
    {
        $rol = $this->RolModel::find($RolId);

        if ($rol) {
            $rol->update([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
                'estado' => $data['estado']
            ]);
            return $rol;
        }

        return null;
    }

    public function CambiarEstado($RolId)
    {
        $rol = $this->RolModel::findorfail($RolId);
        $rol->estado = $rol->estado === 1 ? 0 : 1;
        $rol->save();
        return $rol;

    }
    /**
     * Obtiene los roles que no tienen privilegios asociados.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function obtenerRolesSinPrivilegios()
    {

        $roles = $this->RolModel::where('estado', 1)
            ->whereNotIn('id', [1])
            ->whereNotIn('id', function ($query) {
                $query->select('roles_id')->from('privilegiosroles');
            })->get();

        return $roles;
    }
}