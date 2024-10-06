<?php
namespace Modules\GestionCatalogos\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\GestionCatalogos\Models\Materiales;
use Modules\GestionCatalogos\Services\MaterialService;
use Modules\GestionCatalogos\Services\CategoriaService;
use Request;
use Session;

class MaterialesController extends Controller
{
    protected $MaterialesService;
    protected $categoriaService;
    public function __construct(MaterialService $MaterialesService, CategoriaService $categoriaService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
     //   $this->middleware('can:create,Modules\GestionCatalogos\Models\Categorias')->only(['create', 'store']);
      //  $this->middleware('can:update,Modules\GestionCatalogos\Models\Categorias')->only(['edit', 'update']);
       // $this->middleware('can:delete,Modules\GestionCatalogos\Models\Categorias')->only(['destroy']);
        $this->MaterialesService = $MaterialesService;
        $this->categoriaService = $categoriaService;

    }
    public function index()
    {
        return view('gestioncatalogos::Materiales.index');
    }

    public function create()
    {
        $categorias = $this->categoriaService->ObtenerCategoriasActivas();
        return view('gestioncatalogos::Materiales.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $this->MaterialesService->create($request->all());
        return redirect()->route('materiales.index');
    }
    public function edit($materiales)
    {
       
        $material = $this->MaterialesService->obtenerMaterialPorId($materiales);
        $categorias = $this->categoriaService->ObtenerCategoriasActivas();
        return view('gestioncatalogos::Materiales.create',compact('categorias'));
    }
    //
    public function update(Request $request, $materiales)
    {
        $this->MaterialesService->ActualizarMaterial($materiales, $request);
        return redirect()->route('materiales.index');
    }
    //
    public function destroy(Materiales $materiales)
    {
        try {
            $success = $this->MaterialesService->cambiarEstadoMaterial($materiales->id);
            if ($success) {
                Session::flash('success', 'El estado del material ha sido cambiado exitosamente.');
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }

        return redirect()->route('materiales.index');
    }



}
