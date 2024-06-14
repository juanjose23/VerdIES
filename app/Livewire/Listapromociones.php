<?php

namespace App\Livewire;

use App\Models\Promociones;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Listapromociones extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
        $hoy = Carbon::now();

        // Nombre correcto de la tabla detalles
        $tablaDetalles = 'detalle_promociones'; // Cambiar si el nombre de la tabla es diferente
        $columnaCantidad = 'cantidad'; // Cambiar si el nombre de la columna es diferente
    
        $promociones = Promociones::with('users', 'detalles', 'detalles.monedas', 'imagenes')
            ->where('estado', 1) // Solo mostrar promociones con estado 1
            ->where('fecha_vencimiento', '>=', $hoy) // Solo mostrar promociones cuya fecha de vencimiento no haya pasado
            ->whereHas('detalles', function ($query) use ($tablaDetalles, $columnaCantidad) {
                $query->whereRaw("$tablaDetalles.$columnaCantidad > (SELECT COUNT(*) FROM transciones WHERE transciones.promociones_id = promociones.id)");
            })
            ->where(function ($query) {
                $query->where('nombre', 'like', '%' . $this->buscar . '%')
                    ->orWhere('descripcion', 'like', '%' . $this->buscar . '%')
                    ->orWhereHas('users', function ($query) {
                        $query->where('name', 'like', '%' . $this->buscar . '%');
                    })
                    ->orWhereHas('detalles', function ($query) {
                        $query->where('cantidadmoneda', 'like', '%' . $this->buscar . '%');
                    })
                    ->orWhereHas('detalles.monedas', function ($query) {
                        $query->where('nombre', 'like', '%' . $this->buscar . '%');
                    });
            })
            ->paginate($this->perPage);

        return view('livewire.listapromociones', compact('promociones'));
    }
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1); // Reiniciar el paginado a la página 1
    }
}
