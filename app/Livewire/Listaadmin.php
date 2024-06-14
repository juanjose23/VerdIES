<?php

namespace App\Livewire;

use App\Models\Transciones;
use Livewire\Component;
use Livewire\WithPagination;

class Listaadmin extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;

    public function render()
    {

        // Realizar la búsqueda en todos los atributos del modelo
        $transciones = Transciones::with('users', 'promociones', 'monedas','promociones.detalles')
            ->where(function ($query) {
                $query->where('puntos', 'like', '%' . $this->buscar . '%')

                    ->orWhereHas('users', function ($query) {
                        $query->where('email', 'like', '%' . $this->buscar . '%');

                    })
                    ->orWhereHas('promociones', function ($query) {
                        $query->where('nombre', 'like', '%' . $this->buscar . '%');

                    });
            })->paginate($this->perPage);
        return view('livewire.listaadmin', compact('transciones'));
    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
