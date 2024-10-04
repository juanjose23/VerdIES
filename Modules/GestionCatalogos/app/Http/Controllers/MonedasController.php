<?php

namespace Modules\GestionCatalogos\Http\Controllers;

use Modules\GestionCatalogos\Http\Controllers\Controller;
use Modules\GestionCatalogos\Services\MonedasService;
use Illuminate\Http\Request;
class MonedasController extends Controller
{
  
    protected $MonedasServices;
    public function __construct(MonedasService $MonedasServices)
    {
        $this->middleware('can:create,Modules\GestionCatalogos\Models\Categoria')->only(['create', 'store']);
        $this->middleware('can:update,Modules\GestionCatalogos\Models\Categoria')->only(['edit', 'update']);
        $this->middleware('can:delete,Modules\GestionCatalogos\Models\Categoria')->only(['destroy']);
        $this->MonedasServices = $MonedasServices;
    }
    public function index()
    {
        return view('gestioncatalogos::Monedas.index');
    }

    public function edit($Id)
    {
        $Moneda=$this->MonedasServices->ObtenerMoneda($Id);

        return view('gestioncatalogos::Monedas.edit',compact('Moneda'));
    }

    public function update(Request $request,$monedas)
    {
        $MonedaActualizada = $this->MonedasServices->SubirLogo($monedas, $request);
     
        return redirect('admin/monedas')->with('success', 'Moneda actualizada exitosamente.');
    }

   
}
