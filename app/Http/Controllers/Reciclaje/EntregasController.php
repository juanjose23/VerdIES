<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Models\Acopios;
use App\Models\Detalles_entregas;
use App\Models\Entregas;
use App\Models\Inventarios;
use App\Models\Materiales;
use App\Models\Puntos;
use App\Models\Tasas;
use App\Models\User;
use App\Notifications\EntregaVerificada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class EntregasController extends Controller
{
    //
    public function __construct()
    {
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
        $materiale = new Materiales();
        $materiales = $materiale->ObtenerCategorias();
        $usuarios = User::where('estado', 1)->get();
        $acopios = Acopios::where('estado', 1)->get();
        return view('Gestion_Reciclaje.Entregas.create', compact('materiales', 'usuarios', 'acopios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $entregas = new Entregas();
        $codigo = $entregas->generarCodigoUnico();
        $entregas->users_id = $request->user;
        $entregas->acopios_id = $request->acopios;
        $entregas->codigo = $codigo;
        $entregas->nota = "";
        $entregas->estado = 2;
        $entregas->save();
        $materialesData = json_decode($request->materialesData);

        // Verificar si la decodificación fue exitosa
        if ($materialesData !== null) {
            // Iterar sobre los datos de materiales
            foreach ($materialesData as $item) {
                // Acceder a las propiedades de cada artículo del carrito
                $tasa = Tasas::where('materiales_id', $item->id)->where('estado', 1)->first();

                // Verificar si se encontró una tasa válida
                if ($tasa) {
                    // Crear un nuevo detalle de entrega
                    $detalle = new Detalles_entregas();
                    $detalle->entregas_id = $entregas->id;
                    $detalle->materiales_id = $item->id;
                    $detalle->monedas_id = $tasa->monedas_id;
                    $detalle->cantidad = $item->cantidad;
                    $detalle->valor = $tasa->cantidad * $item->cantidad;
                    $detalle->save();
                    $punto = new Puntos();

                    $punto->users_id = $request->user;
                    $punto->monedas_id = $tasa->monedas_id;
                    $punto->puntos = $tasa->cantidad * $item->cantidad;
                    $punto->save();

                    $inventarios = Inventarios::firstOrNew([
                        'materiales_id' => $item->id,
                        'acopios_id' => $request->acopios
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
                    // Manejar el caso donde no se encontró una tasa válida (opcional)
                }
            }
        } else {
            // Manejar el caso donde la decodificación JSON falló
        }
        $user = User::find($request->user);
        $user->notify(new EntregaVerificada());
        // inventario
        Session::flash('success', 'Se ha registado correctamente la operación');
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
