<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecicladoras;
use App\Http\Requests\UpdateRecicladoras;
use App\Models\Recicladoras;
use App\Services\RecicladoraService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecicladorasController extends Controller
{
    protected $recicladoraService;

    public function __construct(RecicladoraService $recicladoraService)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Acopios')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Acopios')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Acopios')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Acopios')->except(['index', 'show']);
        $this->recicladoraService = $recicladoraService;
    }

    public function index()
    {

        return view('Gestion_Reciclaje.Recicladoras.index');
    }

    public function create()
    {
        return view('Gestion_Reciclaje.Recicladoras.create');
    }

    public function store(StoreRecicladoras $request)
    {
        $this->recicladoraService->crearRecicladora($request->validated());
        return redirect()->route('recicladoras.index')->with('success', 'Recicladora creada exitosamente.');
    }

    public function edit($recicladoras)
    {
        $recicladora = $this->recicladoraService->obtenerRecicladoraPorId($recicladoras);
        return view('Gestion_Reciclaje.Recicladoras.edit', compact('recicladora'));
    }

    public function update(UpdateRecicladoras $request, $recicladoras)
    {
        $this->recicladoraService->actualizarRecicladora($recicladoras, $request->validated());
        return redirect()->route('recicladoras.index')->with('success', 'Recicladora actualizada exitosamente.');
    }

    public function destroy($recicladoras)
    {
        $this->recicladoraService->cambiarEstadoRecicladora($recicladoras);
        return redirect()->route('recicladoras.index');
    }
}
