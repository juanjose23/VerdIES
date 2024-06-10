<?php

namespace App\Livewire;

use App\Models\Tasas;
use Livewire\Component;
use Livewire\WithPagination;

class Tasa extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
        $tasas = Tasas::with(['materiales', 'materiales.categorias'])
            ->where('estado', 1)
            ->where(function ($query) {
                $query->where('cantidad', 'like', '%' . $this->buscar . '%')
                    ->orWhereHas('materiales', function ($query) {
                        $query->where('codigo', 'like', '%' . $this->buscar . '%')
                            ->orWhere('nombre', 'like', '%' . $this->buscar . '%')
                            ->orWhereHas('categorias', function ($query) {
                                $query->where('nombre', 'like', '%' . $this->buscar . '%');
                            });
                    });
            })
            ->paginate($this->perPage);


        return view('livewire.tasa', compact('tasas'));
    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
