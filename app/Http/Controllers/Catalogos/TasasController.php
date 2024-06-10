<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMonedas;
use App\Http\Requests\StoreTasas;
use App\Http\Requests\UpdateTasas;
use App\Models\Materiales;
use App\Models\Monedas;
use App\Models\Tasas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TasasController extends Controller
{
    //
    public function index()
    {
        return view('Gestion_Catalogos.Tasas.index');
    }

    public function create()
    {
        $materiales = Materiales::ObtenerCategoriasConMateriales();
        $monedas = Monedas::where('estado', 1)->get();

        return view('Gestion_Catalogos.Tasas.create', compact('materiales', 'monedas'));
    }

    public function store(StoreTasas $request)
    {
        $tasas = new Tasas();
        $tasas->materiales_id = $request->materiales;
        $tasas->monedas_id = $request->monedas;
        $tasas->cantidad = $request->cantidad;
        $tasas->estado = $request->estado;
        $tasas->save();

        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('tasas.index');
    }
    public function edit($tasas)
    {
        $materiales = Materiales::With(['categorias'])->find($tasas);
        $monedas = Monedas::where('estado', 1)->get();
        return view('Gestion_Catalogos.Tasas.edit', compact('materiales', 'monedas'));
    }
    public function show($tasas)
    {
        $materiales = Materiales::With(['categorias'])->find($tasas);
        $monedas = Monedas::where('estado', 1)->get();
        $tasas = Tasas::where('materiales_id', $tasas)->get();
        return view('Gestion_Catalogos.Tasas.show', compact('materiales', 'monedas', 'tasas'));
    }
    //
    public function update(UpdateTasas $request, $materiales)
    {
        $material = Tasas::where('materiales_id', $materiales)
            ->where('monedas_id', $request->monedas)
            ->first(); 

        if ($material) { 
            $material->estado = 0; 
            $material->save(); 
        }

        $tasas = new Tasas();
        $tasas->materiales_id = $materiales;
        $tasas->monedas_id = $request->monedas;
        $tasas->cantidad = $request->cantidad;
        $tasas->estado = $request->estado;
        $tasas->save();
        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->back();

    }
    //
    public function destroy($materiales)
    {
        // Encuentra el cargo por su ID
        $material = Tasas::findOrFail($materiales);

        // Cambia el estado del cargo
        $material->estado = $material->estado == 1 ? 0 : 1;
        $material->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado de la tasa ha sido cambiado exitosamente.');

        return redirect()->route('tasas.index');
    }
}
