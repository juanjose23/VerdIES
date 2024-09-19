<?php

namespace Modules\GestionCatalogos\Http\Controllers;

use Modules\GestionCatalogos\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategorias;
use Modules\GestionCatalogos\Services\CategoriaService;
use Modules\GestionCatalogos\Http\Requests\CategoriaStore;
use Gate;
class CategoriasController extends Controller
{
    //
    protected $CategoriasServices;
    public function __construct(CategoriaService $CategoriasServices)
    {
        $this->middleware('can:create,Modules\GestionCatalogos\Models\Categoria')->only(['create', 'store']);
        $this->middleware('can:update,Modules\GestionCatalogos\Models\Categoria')->only(['edit', 'update']);
        $this->middleware('can:delete,Modules\GestionCatalogos\Models\Categoria')->only(['destroy']);
        $this->CategoriasServices = $CategoriasServices;
    }
    public function index()
    {
       return view('gestioncatalogos::Categorias.index');
    }

    public function create()
    {
       

        // Verificar la autorización para el usuario autenticado
      //  Gate::authorize('create', $this->CategoriasServices);
        return view('gestioncatalogos::Categorias.create');
    }

    public function store(CategoriaStore $request)
    {
         $this->CategoriasServices->crearCategoria($request->all());
        
        return redirect()->route('categorias.index');
    }
    public function edit($id)
    {
        $categorias = $this->CategoriasServices->obtenerCategoriaPorId($id);
        return view('gestioncatalogos::Categorias.edit', compact('categorias'));
    }
    //
    public function update(UpdateCategorias $request, $categorias)
    {
        $this->CategoriasServices->actualizarCategoria($categorias, $request->all());
        return redirect()->route('categorias.index');
    }
    //
    public function destroy($categorias)
    {
        $this->CategoriasServices->cambiarEstadoCategoria($categorias);
        return redirect()->route('categorias.index');
    }
   

  
}
