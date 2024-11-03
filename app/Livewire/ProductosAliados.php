<?php

namespace App\Livewire;

use App\Models\Promociones;
use App\Models\Monedas;
use App\Models\Puntos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ProductosAliados extends Component
{
    use WithPagination;

    public $buscar = '';
    public $perPage = 10;
    public $idUsuario;
    public $productoSeleccionado; // Nueva propiedad para almacenar el producto seleccionado

    public function mount($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function render()
    {
        $productos = Promociones::with(['detalles.monedas', 'imagenes']) // Agrega 'imagenes' para cargar la relación
            ->where('estado', 1)
            ->where('users_id', $this->idUsuario)
            ->where(function ($query) {
                $query->where('nombre', 'like', '%' . $this->buscar . '%')
                    ->orWhere('descripcion', 'like', '%' . $this->buscar . '%');
            })
            ->select('id', 'nombre', 'descripcion')
            ->paginate($this->perPage);

        return view('livewire.productosAliado', compact('productos'));
    }


    public function abrirModalQuickAdd($productoId)
    {
        // Cambiar a `dispatch` en lugar de `emit` y asegurar el nombre del evento
        $this->dispatch('cargarProducto', productoId: $productoId);
    }

    #[On('cargarProducto')]
    public function cargarProducto(int $productoId)
    {
        // Cargar el producto seleccionado
        $producto = Promociones::with('detalles.monedas', 'imagenes')->find($productoId);

        // Obtener la moneda del usuario con respecto al id del detalle de la promoción
        $userId = Auth::id();

        // Acceder al primer detalle de promoción y su moneda
        $detallePromocion = $producto->detalles->first();
        $detalleMonedaId = $detallePromocion->monedas->id ?? null;

        if ($detalleMonedaId) {
            // Buscar en la tabla `puntos` la moneda específica para el usuario
            $detalleMonedaUsuario = Puntos::where('users_id', $userId)
                ->where('monedas_id', $detalleMonedaId)
                ->first();

            $monedaUsuario = Monedas::where('id', $detalleMonedaId)->first();

            if ($detalleMonedaUsuario) {
                // Asignar la información de la moneda y los puntos al producto
                $producto->moneda = [
                    'id' => $detalleMonedaUsuario->monedas_id,
                    'nombre' => $monedaUsuario->nombre,
                    'descripcion' => $monedaUsuario->descripcion,
                    'puntos' => $detalleMonedaUsuario->puntos,
                    'imagen_url' => $monedaUsuario->imagenes->url ?? 'ruta/a/imagen/predeterminada.jpg',

                    // Puedes agregar más atributos de la moneda si deseas
                ];
            }

            // Emitir el evento `mostrarModalQuickAdd` con los datos del producto
            $this->dispatch('mostrarModalQuickAdd', producto: $producto);
        }
    }


    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->gotoPage(1);
    }
}
