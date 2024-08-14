<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMonedas;
use App\Http\Requests\UpdateMonedas;
use App\Models\Media;
use App\Models\Monedas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
Use App\Services\MonedaService;
class MonedasController extends Controller
{
    protected $monedaService;
    public function __construct(MonedaService $monedaService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Categorias')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Categorias')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Categorias')->only(['destroy']);
        $this->monedaService = $monedaService;
    }
    public function index()
    {
        return view('Gestion_Catalogos.Monedas.index');
    }

    public function create()
    {
       
        return view('Gestion_Catalogos.Monedas.create');
    }

    public function store(StoreMonedas $request)
    {
        $moneda = $this->monedaService->CrearMonedas($request->all());
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('monedas.index');
    }
    public function edit($monedas)
    {
        $moneda = $this->monedaService->ObtenerMoneda($monedas);
    
        return view('Gestion_Catalogos.Monedas.edit', compact('moneda'));
    }
    //
    public function update(UpdateMonedas $request, $monedas)
    {
        try {
            $result = $this->monedaService->actualizarMoneda($monedas, $request);
            Session::flash('success', $result['message']);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }

        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->route('monedas.index');
    }
    //
    public function destroy($monedas)
    {
        
        try {
            $result = $this->monedaService->cambiarEstadoMoneda($monedas);
            Session::flash('success', $result['message']);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('monedas.index');
    }

}
