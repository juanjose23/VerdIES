<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Aliado extends Component
{
    use WithPagination;

    public $buscar = '';
    public $perPage = 10;

    public function render()
    {
        // Realizar la búsqueda utilizando la relación entre users y rolesusuarios
        $users = User::with('imagenes')->whereHas('rolesUsuarios', function ($query) {
            $query->where('roles_id', 6)
                ->where('estado', 1);
        })
            ->where('estado', 1) // condición para users
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->buscar . '%');

            })
            ->whereHas('promociones', function ($query) {
                $query->where('estado', 1); // Promociones activas
            })
            ->paginate($this->perPage);
            $contador = User::whereHas('rolesUsuarios', function ($query) {
                $query->where('roles_id', 6)
                      ->where('estado', 1);
            })
            ->where('estado', 1) // condición para users
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->buscar . '%');
            })
            ->whereHas('promociones', function ($query) {
                $query->where('estado', 1); // Promociones activas
            })
            ->count();
        



        return view('livewire.aliados', compact('users','contador'));
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
