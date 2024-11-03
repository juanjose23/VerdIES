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
        $this->categoriaModel=$categoriaModel;
    }
    public function ObtenerCategorias()
    {
        return $this->categoriaModel::where('tipo',1)->where('estado',1)->get();
    }
    public function crearPromocion(Request $request)
    {
        // Crear nueva promoción
        $promocion = $this->promocionModel->create([
            'users_id'=> Session::get('IdUser'),
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

}