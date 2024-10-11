<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeprivilegios;
use App\Models\Privilegios;
use App\Models\RolesModel;
use App\Models\submodulos;
use App\Services\PrivilegioServices;
use App\Services\RolServices;
use Illuminate\Support\Facades\Session;

class PrivilegiosController extends Controller
{
    //
    protected $privilegioServices;
    protected $rolServices;
    public function __construct(RolServices $rolServices, PrivilegioServices $privilegioServices)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\permisos')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\permisos')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\permisos')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\permisos')->except(['index', 'show']);
        $this->rolServices=$rolServices;
        $this->privilegioServices= $privilegioServices;
    }
    public function index()
    {

        return view('Gestion_usuarios.Privilegios.index');
    }
    public function create()
    {
        
        $modulos =$this->privilegioServices::ObtenerModulosConSubmodulos();
        $Roles = $this->rolServices->obtenerRolesSinPrivilegios();
        return view('Gestion_usuarios.Privilegios.create', compact('modulos', 'Roles'));
    }

    public function store(Storeprivilegios $request)
    {
        $rolId = $request->rol;
        $submodulos = $request->submodulos;

        // Llamar al servicio para asignar los privilegios
        $this->privilegioServices->AsignarPrivilegio($rolId, $submodulos);
        Session::flash('success', 'Se ha realizado la operación');
        return redirect()->route('privilegios.index');
    }

    public function edit($privilegios)
    {
        
        $rol=$this->rolServices->ObtenerRol($privilegios);
        $modulos= $this->privilegioServices	->ObtenerModulosConSubmodulosFaltantes($privilegios);
        return view('Gestion_usuarios.Privilegios.edit',compact('modulos','rol'));
    }
    public function show($privilegios)
    {
        $rol=$this->rolServices->ObtenerRol($privilegios);
        $modulos=$this->privilegioServices->ObtenerPrivilegiosRol($privilegios);
        return view('Gestion_usuarios.Privilegios.show',compact('modulos','rol'));
      
    }
    public function destroy($privilegios)
    {
        try {
           
      $this->privilegioServices->EliminarPrivilegio($privilegios);
    
            return redirect()->back()->with('success', 'Privilegio eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el privilegio: ' . $e->getMessage());
        }
    }

}
