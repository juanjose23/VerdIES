<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\InventarioService;

class Inventario extends Component
{
    use WithPagination;

    public $buscar = '';
    public $perPage = 10;
    public $estado = '';
    public $categoria = '';
    public $categorias = [];
    public $acopios=[];
    public $acopio;

    public function mount(InventarioService $inventarioService)
    {
        $this->categorias = $inventarioService->obtenerCategoriasDisponibles();
        $this->acopios=$inventarioService->obtenerCentrosAcopiosDisponibles();
    }

    public function render(InventarioService $inventarioService)
    {
        // Obtener los inventarios en el render
        $inventarios = $inventarioService->obtenerInventarios(
            $this->buscar,
            $this->estado,
            $this->categoria,
            $this->acopio,
            $this->perPage
        );

        return view('livewire.inventario', [
            'inventarios' => $inventarios,
            'categorias' => $this->categorias,
        ]);
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->resetPage(); // Reiniciar el paginado a la página 1
    }

    public function updated($propertyName, InventarioService $inventarioService)
    {
        if (in_array($propertyName, ['buscar', 'estado', 'categoria','acopio'])) {
            $this->resetPage(); // Reiniciar la página cuando cambian los filtros
        }
    }
}
