<?php

namespace App\Livewire;

use App\Models\Carreras;
use Livewire\Component;
use Livewire\WithPagination;
class Carrera extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
        // Realizar la búsqueda en todos los atributos del modelo
        $carreras = Carreras::with('imagenes')->where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $this->buscar . '%');
               
        })->paginate($this->perPage);

        return view('livewire.carrera',compact('carreras'));
    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
