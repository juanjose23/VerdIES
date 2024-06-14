<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
class EntregaMaterial extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
        // Realizar la búsqueda en todos los atributos del modelo
        $entregas = \App\Models\EntregaMaterial::with(['recicladoras', 'users'])

            ->where(function ($query) {
                $query->where('codigo', 'like', '%' . $this->buscar . '%')
                    ->where('total', 'like', '%' . $this->buscar . '%')
                    ->orWhereHas('recicladoras', function ($query) {
                        $query->where('nombre', 'like', '%' . $this->buscar . '%');

                    })
                    ->orWhereHas('users', function ($query) {
                        $query->where('name', 'like', '%' . $this->buscar . '%');

                    });
                // Agrega más atributos aquí si deseas incluirlos en la búsqueda
            })->paginate($this->perPage);

        return view('livewire.entrega-material',compact('entregas'));
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
