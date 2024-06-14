<?php

namespace App\Livewire;

use App\Models\Categorias;
use App\Models\Materiales;
use Livewire\Component;

class ListaMateriales extends Component
{
    public $buscar = '';
    public $activeFilter = 'all';

    public function render()
    {
        $materiales = Materiales::query();

        if ($this->buscar !== '') {
            $materiales = $materiales->where('nombre', 'like', '%' . $this->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $this->buscar . '%');
        }

        if ($this->activeFilter !== 'all') {
            $materiales = $materiales->whereHas('categorias', function ($query) {
                $query->where('nombre', $this->activeFilter);
            });
        }

        $materiales = $materiales->paginate(10);
        $materiales->load('imagenes');
        $categorias = Categorias::has('materiales')->get();
        return view('livewire.lista-materiales', compact('materiales', 'categorias'));
    }

    public function filterByCategory($categoria)
    {
        $this->activeFilter = $categoria;
    }

    public function resetFilters()
    {
        $this->buscar = '';
        $this->activeFilter = 'all';
    }
}
