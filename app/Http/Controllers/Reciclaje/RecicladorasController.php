<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecicladoras;
use App\Http\Requests\UpdateRecicladoras;
use App\Models\Recicladoras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\RecicladoraService;
class RecicladorasController extends Controller
{
    //
    protected $RecicladoraService;
    public function __construct(RecicladoraService $RecicladoraService)
    {
        $this->RecicladoraService = $RecicladoraService;
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
        $recicladoras = $this->RecicladoraService->CrearRecicladora($request->all());
        return redirect()->route('recicladoras.index')->with('success', 'Recicladora actualizada exitosamente.');
    }


    public function edit($recicladoras)
    {
        $recicladora = $this->RecicladoraService->ObtenerRecicladora($recicladoras);
        return view('Gestion_Reciclaje.Recicladoras.edit', compact('recicladora'));
    }

    public function update(UpdateRecicladoras $request, $recicladoras)
    {
        $recicladora = $this->RecicladoraService->ActualizarRecicladora($request->all(), $recicladoras);

        // Redirección con mensaje de éxito
        return redirect()->route('recicladoras.index')->with('success', 'Recicladora actualizada exitosamente.');
    }

    public function destroy($recicladoras)
    {

        $this->RecicladoraService->CambiarEstado($recicladoras);
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado  ha sido cambiado exitosamente.');

        return redirect()->route('recicladoras.index');
    }
}
