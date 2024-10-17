<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMonedas;
use App\Http\Requests\StoreTasas;
use App\Http\Requests\UpdateTasas;
use App\Models\Materiales;
use App\Models\Monedas;
use App\Models\Tasas;
use App\Services\MaterialService;
use App\Services\MonedaService;
use App\Services\TasaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TasasController extends Controller
{
    //
    protected $tasaService;
    protected $materialService;
    protected $monedaService;
    public function __construct(TasaService $tasaService, MaterialService $materialService, MonedaService $monedaService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Categorias')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Categorias')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Categorias')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Categorias')->except(['index', 'show']);
        $this->tasaService = $tasaService;
        $this->materialService = $materialService;
        $this->monedaService =$monedaService;
    }
    public function index()
    {
        return view('Gestion_Catalogos.Tasas.index');
    }

    public function create()
    {
        $materiales = $this->materialService->obtenerCategoriasConMateriales();
        $monedas = $this->monedaService->ObtenerMonedasActivas();

        return view('Gestion_Catalogos.Tasas.create', compact('materiales', 'monedas'));
    }

    public function store(StoreTasas $request)
    {

      $this->tasaService->crearTasa($request->validated());
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('tasas.index');
    }
    public function edit($tasas)
    {
        $materiales = $this->materialService->obtenerMaterialesConCategoriasPorTasa($tasas);
        $monedas =   $this->monedaService->ObtenerMonedasActivas();
        return view('Gestion_Catalogos.Tasas.edit', compact('materiales', 'monedas'));
    }
    public function show($tasas)
    {
        $materiales =$this->materialService->obtenerMaterialesConCategoriasPorTasa($tasas);
        $monedas =  $this->monedaService->ObtenerMonedasActivas();
        $tasas =$this->tasaService->obtenerTasasPorMaterial($tasas);
        return view('Gestion_Catalogos.Tasas.show', compact('materiales', 'monedas', 'tasas'));
    }
    //
    public function update(UpdateTasas $request, $materiales)
    {
       
        $data=$request->validated();
        $this->tasaService->cambiarTasa($data,$materiales);
      
        Session::flash('success', 'El proceso se ha completado exitosamente.');
        return redirect()->back();

    }
    //
    public function destroy($materiales)
    {
      
        $this->tasaService->cambiarestado($materiales);
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado de la tasa ha sido cambiado exitosamente.');

        return redirect()->route('tasas.index');
    }
}
