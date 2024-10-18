<?php
namespace App\Services;
use App\Models\Categorias;
use Illuminate\Support\Facades\Session;
class CategoriaService
{
    protected $CategoriaModel;
    public function __construct(Categorias $CategoriaModel)
    {
        $this->CategoriaModel = $CategoriaModel;
    }
    public function obtenerCategoriasConMaterialesYTasaActivos()
    {
        return $this->CategoriaModel::whereHas('materiales', function ($query) {
            $query->where('estado', 1)
                ->whereHas('tasas', function ($q) {
                    $q->where('estado', 1);
                });
        })->where('estado', 1)->select('id', 'nombre', 'descripcion')
            ->get();
    }


    public function crearCategoria($data)
    {

        // Crear una nueva instancia del modelo Categoria
        $categoria = new $this->CategoriaModel;
        $categoria->nombre = $data['nombre'];
        $categoria->descripcion = $data['descripcion'];
        $categoria->estado = $data['estado'];
        $categoria->save();
        Session::flash('success', 'Se ha registado correctamente la operación');
        return $categoria;
    }
    public function obtenerCategoriaPorId($id)
    {
        // Buscar la categoría por su ID o lanzar una excepción si no se encuentra
        return $this->CategoriaModel->findOrFail($id);
    }

    public function actualizarCategoria($id, $data)
    {
        $categoria = $this->CategoriaModel->findOrFail($id);

        if (
            $categoria->nombre != $data['nombre'] ||
            $categoria->descripcion != $data['descripcion'] ||
            $categoria->estado != $data['estado']
        ) {
            $categoria->nombre = $data['nombre'];
            $categoria->descripcion = $data['descripcion'];
            $categoria->estado = $data['estado'];
            $categoria->save();

            // Mostrar mensaje solo si hay cambios
            Session::flash('success', 'El proceso se ha completado exitosamente.');
        }

        return $categoria;
    }

    public function cambiarEstadoCategoria($id)
    {
        $categoria = $this->CategoriaModel->findOrFail($id);

        // Cambiar el estado de la categoría
        $categoria->estado = $categoria->estado == 1 ? 0 : 1;
        $categoria->save();

        // Mostrar mensaje flash
        Session::flash('success', 'El estado de la categoría ha sido cambiado exitosamente.');

        return $categoria;
    }


}