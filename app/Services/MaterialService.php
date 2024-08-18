<?php

namespace App\Services;

use App\Models\Materiales;
use App\Models\Categorias;
use App\Models\Media;
use App\Models\Tasas;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MaterialService
{
    protected $MaterialModel;
    protected $MediaModel;
    protected $CategoriasModel;

    protected $TasasModel;

    public function __construct(Materiales $MaterialModel, Media $MediaModel, Categorias $CategoriasModel, Tasas $TasasModel)
    {
        $this->MaterialModel = $MaterialModel;
        $this->MediaModel = $MediaModel;
        $this->CategoriasModel = $CategoriasModel;
        $this->TasasModel = $TasasModel;
    }

    public function create(array $data)
    {
        // Crear un nuevo material
        $materiales = new Materiales();
        $materiales->categorias_id = $data['categorias'];
        $categoria = $this->CategoriasModel::find($data['categorias']);
        $codigo = $this->generarCodigoMaterial($categoria);
        $materiales->codigo = $codigo;
        $materiales->nombre = $data['nombre'];
        $materiales->descripcion = $data['descripcion'];
        $materiales->estado = $data['estado'];
        $materiales->save();

        // Manejar la subida de imagen, si existe
        if (isset($data['imagen']) && $data['imagen']->isValid()) {
            // Subir la imagen a Cloudinary y obtener el resultado
            $result = $data['imagen']->storeOnCloudinary('Verdies/Productos');

            // Crear una nueva entrada de imagen en la base de datos
            $imagen = new Media();
            $imagen->url = $result->getSecurePath();
            $imagen->public_id = $result->getPublicId();
            $imagen->imagenable_id = $materiales->id;
            $imagen->imagenable_type = get_class($materiales);
            $imagen->save();
        }
        Session::flash('success', 'Se ha registado correctamente la operación');
        // Retornar el material creado
        return $materiales;
    }

    public function obtenerMaterialPorId($id)
    {
        try {
            return $this->MaterialModel::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Material no encontrado.');
        }
    }
    public function ActualizarMaterial($id, Request $request)
    {
        try {
            // Encontrar el material por ID
            $material = $this->MaterialModel->findOrFail($id);

            // Actualizar los datos del material
            $material->categorias_id = $request->categorias;
            $material->nombre = $request->nombre;
            $material->descripcion = $request->descripcion;
            $material->estado = $request->estado;
            $material->save();

            // Manejar la actualización de la imagen
            if ($request->hasFile('imagen')) {
                // Obtener la imagen actual
                $imagenes = $material->imagenes;

                // Eliminar la imagen actual de Cloudinary y la base de datos si existe
                if ($imagenes) {
                    $public_id = $imagenes->public_id;
                    Cloudinary::destroy($public_id);
                    $imagenes->delete();
                }

                // Subir la nueva imagen a Cloudinary y obtener el resultado
                $result = $request->file('imagen')->storeOnCloudinary('Verdies/Productos');

                // Crear una nueva entrada de imagen en la base de datos
                $imagen = new Media();
                $imagen->url = $result->getSecurePath();
                $imagen->public_id = $result->getPublicId();
                $imagen->imagenable_id = $material->id;
                $imagen->imagenable_type = get_class($material);
                $imagen->save();
            }

            Session::flash('success', 'Se ha registado correctamente la operación');

        } catch (ModelNotFoundException $e) {
            throw new \Exception('Material no encontrado.');
        }
    }

    /**
     * Cambia el estado del material (activo/inactivo).
     *
     * @param  int  $id
     * @return bool
     * @throws \Exception
     */
    public function cambiarEstadoMaterial($id)
    {
        try {
            // Encuentra el material por ID
            $material = $this->MaterialModel->findOrFail($id);

            // Cambia el estado del material
            $material->estado = $material->estado == 1 ? 0 : 1;
            $material->save();

            return true;
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Material no encontrado.');
        }
    }


    /**
     * Genera el código de un producto basado en la categoría.
     *
     * @param  \App\Models\Categorias  $categoria
     * @return string
     */
    public function generarCodigoMaterial(Categorias $categoria)
    {
        // Obtener el prefijo del nombre de la categoría y convertirlo a slug
        $prefijo = Str::slug($categoria->nombre, '-');

        // Utilizar el modelo Materiales desde la instancia de la clase
        $ultimoProducto = $this->MaterialModel::where('categorias_id', $categoria->id)
            ->orderBy('id', 'desc')
            ->first();

        $siguienteId = $ultimoProducto ? $ultimoProducto->id + 1 : 1;

        // Generar el código del producto concatenando el prefijo y el ID
        return $prefijo . '-' . str_pad($siguienteId, 5, '0', STR_PAD_LEFT);
    }

    /**
     * Obtiene las categorías con materiales filtrados que no existen en Tasas.
     *
     * @return array
     */
    public function obtenerCategoriasConMateriales()
    {
        // Obtener los IDs de materiales de Tasas
        $materialesEnTasas = $this->TasasModel::pluck('materiales_id')->toArray();

        // Obtener las categorías con materiales filtrados que no existen en Tasas
        $categorias = $this->CategoriasModel::where('estado', 1)
            ->with([
                'materiales' => function ($query) use ($materialesEnTasas) {
                    $query->whereNotIn('id', $materialesEnTasas);
                }
            ])
            ->get();

        $resultados = [];

        foreach ($categorias as $categoria) {
            $nombreCategoria = $categoria->nombre;

            if ($categoria->materiales && $categoria->materiales->count() > 0) {
                foreach ($categoria->materiales as $material) {
                    $resultados[$nombreCategoria][] = [
                        'id' => $material->id,
                        'nombre' => $material->nombre
                    ];
                }
            }
        }

        return $resultados;
    }
/**
 * Obtiene los materiales cuyas categorías existen en Tasas.
 *
 * @return array
 */
public function obtenerMaterialesConCategoriasEnTasas()
{
    // Obtener los IDs de materiales de Tasas
    $materialesEnTasas = $this->TasasModel::pluck('materiales_id')->toArray();

    // Obtener las categorías relacionadas con los materiales en Tasas
    $categoriasConMaterialesEnTasas = $this->CategoriasModel::whereHas('materiales', function ($query) use ($materialesEnTasas) {
        $query->whereIn('id', $materialesEnTasas);
    })
    ->where('estado', 1)
    ->with(['materiales' => function ($query) use ($materialesEnTasas) {
        $query->whereIn('id', $materialesEnTasas);
    }])
    ->get();

    $resultados = [];

    foreach ($categoriasConMaterialesEnTasas as $categoria) {
        $nombreCategoria = $categoria->nombre;

        if ($categoria->materiales && $categoria->materiales->count() > 0) {
            foreach ($categoria->materiales as $material) {
                $resultados[$nombreCategoria][] = [
                    'id' => $material->id,
                    'nombre' => $material->nombre
                ];
            }
        }
    }

    return $resultados;
}

    /**
     * Encuentra un material por su ID e incluye sus categorías.
     *
     * @param  int  $id
     * @return \App\Models\Materiales
     * @throws \Exception
     */
    public function encontrarMaterialConCategorias($id)
    {
        try {
            // Encontrar el material e incluir la relación con categorías
            return $this->MaterialModel->with('categorias')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Material no encontrado.');
        }
    }
}
