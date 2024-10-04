<?php
namespace Modules\GestionCatalogos\Services;
use Modules\GestionCatalogos\Models\Monedas;
use Modules\GestionCatalogos\Models\Media;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class MonedasService
{
    protected $MonedaModel;
    public function __construct(Monedas $MonedaModel)
    {
        $this->MonedaModel = $MonedaModel;
    }

    public function CrearMoneda($data)
    {
        $moneda = new $this->MonedaModel;
        $moneda->nombre = $data['nombre'];
        $moneda->descripcion = $data['descripcion'];
        $moneda->estado = $data['estado'];
        $moneda->save();

        return $moneda;
    }
    public function SubirLogo($MonedaId, Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'imagen' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        try {
            $moneda = $this->ObtenerMoneda($MonedaId);
            // Manejar la actualización de la imagen
            if ($request->hasFile('imagen')) {
                // Obtener la imagen actual
                $imagenes = $moneda->imagenes;

                // Eliminar la imagen actual de Cloudinary y la base de datos si existe
                if ($imagenes && $imagenes->public_id) {
                    Cloudinary::destroy($imagenes->public_id);
                    $imagenes->delete();
                }

                // Subir la nueva imagen a Cloudinary y obtener el resultado
                $result = $request->file('imagen')->storeOnCloudinary('Verdies/Productos');
                if ($result) {
                    $imagen = new Media();
                    $imagen->url = $result->getSecurePath();
                    $imagen->public_id = $result->getPublicId();
                    $imagen->imagenable_id = $moneda->id;
                    $imagen->imagenable_type = get_class($moneda);
                    $imagen->save();
    
                } else {
                    throw new \Exception('Error al subir la imagen a Cloudinary.');
                }
                
            
                
                return $imagen; // Retornar la imagen creada
            }

            return response()->json(['message' => 'No se subió ninguna imagen.'], 400);
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Material no encontrado.');
        } catch (\Exception $e) {
            // Manejo de otros errores
            throw new \Exception('Error al subir la imagen: ' . $e->getMessage());
        }
    }

    public function ObtenerMoneda($MonedaId)
    {
        return $this->MonedaModel::findOrFail($MonedaId);
    }

    public function ActualizarMoneda($MonedaId, $data)
    {
        $Moneda = $this->ObtenerMoneda($MonedaId);
        $Moneda->nombre = $data['nombre'];
        $Moneda->descripcion = $data['descripcion'];
        $Moneda->estado = $data['estado'];
        $Moneda->save();

        return $Moneda;

    }

    public function CambiarEstadoMoneda($MonedaId)
    {
        $Moneda = $this->ObtenerMoneda($MonedaId);
        $Moneda->estado = $Moneda->estado == 1 ? 0 : 1;
        $Moneda->save();
        return $Moneda;
    }


}