<?php

namespace Modules\GestionCatalogos\Livewire\Materiales;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\GestionCatalogos\Models\Materiales as Material;
class Materiales extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
        // Realizar la búsqueda en todos los atributos del modelo
        $materiales = Material::with('categorias','imagenes')->where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $this->buscar . '%')
                ->orWhereHas('categorias', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->buscar . '%');

                });
        })->paginate($this->perPage);

        return view('gestioncatalogos::livewire.materiales.materiales',compact('materiales'));
    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
