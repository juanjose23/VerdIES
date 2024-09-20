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

    

  
}
