<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMonedas;
use App\Http\Requests\StoreTasas;
use App\Http\Requests\UpdateTasas;
use App\Models\Materiales;
use App\Models\Monedas;
use App\Models\Tasas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Services\MaterialService;
use App\Services\MonedaService;
use App\Services\TasaService;

class TasasController extends Controller
{
    //
    protected $MaterialesService;
    protected $MonedaServices;
    protected $TasaServices;

    public function __construct(MaterialService $MaterialesService, MonedaService $MonedaServices, TasaService $TasaServices)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Categorias')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Categorias')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Categorias')->only(['destroy']);
        $this->MaterialesService = $MaterialesService;
        $this->MonedaServices = $MonedaServices;
        $this->TasaServices = $TasaServices;

    }
    public function index()
    {
        return view('Gestion_Catalogos.Tasas.index');
    }

    public function create()
    {
        $materiales = $this->MaterialesService->ObtenerCategoriasConMateriales();
        $monedas = $this->MonedaServices->ObtenerMonedasActivas();

        return view('Gestion_Catalogos.Tasas.create', compact('materiales', 'monedas'));
    }

    public function store(StoreTasas $request)
    {

        $this->TasaServices->crearTasa($request->all());
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('tasas.index');
    }
    public function edit($tasas)
    {
        $materiales = $this->MaterialesService->encontrarMaterialConCategorias($tasas);
        $monedas = $this->MonedaServices->ObtenerMonedasActivas();

        return view('Gestion_Catalogos.Tasas.edit', compact('materiales', 'monedas'));
    }
    public function show($tasas)
    {
        $materiales = Materiales::With(['categorias'])->find($tasas);
        $monedas = Monedas::where('estado', 1)->get();
        $tasas = Tasas::where('materiales_id', $tasas)->get();
        return view('Gestion_Catalogos.Tasas.show', compact('materiales', 'monedas', 'tasas'));
    }
    //
    public function update(UpdateTasas $request, $materiales)
    {
        try {
            // Llamar al método del servicio para cambiar la tasa
            $this->TasaServices->cambiarTasa($request->all());

            return redirect()->route('tasas.index')->with('success', 'Tasa guardada o actualizada correctamente.');
        } catch (\Exception $e) {
            Log::error('Error en el controlador de tasas: ' . $e->getMessage());
            return redirect()->route('tasas.index')->withErrors('Ocurrió un error al guardar o actualizar la tasa.');
        }


    }
    //
    
}
