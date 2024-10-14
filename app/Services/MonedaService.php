<?php
namespace App\Services;

use App\Models\Media;
use App\Models\Monedas;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class MonedaService
{
    protected $MonedaModel;
    public function __construct(Monedas $MonedaModel)
    {
        $this->MonedaModel = $MonedaModel;
    }
    public function ObtenerMonedasActivas()
    {
        return $this->MonedaModel::where("estado",1)->get();
    }
    public function CrearMonedas(array $data)
    {
        // Crear una nueva moneda
        $moneda = new $this->MonedaModel();
        $moneda->nombre = $data['nombre'];
        $moneda->descripcion = $data['descripcion'];
        $moneda->estado = $data['estado'];
        $moneda->save();

        // Manejar la imagen si se proporciona
        if (isset($data['imagen']) && $data['imagen'] instanceof UploadedFile) {
            $this->handleImageUpload($data['imagen'], $moneda);
        }

        return $moneda;
    }

    protected function handleImageUpload(UploadedFile $image, Monedas $moneda)
    {
        // Subir la imagen a Cloudinary y obtener el resultado
        $result = $image->storeOnCloudinary('Verdies/VerdCoins');

        // Crear una nueva entrada de imagen en la base de datos
        $imagen = new Media();
        $imagen->url = $result->getSecurePath();
        $imagen->public_id = $result->getPublicId();
        $imagen->imagenable_id = $moneda->id;
        $imagen->imagenable_type = get_class($moneda);
        $imagen->save();
    }

    /**
     * Recupera una moneda por su ID.
     *
     * @param  int  $id
     * @return \App\Models\Monedas
     * @throws \Exception
     */
    public function ObtenerMoneda($id)
    {
        try {
            return $this->MonedaModel->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Moneda no encontrada.');
        }
    }
    /**
     * Actualiza una moneda.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return array
     * @throws \Exception
     */
    public function actualizarMoneda($id, Request $request)
    {
        try {
            $moneda = $this->MonedaModel->findOrFail($id);

            // Actualizar los datos de la moneda
            $moneda->nombre = $request->nombre;
            $moneda->descripcion = $request->descripcion;
            $moneda->estado = $request->estado;
            $moneda->save();

            // Manejar la actualización de la imagen
            if ($request->hasFile('imagen')) {
                $this->actualizarImagen($moneda, $request->file('imagen'));
            }

            return ['success' => true, 'message' => 'El proceso se ha completado exitosamente.'];
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Moneda no encontrada.');
        }
    }

    /**
     * Actualiza la imagen de una moneda.
     *
     * @param  \App\Models\Monedas  $moneda
     * @param  \Illuminate\Http\UploadedFile  $imagen
     * @return void
     */
    protected function actualizarImagen($moneda, $imagen)
    {
        // Obtener la imagen actual
        $imagenes = $moneda->imagenes;

        // Eliminar la imagen actual de Cloudinary y la base de datos si existe
        if ($imagenes) {
            $public_id = $imagenes->public_id;
            Cloudinary::destroy($public_id);
            $imagenes->delete();
        }

        // Subir la nueva imagen a Cloudinary y obtener el resultado
        $result = $imagen->storeOnCloudinary('Verdies/VerdCoins');

        // Crear una nueva entrada de imagen en la base de datos
        $imagen = new Media();
        $imagen->url = $result->getSecurePath();
        $imagen->public_id = $result->getPublicId();
        $imagen->imagenable_id = $moneda->id;
        $imagen->imagenable_type = get_class($moneda);
        $imagen->save();
    }

    /**
     * Cambia el estado de una moneda.
     *
     * @param  int  $id
     * @return array
     * @throws \Exception
     */
    public function cambiarEstadoMoneda($id)
    {
        try {
            // Encuentra la moneda por ID
            $moneda = $this->MonedaModel->findOrFail($id);

            // Cambia el estado de la moneda
            $moneda->estado = $moneda->estado == 1 ? 0 : 1;
            $moneda->save();

            return ['success' => true, 'message' => 'El estado de la moneda ha sido cambiado exitosamente.'];
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Moneda no encontrada.');
        }
    }

}