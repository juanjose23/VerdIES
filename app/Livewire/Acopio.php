<?php

namespace App\Livewire;

use App\Models\Acopios;
use Livewire\Component;
use Livewire\WithPagination;
class Acopio extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
         // Realizar la búsqueda en todos los atributos del modelo
         $acopios = Acopios::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $this->buscar . '%');
            // Agrega más atributos aquí si deseas incluirlos en la búsqueda
        })->paginate($this->perPage);
        
        return view('livewire.acopio',compact('acopios'));
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
