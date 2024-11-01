<?php

namespace App\Livewire;

use App\Models\Monedas;
use App\Models\Puntos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TotalMonedasUser extends Component
{
    public $monedasConPuntos = [];

    public function mount()
    {
        $this->obtenerMonedasConPuntos();
    }

    public function render()
    {
        return view('livewire.totalMonedasUser', ['totalMonedasUser' => $this->monedasConPuntos]);
    }

    private function obtenerMonedasConPuntos()
    {
        $userId = Auth::id();

        // Obtener todas las monedas activas (estado = 1) junto con sus imágenes
        $monedas = Monedas::where('estado', 1)
            ->with('imagenes')
            ->get(['id', 'nombre', 'descripcion']);

        // Mapear cada moneda para obtener su información y puntos del usuario
        $this->monedasConPuntos = $monedas->map(function ($moneda) use ($userId) {
            $puntos = Puntos::where('users_id', $userId)
                ->where('monedas_id', $moneda->id)
                ->value('puntos') ?? 0; // Si no tiene puntos, devolver 0

            return [
                'id' => $moneda->id,
                'nombre' => $moneda->nombre,
                'descripcion' => $moneda->descripcion,
                'puntos' => $puntos,
                'imagen_url' => $moneda->imagenes->url ?? 'ruta/a/imagen/predeterminada.jpg',
            ];
        })->toArray();
    }
}
