<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Models\Inventarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Gestion_Reciclaje.Inventarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($inventarios)
    {
        //
        $entrega = Inventarios::findOrFail($inventarios);
        $entrega->load('acopios', 'materiales', 'materiales.categorias');
        return view('Gestion_Reciclaje.Inventarios.edit', compact('entrega'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $inventarios)
    {
        //
        $request->validate([
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|integer|in:0,1', // Asumiendo que los estados posibles son 0 y 1
        ]);
        $inventario = Inventarios::findOrFail($inventarios);
        $inventario->cantidad = $request->cantidad;
        $inventario->estado = $request->estado;
        $inventario->save();
        Session::flash('success', 'El estado  ha sido cambiado exitosamente.');
        return redirect()->route('inventarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
