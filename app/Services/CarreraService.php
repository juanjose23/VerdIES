<?php
namespace App\Services;
use App\Models\Carreras;
use App\Models\Media;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
class CarreraService
{
    protected $CarrerasModel;
    protected $MediaModel;
    public function __construct(Carreras $CarrerasModel, Media $MediaModel)
    {
        $this->CarrerasModel = $CarrerasModel;
        $this->MediaModel = $MediaModel;
    }

    public function CrearCarrera($data)
    {
        $carrera = $this->CarrerasModel->newInstance();
        $carrera->area_conocimientos_id = $data['areas'];

        $carrera->nombre = $data['nombre'];
        $carrera->descripcion = $data['descripcion'];
        $carrera->estado = $data['estado'];
        $carrera->save();
    
        if (isset($data['imagen'])) { // Verifica si el archivo está presente
            // Subir la imagen a Cloudinary y obtener el resultado
            $result = $data['imagen']->storeOnCloudinary('Verdies/Facultades');
    
            // Crear una nueva entrada de imagen en la base de datos
            $imagen = $this->MediaModel->newInstance();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $carrera->id;
            $imagen->imagenable_type = get_class($carrera);
            $imagen->save();
        }
    }

    public function ObtenerCarrera($id)
    {
        return $this->CarrerasModel->findOrFail($id);
    }

    public function ActualizarCarrera( $id,Request $request)
    {
        $carrera = $this->obtenerCarrera($id);

        // Actualizar los campos de la carrera
        $carrera->area_conocimientos_id = $request->areas;
        $carrera->nombre = $request->nombre;
        $carrera->descripcion = $request->descripcion;
        $carrera->estado = $request->estado;
        $carrera->save();

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            $imagenes = $carrera->imagenes;

            if ($imagenes) {
                $public_id = $imagenes['public_id'];
                Cloudinary::destroy($public_id);
                Media::destroy($imagenes['id']);
            }

            $result = $request->file('imagen')->storeOnCloudinary('Verdies/Facultades');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $carrera->id;
            $imagen->imagenable_type = get_class($carrera);
            $imagen->save();
        }

       
    }

    public function cambiarEstado($id)
    {
        $carrera = $this->obtenerCarrera($id);

        // Cambiar el estado de la carrera
        $carrera->estado = $carrera->estado == 1 ? 0 : 1;
        $carrera->save();

        return $carrera;
    }
}