<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Aliados extends Component
{
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
        // Realiza la consulta en función del texto de búsqueda
        $promociones = User::whereHas('rolesusuarios', function ($query) {
            $query->where('roles_id', 6);
        })
            ->where('name', 'like', '%' . $this->buscar . '%') // Búsqueda dinámica por nombre
            ->paginate($this->perPage);

            $totalUsuarios = User::whereHas('rolesusuarios', function ($query) {
                $query->where('roles_id', 6);
            })
            ->where('name', 'like', '%' . $this->buscar . '%') // Búsqueda dinámica por nombre
            ->count(); // Contar el total de usuarios
        
        return view('livewire.aliados', compact('promociones','totalUsuarios'));
    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
