<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Services\CategoriaService;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreCategorias;
use App\Http\Requests\UpdateCategorias;
class CategoriasController extends Controller
{
    //
    protected $categoriaService;
    public function __construct(CategoriaService $categoriaService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Categorias')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Categorias')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Categorias')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Categorias')->except(['index', 'show']);
        $this->categoriaService = $categoriaService;
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
        $data = $request->validated();
     $this->categoriaService->crearCategoria($data);
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('categorias.index');
    }
    public function edit($categoriasId)
    {
        $categorias = $this->categoriaService->obtenerCategoriaPorId($categoriasId);

        return view('Gestion_Catalogos.Categorias.edit', compact('categorias'));
    }
    //
    public function update(UpdateCategorias $request, $categorias)
    {
        $data = $request->validated();
        $this->categoriaService->actualizarCategoria($categorias, $data);
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('categorias.index');
    
    }
    //
    public function destroy($categorias)
    {
        $this->categoriaService->cambiarEstadoCategoria($categorias);
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado del categoria ha sido cambiado exitosamente.');

        return redirect()->route('categorias.index');
    }



}
