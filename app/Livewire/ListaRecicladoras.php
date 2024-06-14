<?php

namespace App\Livewire;

use App\Models\Recicladoras;
use Livewire\Component;
use Livewire\WithPagination;
class ListaRecicladoras extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
         // Realizar la búsqueda en todos los atributos del modelo
         $recicladoras = Recicladoras::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->buscar . '%')
                ->orWhere('direccion', 'like', '%' . $this->buscar . '%')
                ->orWhere('telefono', 'like', '%' . $this->buscar . '%')
                ->orWhere('nombre_contacto', 'like', '%' . $this->buscar . '%');
        })->paginate($this->perPage);
        
        return view('livewire.lista-recicladoras',compact('recicladoras'));
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
