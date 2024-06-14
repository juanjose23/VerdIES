<?php

namespace App\Livewire;

use App\Models\Categorias;
use App\Models\Materiales;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class RecepcionMateriales extends Component
{
    public $buscar = '';
    public $activeFilter = 'all';
    public $cartItems;
    public $id;
    public function mount($id)
    {
        $this->id = $id;
        $this->cartItems = CartFacade::session(Auth::id())->getContent();
    }
    public function render()
    {
        // Obtener los IDs de los materiales en el carrito
        $materialIdsEnCarrito = $this->cartItems->pluck('id')->toArray();
    
        $materiales = Materiales::whereNotIn('id', $materialIdsEnCarrito)
        ->whereHas('tasas', function ($query) {
            $query->where('estado', 1); // Asegúrate de que 'estado' sea el nombre correcto del campo en la tabla 'tasas'
        });
        if ($this->buscar !== '') {
            $materiales = $materiales->where('nombre', 'like', '%' . $this->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $this->buscar . '%');
        }
    
        if ($this->activeFilter !== 'all') {
            $materiales = $materiales->whereHas('categorias', function ($query) {
                $query->where('nombre', $this->activeFilter);
            });
        }
    
        $materiales = $materiales->paginate(10);
        $materiales->load('imagenes');
        $categorias = Categorias::has('materiales')->get();
        
        return view('livewire.recepcion-materiales', compact('categorias', 'materiales'));
    }
    
}