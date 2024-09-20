<?php

namespace Modules\GestionCatalogos\Livewire\Categorias;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\GestionCatalogos\Services\CategoriaService;
use Illuminate\Validation\Rule;
use Modules\GestionCatalogos\Models\Categoria;
use Illuminate\Support\Facades\App;
class Categorias extends Component
{
    use WithPagination;

    public $nombre, $descripcion, $estado;
    public $buscar = '';
    public $perPage = 10;
    public $categoriaId = null;
    public $editing = false;
    protected $CategoriasServices;

    public function __construct()
    {
        $this-> CategoriasServices= App::make(CategoriaService::class);
    }
   

    public function rules()
    {
        return [
            'nombre' => [
                'required',
                Rule::unique('categoria', 'nombre')->ignore($this->categoriaId),
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'estado' => 'required|int',
            'descripcion' => 'nullable|max:500',
        ];
    }
    public function resetForm()
    {
        $this->nombre = '';
        $this->descripcion = '';
        $this->estado = 1; // O el valor predeterminado que desees
        $this->categoriaId = null;
        $this->editing = false;
    }
    
    public function edit($id)
    {
        $categoria = $this->CategoriasServices->obtenerCategoriaPorId($id);

        $this->nombre = $categoria->nombre;
        $this->descripcion = $categoria->descripcion;
        $this->estado = $categoria->estado;
        $this->editing = true;
        $this->categoriaId = $categoria->id;
    }

    public function submitForm()
    {
        $this->validate();

        $data = [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
        ];

        $this->CategoriasServices->actualizarCategoria($this->categoriaId, $data);

        session()->flash('message', 'Categoría actualizada con éxito.');
        $this->reset(); // Reiniciar campos
    }

    public function toggleStatus($id)
    {
     
        $this->CategoriasServices->cambiarEstadoCategoria($id);
        session()->flash('message', 'Estado de la categoría actualizado con éxito.');
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }

    public function render()
    {
        $Categorias = Categoria::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->buscar . '%')
                  ->orWhere('descripcion', 'like', '%' . $this->buscar . '%');
        })->paginate($this->perPage);

        return view('gestioncatalogos::livewire.categorias.categorias', compact('Categorias'));
    }
}
