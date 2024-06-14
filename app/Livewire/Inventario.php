<?php

namespace App\Livewire;

use App\Models\Inventarios;
use Livewire\Component;
use Livewire\WithPagination;
class Inventario extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
         // Realizar la búsqueda en todos los atributos del modelo
         $inventarios = Inventarios::with(['acopios','materiales','materiales.categorias'])->where(function ($query) {
            $query->where('cantidad', 'like', '%' . $this->buscar . '%')
                ->orWhereHas('acopios', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->buscar . '%');

                })
                ->orWhereHas('materiales', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->buscar . '%');

                })
                ->orWhereHas('materiales.categorias', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->buscar . '%');

                });
        })->paginate($this->perPage);

        
        return view('livewire.inventario',compact('inventarios'));
    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
