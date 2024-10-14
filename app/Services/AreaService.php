<?php

namespace App\Services;
use App\Models\Areas;
use App\Models\Media;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
class AreaService
{                               
    protected $AreasModel;
    protected $MediaModel;
    public function __construct(Areas $AreasModel, Media $MediaModel)
    {
        $this->AreasModel = $AreasModel;
        $this->MediaModel = $MediaModel;
    }

    public function CrearArea($data)
    {
        // Crear nueva área
        $area =  $this->AreasModel->newInstance();
        $area->nombre = $data['nombre'];
        $area->descripcion = $data['descripcion'];
        $area->estado = $data['estado'];
        $area->save();

        // Verificar si hay un archivo de logo y procesarlo
        if (isset($data['imagen'])) {
            // Subir la imagen a Cloudinary y obtener el resultado
            $result =$data['imagen']->storeOnCloudinary('Verdies/Facultades');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen =  $this->MediaModel->newInstance();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $area->id;
            $imagen->imagenable_type = get_class($area);
            $imagen->save();
        }

   
    }
    public function ObtenerAreasActivas()
    {
        return $this->AreasModel->where('estado',1)->get();
    }
    public function obtenerArea($id)
    {
        return $this->AreasModel->findOrFail($id);
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

        return $area;
    }

    public function CambiarEstado($id)
    {
        $area = $this->obtenerArea($id);

        // Cambiar el estado del área
        $area->estado = $area->estado == 1 ? 0 : 1;
        $area->save();

        return $area;
    }
}