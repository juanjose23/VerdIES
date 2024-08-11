<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategorias;
use App\Http\Requests\UpdateCategorias;
use App\Services\CategoriaService;
class CategoriasController extends Controller
{
    //
    protected $CategoriasServices;
    public function __construct(CategoriaService $CategoriasServices)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Categorias')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Categorias')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Categorias')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Categorias')->except(['index', 'show']);
        $this->CategoriasServices = $CategoriasServices;
    }
    public function index()
    {
       return view('Gestion_Catalogos.Categorias.index');
    }

    public function create()
    {
        return view('Gestion_Catalogos.Categorias.create');
    }

    public function store(StoreCategorias $request)
    {
        $categoria = $this->CategoriasServices->crearCategoria($request->all());
        
        return redirect()->route('categorias.index');
    }
    public function edit($id)
    {
        $categorias = $this->CategoriasServices->obtenerCategoriaPorId($id);
        return view('Gestion_Catalogos.Categorias.edit', compact('categorias'));
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
