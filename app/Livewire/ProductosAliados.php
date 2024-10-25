<?php

namespace App\Livewire;

use App\Models\Promociones;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosAliados extends Component
{
    use WithPagination;

    public $buscar = '';
    public $perPage = 10;
    public $idUsuario;

    public function mount($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    
    public function render()
    {
        // Consulta basada en el id recibido
        $productos = Promociones::where('estado', 1)
            ->where('users_id', $this->idUsuario)
            ->where(function ($query) {
                $query->where('nombre', 'like', '%' . $this->buscar . '%')
                      ->orWhere('descripcion', 'like', '%' . $this->buscar . '%');
            })
            ->select('id', 'nombre', 'descripcion')
            ->paginate($this->perPage);

        return view('livewire.productosAliado', compact('productos'));
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
