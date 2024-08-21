<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEntregaMaterial;
use App\Notifications\EntregaVerificada;
use App\Services\EntregaMaterialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Services\MaterialService;
use App\Services\UserService;
use App\Services\CentroAcopioService;
class EntregasController extends Controller
{
    //
    protected $MaterialService;
    protected $UserService;
    protected $CentroAcopioService;
    protected $EntregaMaterialService;
    public function __construct(MaterialService $MaterialService, UserService $UserService, CentroAcopioService $CentroAcopioService, EntregaMaterialService $EntregaMaterialService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Acopios')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Acopios')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Acopios')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Acopios')->except(['index', 'show']);
        $this->MaterialService = $MaterialService;
        $this->UserService = $UserService;
        $this->CentroAcopioService = $CentroAcopioService;
        $this->EntregaMaterialService = $EntregaMaterialService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Gestion_Reciclaje.Entregas.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materiales = $this->MaterialService->obtenerMaterialesConCategoriasEnTasas();
        $usuarios = $this->UserService->ObtenerUsuariosActivos();
        $acopios = $this->CentroAcopioService->ObtenerAcopioActivos();
        return view('Gestion_Reciclaje.Entregas.create', compact('materiales', 'usuarios', 'acopios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntregaMaterial $request)
    {

        $entrega = $this->EntregaMaterialService->CrearEntrega([
            'user_id' => $request->user,
            'acopios_id' => $request->acopios
        ]);

        $materialesData = json_decode($request->materialesData, true);

        if (is_array($materialesData)) {
            $this->EntregaMaterialService->procesarMateriales($entrega, $materialesData);
        } else {
            echo "Hola";
        }
        $user = $this->UserService->ObtenerUsuario($request->user);
        $user->notify(new EntregaVerificada());
        // inventario
        Session::flash('success', 'Se ha registado correctamente la operación');
        Session::flash('Limpiar', 'Se ha limpiado el localstorage');
        return redirect()->route('entregas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($entregas)
    {
        //
        $entrega = $this->EntregaMaterialService->ObtenerEntrega($entregas);
        $materiales = $this->EntregaMaterialService->ObtenerDetalleEntrega($entrega);

        return view('Gestion_Reciclaje.Entregas.edit', compact('entrega', 'materiales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $entregas)
    {
        // Actualizar la entrega

        $entrega = $this->EntregaMaterialService->ActualizarEntrega($entregas, $request->all());
        if (!$entrega) {
            // Maneja el caso donde la entrega no existe
            Session::flash('error', 'La entrega no se encontró.');
            return redirect()->route('entregas.index');
        }
        if ($request->estado == 2) {
            // Decodificar la cadena JSON en un array asociativo
            $materialesDatas = json_decode($request->materialesData, true);


            if (is_array($materialesDatas)) {
                // Procesar los materiales utilizando el servicio
                $this->EntregaMaterialService->ActualizarMateriales($entrega, $materialesDatas);
            } else {
                // Manejar el caso donde la decodificación JSON falló
                Log::error('La decodificación JSON falló para materialesData: ' . $request->materialesData);
            }
        }

        // Obtener usuario y enviar notificación
        $user = $this->UserService->ObtenerUsuario($request->user);
        $user->notify(new EntregaVerificada());

        // Redirigir y mostrar mensaje de éxito
        Session::flash('success', 'Se ha registrado correctamente la operación');
        return redirect()->route('entregas.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $entregas)
    {
        $entrega = $this->EntregaMaterialService->CambiarEstado($entregas);
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('entregas.index');
    }
}
