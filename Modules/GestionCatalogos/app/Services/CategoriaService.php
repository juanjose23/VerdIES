<?php
namespace Modules\GestionCatalogos\Services;
use Modules\GestionCatalogos\Models\Categoria;
use Illuminate\Support\Facades\Session;
class CategoriaService
{
    protected $CategoriaModel;
    public function __construct(Categoria $CategoriaModel)
    {
        $this->CategoriaModel = $CategoriaModel;
    }
    public function ObtenerCategoriasActivas()
    {
        return Categoria::where('estado', 1)->get();
    }
    public function crearCategoria($data)
    {
        
        
        $categoria = new $this->CategoriaModel;
        $categoria->nombre = $data['nombre'];
        $categoria->descripcion = $data['descripcion'];
        $categoria->estado = $data['estado'];
        $categoria->save();
        
        return $categoria;
    }
    public function obtenerCategoriaPorId($id)
    {
        
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

           
            Session::flash('success', 'El proceso se ha completado exitosamente.');
        }

        return $categoria;
    }

    public function cambiarEstadoCategoria($id)
    {
        $categoria = $this->CategoriaModel->findOrFail($id);

       
        $categoria->estado = $categoria->estado == 1 ? 0 : 1;
        $categoria->save();

       
        Session::flash('success', 'El estado de la categoría ha sido cambiado exitosamente.');
        return $categoria;
    }


}