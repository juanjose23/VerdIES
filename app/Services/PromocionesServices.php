<?php
namespace App\Services;

use App\Models\Categorias;
use App\Models\DetallesPromociones;
use App\Models\Media;
use App\Models\Promociones;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class PromocionesServices
{
    protected $promocionModel;
    protected $detalleModel;
    protected $categoriaModel;

    public function __construct(Promociones $promocionModel, DetallesPromociones $detalleModel, Categorias $categoriaModel)
    {
        $this->promocionModel = $promocionModel;
        $this->detalleModel = $detalleModel;
        $this->categoriaModel = $categoriaModel;
    }
    public function ObtenerCategorias()
    {
        return $this->categoriaModel::where('tipo', 1)->where('estado', 1)->get();
    }

    public function ObtenerPromocionPorId($PromocionId)
    {
        return $this->promocionModel->with('imagenes','detalles','categorias')->findOrFail($PromocionId);
    }
    public function crearPromocion(Request $request)
    {
        // Crear nueva promoción
        $promocion = $this->promocionModel->create([
            'users_id' => Session::get('IdUser'),
            'categorias_id' => $request->categorias,
            'nombre' => $request->nombre,
            'fecha_vencimiento' => $request->fecha,
            'estado' => $request->estado,
            'descripcion' => $request->descripcion,
        ]);

        // Subir imagen si existe
        if ($request->hasFile('imagen')) {
            $this->subirImagen($request->file('imagen'), $promocion);
        }

        // Crear detalle de promoción
        $this->detalleModel->create([
            'promociones_id' => $promocion->id,
            'cantidad' => $request->cantidad,
            'valor' => $request->precio,
            'monedas_id' => $request->moneda,
            'cantidadmoneda' => $request->preciomoneda,
        ]);

        return $promocion;
    }

    protected function subirImagen($imagen, $promocion)
    {
        // Subir la imagen a Cloudinary
        $result = $imagen->storeOnCloudinary('Verdies/Promociones');

        // Crear una nueva entrada de imagen en la base de datos
        Media::create([
            'url' => $result->getSecurePath(),
            'public_id' => $result->getPublicId(),
            'imagenable_id' => $promocion->id,
            'imagenable_type' => get_class($promocion),
        ]);
    }

    public function editarPromocion(Request $request, $id)
    {
        // Buscar la promoción por ID y actualizar sus datos
        $promocion = $this->promocionModel->findOrFail($id);

        $promocion->update([
            'categorias_id' => $request->categorias,
            'nombre' => $request->nombre,
            'fecha_vencimiento' => $request->fecha,
            'estado' => $request->estado,
            'descripcion' => $request->descripcion,
        ]);

        // Verificar si hay una nueva imagen y actualizarla
        if ($request->hasFile('imagen')) {
            $this->editarImagen($request->file('imagen'), $promocion);
        }

        // Actualizar el detalle de la promoción
        $detalle = $this->detalleModel->where('promociones_id', $promocion->id)->first();
        $detalle->update([
            'cantidad' => $request->cantidad,
            'valor' => $request->precio,
            'monedas_id' => $request->moneda,
            'cantidadmoneda' => $request->preciomoneda,
        ]);

        return $promocion;
    }

    protected function editarImagen($imagen, $promocion)
    {
        // Buscar la imagen actual en la base de datos
        $imagenActual = Media::where('imagenable_id', $promocion->id)
            ->where('imagenable_type', get_class($promocion))
            ->first();

        // Borrar la imagen actual de Cloudinary si existe
        if ($imagenActual) {
            Cloudinary::destroy($imagenActual->public_id);
            $imagenActual->delete();
        }

        // Subir la nueva imagen a Cloudinary
        $result = $imagen->storeOnCloudinary('Verdies/Promociones');

        // Crear una nueva entrada de imagen en la base de datos
        Media::create([
            'url' => $result->getSecurePath(),
            'public_id' => $result->getPublicId(),
            'imagenable_id' => $promocion->id,
            'imagenable_type' => get_class($promocion),
        ]);
    }

}