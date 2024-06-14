<?php

namespace App\Livewire;

use App\Models\Promociones;
use Livewire\Component;
use Livewire\WithPagination;
class Promocion extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 10;
    public function render()
    {
        // Realizar la búsqueda en todos los atributos del modelo
        $promociones = Promociones::with('users','detalles','detalles.monedas','imagenes')->where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $this->buscar . '%')
                ->orWhereHas('users', function ($query) {
                    $query->where('name', 'like', '%' . $this->buscar . '%');

                })
                ->orWhereHas('detalles', function ($query) {
                    $query->where('cantidad', 'like', '%' . $this->buscar . '%');

                })
                ->orWhereHas('detalles.monedas', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->buscar . '%');

                });
        })->paginate($this->perPage);
//dd($promociones);
        return view('livewire.promocion',compact('promociones'));
    }
}
