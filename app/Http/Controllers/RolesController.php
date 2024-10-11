<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoles;
use App\Http\Requests\UpdateRoles;
use App\Models\RolesModel;
use App\Services\RolServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller
{
    //
    protected $rolServices;
    public function __construct(RolServices $rolServices)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\permisos')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\permisos')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\permisos')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\permisos')->except(['index', 'show']);
        $this->rolServices=$rolServices;
    }
    public function index()
    {
        return view('Gestion_usuarios.Roles.index');
    }

    public function create()
    {
        
        return view('Gestion_usuarios.Roles.create');
    }

    public function store(StoreRoles $request)
    {
        
        $data = $request->validated();
        $role = $this->rolServices->CrearRol($data);
        Session::flash('success', 'Se ha registrado con éxito la operación');
        return redirect()->route('roles.index');
    }

    public function edit($roles)
    {
        $rol=$this->rolServices->ObtenerRol($roles);
        return view('Gestion_usuarios.Roles.edit',compact('rol'));
    }

    public function update(UpdateRoles $request, $roles)
    {
        $data = $request->validated();
        
        // Usa solo argumentos posicionales
        $role = $this->rolServices->ActualizarRol($roles, $data);
        
        Session::flash('success', 'Se ha registrado con éxito la operación');
        return redirect()->route('roles.index');
    }
    

   

    public function destroy(RolesModel $roles)
    {
          // Encuentra el cargo por su ID
          $rol = RolesModel::findOrFail($roles->id);

          // Cambia el estado del cargo
          $rol->estado = $rol->estado == 1 ? 0 : 1;
          $rol->save();
          // Redirige de vuelta a la página de índice con un mensaje flash
          Session::flash('success', 'El estado del rol ha sido cambiado exitosamente.');
  
          return redirect()->route('roles.index');
    }
}
