<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAcopios;
use App\Http\Requests\UpdateAcopios;
use App\Models\Acopios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AcopiosController extends Controller
{
    //
    public function __construct()
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Acopios')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Acopios')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Acopios')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Acopios')->except(['index', 'show']);
    }
    public function index()
    {
        return view('Gestion_Reciclaje.Acopios.index');
    }

    public function create()
    {
        return view('Gestion_Reciclaje.Acopios.create');
    }

    public function store(StoreAcopios $request)
    {
       /* $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->double('latitude', 15, 8)->nullable();
        $table->double('longitude', 15, 8)->nullable();
        $table->integer('estado');*/
        $acopio = new Acopios();
        $acopio->nombre = $request->nombre;
        $acopio->descripcion = $request->descripcion;
        $acopio->latitude=$request->latitude;
        $acopio->longitude=$request->longitude;
        $acopio->estado = $request->estado;
        $acopio->save();
   
        Session::flash('success', 'Se ha registado correctamente la operación');
        return redirect()->route('acopios.index');
    }
    public function edit($acopios)
    {
        $acopio = Acopios::findOrFail($acopios);
      

         return view('Gestion_Reciclaje.Acopios.edit', compact('acopio'));
    }
    //
    public function update(UpdateAcopios $request, $acopios)
    {
        $acopio = Acopios::findOrFail($acopios);


        $acopio->nombre = $request->nombre;
        $acopio->descripcion = $request->descripcion;
        $acopio->latitude=$request->latitude;
        $acopio->longitude=$request->longitude;
        $acopio->estado = $request->estado;
        $acopio->save();
        Session::flash('success', 'El proceso se ha completado exitosamente.');


        return redirect()->route('acopios.index');
    }
    //
    public function destroy($acopios)
    {
        // Encuentra el cargo por su ID
        $acopio = Acopios::findOrFail($acopios);

        // Cambia el estado del cargo
        $acopio->estado = $acopio->estado == 1 ? 0 : 1;
        $acopio->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado  ha sido cambiado exitosamente.');

        return redirect()->route('acopios.index');
    }

}
