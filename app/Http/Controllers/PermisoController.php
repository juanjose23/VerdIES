<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermisos;
use App\Services\PermisoServices;
use App\Services\RolServices;
use Illuminate\Support\Facades\Session;


class PermisoController extends Controller
{
    //
    protected $rolServices;
    protected $permisoServices;
    public function __construct(RolServices $rolServices, PermisoServices $permisoServices)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\permisos')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\permisos')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\permisos')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\permisos')->except(['index', 'show']);
        $this->rolServices = $rolServices;
        $this->permisoServices = $permisoServices;
    }

    public function index()
    {
        return view('Gestion_usuarios.Permisos.index');
    }


    public function create()
    {
        $roles = $this->rolServices->obtenerRolesSinPrivilegios();
        $permisos = $this->permisoServices->obtenerPermisosModulos();
        return view('Gestion_usuarios.Permisos.create', compact('roles', 'permisos'));
    }


    public function edit($permisos)
    {
        $rol = $this->rolServices->ObtenerRol(RolId: $permisos);
        $permisos = $this->permisoServices->obtenerpermisosfaltantes($permisos);
        return view('Gestion_usuarios.Permisos.edit', compact('permisos', 'rol'));
    }


    public function store(StorePermisos $request)
    {
        $rolId = $request->rol;
        $permisos = $request->submodulos;

        $this->permisoServices->AsignarPermiso($rolId, $permisos);
        Session::flash('success', 'Se ha realizado la operación');
        return redirect()->route('permisos.index');
    }
    public function show($permisos)
    {
        $rol = $this->rolServices->ObtenerRol($permisos);
        $permisos = $this->permisoServices->mostrarpermisosrol($permisos);
        // return $permisos;
        return view('Gestion_usuarios.Permisos.show', compact('rol', 'permisos'));

    }
    public function destroy($permisos)
    {
        try {

            $this->permisoServices->EliminarPermiso($permisos);

            return redirect()->back()->with('success', 'Permiso eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el permiso: ' . $e->getMessage());
        }
    }
}
