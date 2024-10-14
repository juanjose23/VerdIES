<?php

namespace App\Services;
use App\Models\Areas;
use App\Models\DetalleUniversidad;
use App\Models\Media;
use App\Models\Universidades;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
class UniversidadService
{
    protected $universidadModel;
    protected $MediaModel;
    protected $detalleUniversidad;
    public function __construct(Universidades $universidadModel, Media $MediaModel, DetalleUniversidad $detalleUniversidad)
    {
        $this->universidadModel = $universidadModel;
        $this->MediaModel = $MediaModel;
        $this->detalleUniversidad = $detalleUniversidad;
    }

    public function CrearUniversidad($data)
    {
        // Crear nueva área
        $area = $this->universidadModel->newInstance();
        $area->nombre = $data['nombre'];
        $area->descripcion = $data['descripcion'];
        $area->estado = $data['estado'];
        $area->save();

        // Verificar si hay un archivo de logo y procesarlo
        if (isset($data['imagen'])) {
            // Subir la imagen a Cloudinary y obtener el resultado
            $result = $data['imagen']->storeOnCloudinary('Verdies/Facultades');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = $this->MediaModel->newInstance();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $area->id;
            $imagen->imagenable_type = get_class($area);
            $imagen->save();
        }
        // Decodificar el campo materialesData (IDs en formato JSON)
        $materialesIds = json_decode($data['materialesData'], true);

        // Llamar a CrearDetalle para cada material
        $this->CrearDetalle($area->id, $materialesIds);


    }

    public function CrearDetalle($UniversidadId, $detalles)
    {
        foreach ($detalles as $item) {
            $detalleU = $this->detalleUniversidad->newInstance();
            $detalleU->carreras_id = $item;
            $detalleU->universidades_id = $UniversidadId;
            $detalleU->estado = 1;
            $detalleU->save();

        }

    }
    public function ObtenerUniversidadesActivas()
    {
        return $this->universidadModel->where('estado', 1)->get();
    }
    public function obtenerArea($id)
    {
        return $this->universidadModel::with(['detalles','detalles.carreras'])->findOrFail($id);
    }

    public function ActualizarArea(Request $request, $id)
    {
        $area = $this->obtenerArea($id);

        // Actualizar los campos del área
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->estado = $request->estado;
        $area->save();

        // Manejo de la imagen
        if ($request->hasFile('logo')) {
            $imagenes = $area->imagenes;

            if ($imagenes) {
                $public_id = $imagenes['public_id'];
                Cloudinary::destroy($public_id);
                Media::destroy($imagenes['id']);
            }

            $result = $request->file('logo')->storeOnCloudinary('Verdies/Facultades');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = $this->MediaModel->newInstance();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $area->id;
            $imagen->imagenable_type = get_class($area);
            $imagen->save();
        }
            
        $materialesIds = json_decode($request->materialesData, true);

        // Validar si $materialesIds no está vacío antes de llamar a CrearDetalle
        if (!empty($materialesIds)) {
            $this->CrearDetalle($area->id, $materialesIds);
        }


        return $materialesIds;
    }

    public function CambiarEstado($id)
    {
        $area = $this->obtenerArea($id);

        // Cambiar el estado del área
        $area->estado = $area->estado == 1 ? 0 : 1;
        $area->save();

        return $area;
    }
    public function CambiarEstadoDetalle($id)
    {
        $detalle = $this->detalleUniversidad->findOrFail($id);

        // Cambiar el estado del área
        $detalle->estado = $detalle->estado == 1 ? 0 : 1;
        $detalle->save();

        return $detalle;
    }
}