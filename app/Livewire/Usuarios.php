<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class Usuarios extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;

    public function render()
    {
        $usuarios = User::whereHas('rolesusuarios', function ($query) {
            $query->where('roles_id', '!=', 1);
        })
        ->where(function ($query) {
            $query->where('name', 'like', '%' . $this->buscar . '%')
                  ->orWhere('email', 'like', '%' . $this->buscar . '%');
        })
        ->paginate($this->perPage);
    
        return view('livewire.usuarios',compact('usuarios'));
    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
