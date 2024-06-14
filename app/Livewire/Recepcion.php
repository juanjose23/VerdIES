<?php

namespace App\Livewire;

use App\Models\Acopios;
use App\Models\Entregas;
use App\Models\Materiales;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Recepcion extends Component
{
    
    public $centroAcopio;
    public $search = '';

    public function render()
    {
        $acopios = Acopios::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('descripcion', 'like', '%' . $this->search . '%');
            // Agrega más atributos aquí si deseas incluirlos en la búsqueda
        })->get()   ;
        $materialess = Materiales::ObtenerCategoriasConMateriales();

        return view('livewire.recepcion', compact('materialess', 'acopios'));
    }
   

}
