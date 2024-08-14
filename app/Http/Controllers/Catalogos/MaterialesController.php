<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMateriales;
use App\Http\Requests\UpdateMateriales;
use App\Models\Materiales;
use Illuminate\Support\Facades\Session;

use App\Services\MaterialService;
use App\Services\CategoriaService;

class MaterialesController extends Controller
{
    protected $MaterialesService;
    protected $categoriaService;
    public function __construct(MaterialService $MaterialesService, CategoriaService $categoriaService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Categorias')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Categorias')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Categorias')->only(['destroy']);
        $this->MaterialesService = $MaterialesService;
        $this->categoriaService = $categoriaService;

    }
    public function index()
    {
        return view('Gestion_Catalogos.Materiales.index');
    }

    public function create()
    {
        $categorias = $this->categoriaService->ObtenerCategoriasActivas();
        return view('Gestion_Catalogos.Materiales.create', compact('categorias'));
    }

    public function store(StoreMateriales $request)
    {
        $this->MaterialesService->create($request->all());
        return redirect()->route('materiales.index');
    }
    public function edit($materiales)
    {
        $material = $this->MaterialesService->obtenerMaterialPorId($materiales);
        $categorias = $this->categoriaService->ObtenerCategoriasActivas();
        return view('Gestion_Catalogos.Materiales.edit', compact('material', 'categorias'));
    }
    //
    public function update(UpdateMateriales $request, $materiales)
    {
        $this->MaterialesService->ActualizarMaterial($materiales, $request);
        return redirect()->route('materiales.index');
    }
    //
    public function destroy($materiales)
    {
        try {
            $success = $this->MaterialesService->cambiarEstadoMaterial($materiales);
            if ($success) {
                Session::flash('success', 'El estado del material ha sido cambiado exitosamente.');
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }

        return redirect()->route('materiales.index');
    }



}
