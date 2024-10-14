<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMateriales;
use App\Http\Requests\UpdateMateriales;
use App\Models\Categorias;
use App\Models\Materiales;
use App\Models\Media;
use App\Services\MaterialService;
use App\Services\CategoriaService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class MaterialesController extends Controller
{
    protected $categoriaService;
    protected $materialService;
    public function __construct(CategoriaService $categoriaService, MaterialService $materialService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Categorias')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Categorias')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Categorias')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Categorias')->except(['index', 'show']);
        $this->categoriaService = $categoriaService;
        $this->materialService = $materialService;
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
        $data = $request->validated();
        $this->materialService->CrearMaterial($data);
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('materiales.index');
    }
    public function edit($materiales)
    {
        $material = $this->materialService->obtenerMaterialPorId($materiales);

        $categorias = $this->categoriaService->ObtenerCategoriasActivas();
        return view('Gestion_Catalogos.Materiales.edit', compact('material', 'categorias'));
    }
    //
    public function update(UpdateMateriales $request, $materiales)
    {

        $this->materialService->ActualizarMaterial($materiales, $request);
        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->route('materiales.index');
    }
    //
    public function destroy($materiales)
    {
        $this->materialService->cambiarEstadoMaterial($materiales);
        Session::flash('success', 'El estado del material ha sido cambiado exitosamente.');

        return redirect()->route('materiales.index');
    }



}
