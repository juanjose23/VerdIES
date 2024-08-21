<?php

namespace App\Services;
use App\Models\Inventarios;
use DB;
class InventarioService
{
    protected $InventarioModel;
    public function __construct(Inventarios $InventarioModel)
    {
        $this->InventarioModel = $InventarioModel;
    }

    public function obtenerCategoriasDisponibles()
    {
        return $this->InventarioModel->with('materiales.categorias')
            ->get()
            ->pluck('materiales.categorias')
            ->flatten()
            ->unique('id')
            ->values();
    }
    public function obtenerCentrosAcopiosDisponibles()
    {
        return $this->InventarioModel->with('acopios')
            ->get()
            ->pluck('acopios')
            ->flatten()
            ->unique('id')
            ->values();
    }

    public function obtenerInventarios($buscar = '', $estado = '', $categorias = '', $acopios = '', $perPage = 10)
    {
        $query = $this->InventarioModel
            ->join('materiales', 'inventarios.materiales_id', '=', 'materiales.id')
            ->join('categorias', 'materiales.categorias_id', '=', 'categorias.id')
            ->select(

                'categorias.nombre as categoria_nombre',
                'materiales.nombre as material_nombre',
                DB::raw('SUM(inventarios.cantidad) as cantidad_total'),
                'inventarios.estado'
            )
            ->groupBy('categorias.nombre', 'materiales.nombre', 'inventarios.estado');
    
        if ($buscar) {
            $searchTerm = '%' . $buscar . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('materiales.nombre', 'like', $searchTerm)
                    ->orWhere('categorias.nombre', 'like', $searchTerm)
                    ->orWhere('inventarios.estado', 'like', $searchTerm);
            });
        }
    
        if ($estado) {
            $query->where('inventarios.estado', $estado);
        }
    
        if ($categorias) {
            $query->where('categorias.id', $categorias);
        }
    
        if ($acopios) {
            $query->join('acopios', 'inventarios.acopios_id', '=', 'acopios.id')
                  ->where('acopios.id', $acopios);
        }
        if ($perPage === 'all') {
            // Obtener todos los resultados sin paginación
            return $query->get();
        } else {
            // Paginación con el número de elementos por página
            return $query->paginate($perPage);
        }
    }
    
    



}