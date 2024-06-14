<?php

namespace App\Http\Controllers\Reciclaje;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecicladoras;
use App\Http\Requests\UpdateRecicladoras;
use App\Models\Recicladoras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecicladorasController extends Controller
{
    //
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
        $recicladora = new Recicladoras();
        $recicladora->nombre = $request->nombre;
        $recicladora->direccion = $request->direccion;
        $recicladora->telefono = $request->telefono;
        $recicladora->email = $request->email;
        $recicladora->nombre_contacto = $request->nombre_contacto;
        $recicladora->telefono_contacto = $request->telefono_contacto;
        $recicladora->email_contacto = $request->contacto_correo;
        
        $recicladora->estado = $request->estado;
        $recicladora->save();
        return redirect()->route('recicladoras.index')->with('success', 'Recicladora actualizada exitosamente.');
    }


    public function edit($recicladoras)
    {
        $recicladora = Recicladoras::findOrFail($recicladoras);
        return view('Gestion_Reciclaje.Recicladoras.edit',compact('recicladora'));
    }

    public function update(UpdateRecicladoras $request, $recicladoras)
    {
        $recicladora = Recicladoras::findOrFail($recicladoras);

        $recicladora->nombre = $request->nombre;
        $recicladora->direccion = $request->direccion;
        $recicladora->telefono = $request->telefono;
        $recicladora->email = $request->correo;
        $recicladora->nombre_contacto = $request->nombre_contacto;
        $recicladora->telefono_contacto = $request->contacto_telefono;
        $recicladora->email_contacto = $request->contacto_correo;
        $recicladora->estado = $request->estado;
        $recicladora->save();

        // Redirección con mensaje de éxito
        return redirect()->route('recicladoras.index')->with('success', 'Recicladora actualizada exitosamente.');
    }

    public function destroy($recicladoras)
    {
        // Encuentra el cargo por su ID
        $recicladora = Recicladoras::findOrFail($recicladoras);

        // Cambia el estado del cargo
        $recicladora->estado = $recicladora->estado == 1 ? 0 : 1;
        $recicladora->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado  ha sido cambiado exitosamente.');

        return redirect()->route('recicladoras.index');
    }
}
