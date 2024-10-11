<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsers;
use App\Http\Requests\UpdateUser;
use App\Models\Empleados;
use App\Models\RolesModel;
use App\Models\RolesUsuarios;
use App\Models\User;
use App\Services\RolServices;
use App\Services\UserServices;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller
{
    //
    protected $userServices;
    protected $rolServices;
    public function __construct(UserServices $userServices, RolServices $rolServices)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\permisos')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\permisos')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\permisos')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\permisos')->except(['index', 'show']);
        $this->userServices = $userServices;
        $this->rolServices = $rolServices;
    }
    public function index()
    {
        return view('Gestion_usuarios.usuarios.index');
    }

    public function create()
    {
        $roles = $this->rolServices->ListaRoles();
        return view('Gestion_usuarios.usuarios.create', compact('roles'));
    }

    public function store(StoreUsers $request)
    {
        $data =
            [
                "name" => $request->nombre,
                "email" => $this->userServices->generarNombreUsuario($request->nombre),
                "password" => $this->userServices->generarContrasenaSegura(),
                "estado" => $request->estado
            ];

        $NuevoUser = $this->userServices->CrearUsuario($data);
        $AsignarRol = $this->userServices->AsignarRol($NuevoUser->id, $request->roles);
        return redirect()->back()->with('success', 'Se ha realizado la operación correctamente');
    }

    public function edit($usuarios)
    {
        //Roles
        $roles = new RolesModel();
        $usuario = User::findOrFail($usuarios);
        $rolesusuarios = RolesUsuarios::where('users_id', $usuarios)->get();
        $rolesdisponibles = $roles->obtenerRolesDisponiblesParaUsuario($usuarios);
        // return $usuario;
        return view('Gestion_usuarios.usuarios.edit', compact('usuario', 'rolesusuarios', 'rolesdisponibles'));
    }
    public function update(UpdateUser $request, $usuarios)
    {
        $userRol = new RolesUsuarios();
        $userRol->roles_id = $request->roles;
        $userRol->users_id = $usuarios;
        $userRol->estado = 1;
        $userRol->save();
        return redirect()->back()->with('success', 'Nuevo rol asignado correctamente');
    }
    public function destroy($usuarios)
    {
        $usuario = User::findOrFail($usuarios);

        // Cambia el estado del cargo
        $usuario->estado = $usuario->estado == 1 ? 0 : ($usuario->estado == 2 ? 1 : 2);

        $usuario->save();


        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado del usuario ha sido cambiado exitosamente.');

        return redirect()->route('usuarios.index');
    }


    public function destroyroles($id)
    {

        $rol = RolesUsuarios::findOrFail($id);

        // Cambia el estado del cargo
        $rol->estado = $rol->estado == 1 ? 0 : 1;
        $rol->save();
        return redirect()->back()->with('success', 'Rol desactivado correctamente');
    }
}
