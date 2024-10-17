<?php

namespace App\Livewire;
use App\Models\Recepciones;
use Livewire\Component;
use Livewire\WithPagination;
class Entregas  extends Component
{
    
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
         // Realizar la búsqueda en todos los atributos del modelo
         $entregas = Recepciones::with(['acopios','users'])
         ->where('estado',1)
         ->where(function ($query) {
            $query->where('codigo', 'like', '%' . $this->buscar . '%')
            ->orWhereHas('acopios', function ($query) {
                $query->where('nombre', 'like', '%' . $this->buscar . '%');

            })
            ->orWhereHas('users', function ($query) {
                $query->where('email', 'like', '%' . $this->buscar . '%');

            });
            // Agrega más atributos aquí si deseas incluirlos en la búsqueda
        })->paginate($this->perPage);
        
        return view('livewire.entregas',compact('entregas'));
    }
     public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
