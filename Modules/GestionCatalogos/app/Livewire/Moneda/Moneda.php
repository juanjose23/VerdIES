<?php

namespace Modules\GestionCatalogos\Livewire\Moneda;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\GestionCatalogos\Services\MonedasService;
use Illuminate\Validation\Rule;
use Modules\GestionCatalogos\Models\Monedas;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\On;
use Modules\GestionCatalogos\Models\Media;
use Livewire\WithFileUploads;

class Moneda extends Component
{
    use WithPagination, WithFileUploads;

    public $nombre, $descripcion, $estado = 1;
    public $buscar = '';
    public $perPage = 10;
    public $MonedaId = null;
    public $editing = false;
    
  

    protected $MonedasServices;

    public function __construct()
    {
        $this->MonedasServices = App::make(MonedasService::class);
    }

    public function rules()
    {
        return [
            'nombre' => [
                'required',
                Rule::unique('monedas', 'nombre')->ignore($this->MonedaId),
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'estado' => 'required|int',
            'descripcion' => 'nullable|max:500',
            
        ];
    }

    public function resetForm()
    {
        $this->reset(['nombre', 'descripcion', 'estado', 'MonedaId', 'editing']);
    }

    public function edit($id)
    {
        $Moneda = $this->MonedasServices->ObtenerMoneda($id);

        $this->nombre = $Moneda->nombre;
        $this->descripcion = $Moneda->descripcion;
        $this->estado = $Moneda->estado;
        $this->editing = true;
        $this->MonedaId = $Moneda->id;
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
            $this->MonedasServices->ActualizarMoneda($this->MonedaId, $data);

        } else {
            $this->MonedasServices->CrearMoneda($data);

        }

        $this->resetForm();
        $this->dispatch('swal', [
            'title' => 'Operación Exitosa',
            'text' => 'Moneda guardada correctamente.',
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
   
        $this->MonedasServices->CambiarEstadoMoneda($id);

        // Obtener el estado actual de la categoría para el mensaje
        $moneda = $this->MonedasServices->ObtenerMoneda($id);
        $nuevoEstado = $moneda->estado == 1 ? 'activada' : 'desactivada';

        // Enviar la alerta de éxito
        $this->dispatch('swal', [
            'title' => 'Operación Exitosa',
            'text' => "La moneda ha sido $nuevoEstado correctamente.",
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
        $Monedas = Monedas::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $this->buscar . '%');
        })->paginate($this->perPage);
        return view('gestioncatalogos::livewire.moneda.moneda',compact('Monedas'));
    }
}
