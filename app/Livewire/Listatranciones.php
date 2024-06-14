<?php

namespace App\Livewire;

use App\Models\Transciones;
use Livewire\Component;
use Livewire\WithPagination;

class Listatranciones extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;

    public function render()
    {
        $idUsuario = session('IdUser');
        // Realizar la búsqueda en todos los atributos del modelo
        $transciones = Transciones::with('users', 'promociones', 'monedas')
            ->whereHas('promociones', function ($query) use ($idUsuario) {
                $query->where('users_id', $idUsuario);
            })
            ->where(function ($query) {
                $query->where('puntos', 'like', '%' . $this->buscar . '%')

                    ->orWhereHas('users', function ($query) {
                        $query->where('email', 'like', '%' . $this->buscar . '%');

                    })
                    ->orWhereHas('promociones', function ($query) {
                        $query->where('nombre', 'like', '%' . $this->buscar . '%');

                    });
            })->paginate($this->perPage);
        return view('livewire.listatranciones', compact('transciones'));

    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
