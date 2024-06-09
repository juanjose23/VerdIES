<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
class Privilegios extends Component
{  use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
        $roles = \App\Models\Privilegios::with(['submodulos', 'submodulos.modulos', 'roles'])
        ->select('roles_id', \App\Models\Privilegios::raw('COUNT(submodulos_id) as cantidad'))
        ->groupBy('roles_id')
        ->where(function ($query) {
            $query->orWhereHas('roles', function ($query) {
                $query->where('nombre', 'like', '%' . $this->buscar . '%');
                $query->where('descripcion', 'like', '%' . $this->buscar . '%');
            });
        })
       
        ->paginate($this->perPage);

        return view('livewire.privilegios',compact('roles'));
    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
