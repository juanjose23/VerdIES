<?php
namespace App\Services;
use App\Models\Recicladoras;
use Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class RecicladoraService
{
    protected $RecicladorasModel;
    public function __construct(Recicladoras $RecicladorasModel)
    {
        $this->RecicladorasModel = $RecicladorasModel;
    }

    public function CrearRecicladora(array $data): Recicladoras
    {
        $recicladora =$this->RecicladorasModel->newInstance();
        $recicladora->nombre = $data['nombre'];
        $recicladora->direccion = $data['direccion'];
        $recicladora->telefono = $data['telefono'];
        $recicladora->email = $data['correo'];
        $recicladora->nombre_contacto = $data['nombre_contacto'];
        $recicladora->telefono_contacto = $data['contacto_telefono'];
        $recicladora->email_contacto = $data['contacto_correo']; 
               $recicladora->estado = $data['estado'];
        $recicladora->save();

        return $recicladora;
    }

    public function ObtenerRecicladora($ReclidadoraId)
    {
        return $this->RecicladorasModel->findOrFail($ReclidadoraId);
    }
    public function ActualizarRecicladora(array $data, $recicladoraId)
    {
        // Encuentra el modelo Recicladora por su ID
        $recicladora = $this->ObtenerRecicladora($recicladoraId);

        // Lanza una excepción si no se encuentra
        if (!$recicladora) {
            throw new ModelNotFoundException('Recicladora no encontrada.');
        }

        // Actualiza los atributos del modelo
        $recicladora->nombre = $data['nombre'];
        $recicladora->direccion = $data['direccion'];
        $recicladora->telefono = $data['telefono'];
        $recicladora->email = $data['correo']; // Asegúrate de que el nombre del campo sea correcto
        $recicladora->nombre_contacto = $data['nombre_contacto'];
        $recicladora->telefono_contacto = $data['contacto_telefono'];
        $recicladora->email_contacto = $data['contacto_correo']; // Asegúrate de que el nombre del campo sea correcto
        $recicladora->estado = $data['estado'];

        // Guarda los cambios
        $recicladora->save();

        return $recicladora;
    }
    public function CambiarEstado($ReclidadoraId)
    {
        $recicladora=$this->ObtenerRecicladora($ReclidadoraId);
        // Cambia el estado del cargo
        $recicladora->estado = $recicladora->estado == 1 ? 0 : 1;
        $recicladora->save();
    }
}