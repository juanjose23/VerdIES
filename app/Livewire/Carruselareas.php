<?php

namespace App\Livewire;

use App\Models\Areas;
use Livewire\Component;

class Carruselareas extends Component
{
    public function render()
    {
        $areas = Areas::with(['imagenes'])->where('estado',1)->get();
        return view('livewire.carruselareas',compact('areas'));
    }
}
