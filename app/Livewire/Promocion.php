<?php

namespace App\Livewire;

use App\Models\Promociones;
use App\Models\RolesUsuarios;
use Livewire\Component;
use Livewire\WithPagination;
class Promocion extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public $userId;

    public function mount()
    {
        // Obtener el ID del usuario desde la sesión
        $this->userId = session('IdUser');
    }
    public function render()
    {
        $roleUsuario = RolesUsuarios::where('users_id', $this->userId)->first();

        // Inicializar la consulta
        $promocionesQuery = Promociones::with('users', 'detalles', 'detalles.monedas', 'imagenes', 'categorias');
        if ($roleUsuario->roles_id == 6) {

            $promocionesQuery->where('users_id', $this->userId);
        }

        // Agregar condiciones de búsqueda
        $promocionesQuery->where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $this->buscar . '%')
                ->orWhereHas('users', function ($query) {
                    $query->where('name', 'like', '%' . $this->buscar . '%');
                })
                ->orWhereHas('detalles', function ($query) {
                    $query->where('cantidad', 'like', '%' . $this->buscar . '%');
                })
                ->orWhereHas('categorias', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->buscar . '%');
                })
                ->orWhereHas('detalles.monedas', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->buscar . '%');
                });
        });

        // Ejecutar la paginación
        $promociones = $promocionesQuery->paginate($this->perPage);

        // Retornar la vista con las promociones
        return view('livewire.promocion', compact('promociones'));
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
