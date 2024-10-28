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
        $users = User::whereHas('rolesUsuarios', function ($query) {
            $query->where('roles_id', 6)
                ->where('estado', 1); // condición para rolesusuarios
        })
            ->where('estado', 1) // condición para users
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->buscar . '%');
                // Puedes agregar más atributos de users si deseas
            })
            ->paginate($this->perPage);

        // Añadir foto de perfil a cada usuario
        $users->getCollection()->transform(function ($user) {
            $user->ObtenerInformacionUsuario($user->id);
            return $user;
        });

        return view('livewire.aliados', compact('users'));
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
