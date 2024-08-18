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
      
        if ($materialesData !== null) {
            $this->EntregaMaterialService->procesarMateriales($entrega, $materialesData);
        } else {
            // Manejar el caso donde la decodificación JSON falló
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
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($entregas)
    {
        //
        $entrega = Entregas::findOrFail($entregas);
        $entrega->load('imagenes', 'acopios', 'users');
        $materiales = Detalles_entregas::where('entregas_id', $entregas)->get();
        return view('Gestion_Reciclaje.Entregas.edit', compact('entrega', 'materiales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $entregas)
    {
        // Buscar la entrega correspondiente
        $entrega = Entregas::findOrFail($entregas);

        // Actualizar la nota y el estado de la entrega
        $entrega->nota = $request->nota;
        $iduser = $entrega->users_id;
        $acopio = $entrega->acopios_id;
        $entrega->estado = $request->estado;
        $entrega->save();

        if ($request->estado == 2) {
            // Decodificar la cadena JSON en un array asociativo
            $materialesData = json_decode($request->materialesData);
            // Verificar si la decodificación fue exitosa
            if ($materialesData !== null) {
                // Iterar sobre los datos de materiales
                foreach ($materialesData as $item) {
                    // Buscar la tasa correspondiente al material
                    $tasa = Tasas::where('materiales_id', $item->id)->where('estado', 1)->first();

                    // Verificar si se encontró una tasa válida
                    if ($tasa) {
                        // Buscar o crear un nuevo detalle de entrega
                        $detalle = Detalles_entregas::firstOrNew(['materiales_id' => $item->id, 'entregas_id' => $entrega->id]);
                        $detalle->monedas_id = $tasa->monedas_id;
                        $detalle->cantidad = $item->cantidad;
                        $detalle->valor = $tasa->cantidad * $item->cantidad;
                        $detalle->save();

                        // Crear un nuevo registro en la tabla de puntos
                        $puntos = new Puntos();
                        $puntos->users_id = $iduser;
                        $puntos->monedas_id = $tasa->monedas_id;
                        $puntos->puntos = $tasa->cantidad * $item->cantidad;
                        $puntos->save();

                        $inventarios = Inventarios::firstOrNew([
                            'materiales_id' => $item->id,
                            'acopios_id' => $acopio
                        ]);

                        if ($inventarios->exists) {
                            // Si el inventario ya existe, sumar la cantidad
                            $inventarios->cantidad += $item->cantidad;
                        } else {
                            // Si el inventario no existe, asignar la nueva cantidad
                            $inventarios->cantidad = $item->cantidad;
                        }

                        $inventarios->estado = 1;
                        $inventarios->save();



                    } else {
                        // Manejar el caso donde no se encontró una tasa válida
                        Log::error('No se encontró una tasa válida para el material ID: ' . $item->id);
                    }
                }
            } else {
                // Manejar el caso donde la decodificación JSON falló
                Log::error('La decodificación JSON falló para materialesData: ' . $request->materialesData);
            }

        }
        // Notificar al usuario
        $user = User::find($iduser);
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

        $acopio = Entregas::findOrFail($entregas);
        // Cambia el estado del cargo
        $acopio->estado = $request->estado;
        $acopio->save();
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('entregas.index');
    }
}
