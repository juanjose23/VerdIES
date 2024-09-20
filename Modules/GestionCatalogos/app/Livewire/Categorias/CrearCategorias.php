<?php

namespace Modules\GestionCatalogos\Livewire\Categorias;
use Modules\GestionCatalogos\Models\Categoria;
use Livewire\Component;

class CrearCategorias extends Component
{
    public $nombre;
    public $descripcion;
    public $estado = 1;

    protected $rules = [
        'nombre' => 'required|unique:categoria,nombre| regex:/^[a-zA-Z\s]+$/',
        'estado' => 'required|int',
        'descripcion' => 'nullable|max:500',
    ];
    public function resetForm()
    {
        // Limpiar los campos y errores
        $this->reset(['nombre', 'descripcion', 'estado']);
        $this->resetErrorBag();
    }
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        $this->nombre = $categoria->nombre;
        $this->descripcion = $categoria->descripcion;
        $this->estado = $categoria->estado;

        // Opcional: Puedes manejar una propiedad `editing` para diferenciar entre creación y edición.
        $this->editing = true;
        $this->categoriaId = $categoria->id;
    }

    public function submitForm()
    {
        $this->validate();
        $NuevaCategoria = new Categoria();
        $NuevaCategoria->nombre = $this->nombre;
        $NuevaCategoria->descripcion = $this->descripcion;
        $NuevaCategoria->estado = $this->estado;
        $NuevaCategoria->save();
        // Lógica del formulario después de la validación
        session()->flash('message', 'Datos guardados con éxito.');
        $this->dispatch('close-offcanvas');
    }
    public function render()
    {
        return view('gestioncatalogos::livewire.categorias.crear-categorias');
    }
}
