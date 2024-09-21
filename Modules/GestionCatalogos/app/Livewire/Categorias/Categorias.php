<?php

namespace Modules\GestionCatalogos\Livewire\Categorias;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\GestionCatalogos\Services\CategoriaService;
use Illuminate\Validation\Rule;
use Modules\GestionCatalogos\Models\Categoria;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\On;
class Categorias extends Component
{
    use WithPagination;

    use WithPagination;

    public $nombre, $descripcion, $estado = 1;
    public $buscar = '';
    public $perPage = 10;
    public $categoriaId = null;
    public $editing = false;

    protected $CategoriasServices;

    public function __construct()
    {
        $this->CategoriasServices = App::make(CategoriaService::class);
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
        $this->reset(['nombre', 'descripcion', 'estado', 'categoriaId', 'editing']);
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

        if ($this->editing) {
            $this->CategoriasServices->actualizarCategoria($this->categoriaId, $data);

        } else {
            $this->CategoriasServices->crearCategoria($data);

        }

        $this->resetForm();
        $this->dispatch('swal', [
            'title' => 'Operación Exitosa',
            'text' => 'Categoría guardada correctamente.',
            'icon' => 'success'
        ]);
        $this->dispatch('close-offcanvas');
    }

    public function toggleStatus($id)
    {
        // Emitir un evento para mostrar la alerta de confirmación
        $this->dispatch('confirmToggleStatus', ['id' => $id]);
    }

    #[On('toggleStatusConfirmed')]
    public function toggleStatusConfirmed($id)
    {
   
        $this->CategoriasServices->cambiarEstadoCategoria($id);

        // Obtener el estado actual de la categoría para el mensaje
        $categoria = $this->CategoriasServices->obtenerCategoriaPorId($id);
        $nuevoEstado = $categoria->estado == 1 ? 'activada' : 'desactivada';

        // Enviar la alerta de éxito
        $this->dispatch('swal', [
            'title' => 'Operación Exitosa',
            'text' => "La categoría ha sido $nuevoEstado correctamente.",
            'icon' => 'success'
        ]);
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1);
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
