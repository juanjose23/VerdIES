<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Models\Acopios;
use App\Models\Detalles_entregas;
use App\Models\Detalles_Recepciones;
use App\Models\Entregas;
use App\Models\Inventarios;
use App\Models\Materiales;
use App\Models\Puntos;
use App\Models\Recepciones;
use App\Models\Tasas;
use App\Models\User;
use App\Notifications\EntregaVerificada;
use App\Services\CentroAcopioService;
use App\Services\MaterialService;
use App\Services\RecepcionMaterialesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class EntregasController extends Controller
{
    //
    protected $materialService;
    protected $centroAcopioService;
    protected $recepcionMaterialesService;
    public function __construct(MaterialService $materialService, CentroAcopioService $centroAcopioService,RecepcionMaterialesService $recepcionMaterialesService)
    {
        $this->materialService = $materialService;
        $this->centroAcopioService = $centroAcopioService;
        $this->recepcionMaterialesService =$recepcionMaterialesService;
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Acopios')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Acopios')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Acopios')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Acopios')->except(['index', 'show']);
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
        $materiales = $this->materialService->ObtenerCategorias();
        $usuarios = User::where('estado', 1)->get();
        $acopios = $this->centroAcopioService->ObtenerAcopioActivos();
        return view('Gestion_Reciclaje.Entregas.create', compact('materiales', 'usuarios', 'acopios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos entrantes
        $validatedData = $request->validate([
            'acopios' => 'required|exists:acopios,id', 
            'user' => 'required|exists:users,id', 
            'materialesData' => 'required',
           
        ]);

        // Decodificar el JSON de 'materialesData'
        $materialesData = json_decode($validatedData['materialesData'], true);

        // Crear la entrega utilizando los datos validados
        $entrega = $this->recepcionMaterialesService->CrearEntrega([
            'user' => $validatedData['user'],
            'acopios' => $validatedData['acopios'],
            'nota' => $validatedData['nota'] ?? '', // Si es opcional
            'estado' => 2, // Asignar un estado por defecto
        ]);

        // Procesar los materiales para esa entrega
        $this->recepcionMaterialesService->ProcesarMateriales($entrega, $materialesData);
        Session::flash('success', 'Se ha registrado correctamente la operación');
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
        $entrega = Recepciones::findOrFail($entregas);
        $entrega->load('imagenes', 'acopios', 'users');
        $materiales = Detalles_Recepciones::where('recepciones_id', $entregas)->get();
        return view('Gestion_Reciclaje.Entregas.edit', compact('entrega', 'materiales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $entregas)
    {
        // Buscar la entrega correspondiente
        $entrega = Recepciones::findOrFail($entregas);

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
                        $detalle = Detalles_Recepciones::firstOrNew(['materiales_id' => $item->id, 'recepciones_id' => $entrega->id]);
                        $detalle->monedas_id = $tasa->monedas_id;
                        $detalle->cantidad = $item->cantidad;
                        $detalle->cantidadlibra =$item->cantidadlibra;
                        $detalle->valor = $tasa->cantidad * $item->cantidad + $tasa->cantidadlibra * $item->cantidadlibra;

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

        $acopio = Recepciones::findOrFail($entregas);
        // Cambia el estado del cargo
        $acopio->estado = $request->estado;
        $acopio->save();
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('entregas.index');
    }
}
