<?php

namespace App\Services;

use App\Models\Recicladoras;
use Illuminate\Support\Facades\Session;

class RecicladoraService
{
    protected $recicladoraModel;

    public function __construct(Recicladoras $recicladoraModel)
    {
        
        $this->recicladoraModel = $recicladoraModel;
    }

    /**
     * Obtener todas las recicladoras.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function obtenerRecicladoras()
    {
        return $this->recicladoraModel::all();
    }

    /**
     * Crear una nueva recicladora.
     *
     * @param array $data
     * @return Recicladoras
     */
    public function crearRecicladora(array $data)
    {
        $recicladora = new $this->recicladoraModel();
        $recicladora->nombre = $data['nombre'];
        $recicladora->direccion = $data['direccion'];
        $recicladora->telefono = $data['telefono'];
        $recicladora->email = $data['correo'];
        $recicladora->nombre_contacto = $data['nombre_contacto'];
        $recicladora->telefono_contacto = $data['contacto_correo'];
        $recicladora->email_contacto = $data['contacto_correo'];
        $recicladora->estado = $data['estado'];
        $recicladora->save();
        return $recicladora;
    }

    /**
     * Obtener una recicladora por su ID.
     *
     * @param int $id
     * @return Recicladoras
     */
    public function obtenerRecicladoraPorId($id)
    {
        return $this->recicladoraModel::findOrFail($id);
    }

    /**
     * Actualizar una recicladora existente.
     *
     * @param int $id
     * @param array $data
     * @return Recicladoras
     */
    public function actualizarRecicladora($id, array $data)
    {
        $recicladora = $this->recicladoraModel::findOrFail($id);
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

    /**
     * Cambiar el estado de una recicladora.
     *
     * @param int $id
     * @return void
     */
    public function cambiarEstadoRecicladora($id)
    {
        $recicladora = $this->recicladoraModel::findOrFail($id);
        $recicladora->estado = $recicladora->estado == 1 ? 0 : 1;
        $recicladora->save();
        Session::flash('success', 'El estado ha sido cambiado exitosamente.');
    }
}
