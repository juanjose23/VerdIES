<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Models\DetalleEntregaMaterial;
use App\Models\EntregaMaterial;
use App\Models\Inventarios;
use App\Models\Materiales;
use App\Models\Recicladoras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
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
        return view('Gestion_Reciclaje.Materiales.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materiale = new Materiales();
        $materiales = $materiale->ObtenerInventario();
        $recicladoras = Recicladoras::where('estado', 1)->get();
        //return $materiales;
        return view('Gestion_Reciclaje.Materiales.create', compact('materiales', 'recicladoras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $materialesDatas = json_decode($request->materialesData);
        $total=0;
        if ($materialesDatas !== null) {
            foreach ($materialesDatas as $item) {
                $total += $item->peso *$item->precio;
            }
        } else {
        }
        $maxId = EntregaMaterial::max('id');
        $nuevoId = $maxId ? $maxId + 1 : 1;
        $codigo = 'En-' . $nuevoId;
        $entregas = new EntregaMaterial();
        $entregas->users_id = Auth::id();
        $entregas->recicladoras_id = $request->recicladoras;
        $entregas->codigo = $codigo;
        $entregas->total = $total;
        $entregas->save();
        $materialesData = json_decode($request->materialesData);

        // Verificar si la decodificación fue exitosa
        if ($materialesData !== null) {
            // Iterar sobre los datos de materiales
            foreach ($materialesData as $item) {

                $inventarios = Inventarios::findOrFail($item->id);
                $inventarios->cantidad -= $item->cantidad;
                $material= $inventarios->materiales_id;
                $inventarios->save();
                // Crear un nuevo detalle de entrega
                $detalle = new DetalleEntregaMaterial();
                $detalle->entrega_materiales_id = $entregas->id;
                $detalle->materiales_id = $material;
                $detalle->cantidad = $item->cantidad;
                $detalle->peso = $item->peso;
                $detalle->precio = $item->precio;
               
                $detalle->save();




            }
        } else {
            // Manejar el caso donde la decodificación JSON falló
        }

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
    


}
