<?php

namespace App\Http\Controllers\Promociones;

use App\Http\Controllers\Controller;
use App\Models\Puntos;
use App\Models\Transciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CanjearController extends Controller
{
    //
    public function __construct()
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"
        $this->middleware('can:create,App\Models\Promociones')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\Promociones')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Models\Promociones')->only(['destroy']);
        // Aplica el middleware de autorización a todos los métodos excepto "index" y "show"
        $this->middleware('can:viewAny,App\Models\Promociones')->except(['index', 'show']);
    }
    public function index()
    {
        return view('Gestion_Promociones.Canjes.index');
    }


    //
    /*public function update(Request $request, $id)
    {
        $promocion = Transciones::findOrFail($id);
        $Moneda=$promocion->monedas_id;
        $totalpuntodeducir=$promocion->puntos;
        $userid=$promocion->users_id;
        // Cambia el estado del cargo
        $promocion->estado = 1;
        $promocion->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado  ha sido cambiado exitosamente.');
        // Redireccionar a la vista de promociones o hacer cualquier otra acción
        return redirect()->route('canje.index')->with('success', 'Operación actualizada exitosamente.');
    }*/
    public function update(Request $request, $id)
    {
        // Encuentra la transacción existente
        $promocion = Transciones::findOrFail($id);
        $monedaId = $promocion->monedas_id;
        $totalPuntosADeducir = $promocion->puntos;
        $userId = $promocion->users_id;


        $puntos = Puntos::where('users_id', $userId)
        ->where('monedas_id', $monedaId)
        ->orderBy('created_at', 'asc') // Ordena por fecha de creación para deducir puntos más antiguos primero
        ->get();
        // Calcula el total de puntos disponibles
        $totalPuntosDisponibles = $puntos->sum('puntos');

        // Verifica si hay suficientes puntos para deducir
        if ($totalPuntosDisponibles < $totalPuntosADeducir) {
            // No hay suficientes puntos, muestra un mensaje de error
            return redirect()->route('canje.index')->with('error', 'No hay suficientes puntos para deducir.');
        }

        // Deducir puntos si hay suficientes
        $puntosRestantesADeducir = $totalPuntosADeducir;
        foreach ($puntos as $punto) {
            if ($puntosRestantesADeducir <= 0) {
                break; // Salir del bucle si ya hemos deducido todos los puntos necesarios
            }

            // Resta puntos del registro actual
            if ($punto->puntos >= $puntosRestantesADeducir) {
                $punto->puntos -= $puntosRestantesADeducir;
                $puntosRestantesADeducir = 0;
            } else {
                $puntosRestantesADeducir -= $punto->puntos;
                $punto->puntos = 0;
            }

            // Guarda el registro actualizado
            $punto->save();
        }
        // Actualiza el estado de la transacción
        $promocion->estado = 1;
        $promocion->save();
        // Redirige de vuelta a la página de índice con un mensaje flash de éxito
        return redirect()->route('canje.index')->with('success', 'Operación actualizada exitosamente.');
    }


    //
    public function destroy($promociones)
    {
        // Encuentra el cargo por su ID
        $promocion = Transciones::findOrFail($promociones);

        // Cambia el estado del cargo
        $promocion->estado = $promocion->estado == 0 ? 2 : 0;
        $promocion->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado  ha sido cambiado exitosamente.');

        return redirect()->route('canje.index');
    }

}
