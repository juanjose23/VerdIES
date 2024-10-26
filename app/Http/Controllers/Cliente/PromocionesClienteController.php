<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Promociones;
use App\Models\User;

class PromocionesClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function promociones()
    {
        return view('cliente.promociones');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        // Obtén el usuario por su id y selecciona solo el nombre
        $usuario = User::select('id', 'name')->findOrFail($id);
    
        // Retorna la vista con el id y el nombre del usuario
        return view('cliente.establecimientos', compact('usuario'), ['showCart' => true], ['cssFonts' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('cliente::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
