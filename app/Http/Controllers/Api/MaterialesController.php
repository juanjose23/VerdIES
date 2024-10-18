<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoriaService;
use App\Services\MaterialService;
use Illuminate\Http\Request;

class MaterialesController extends Controller
{
    //
    protected $categoriaService;
    protected $materialService;
    public function __construct(CategoriaService $categoriaService, MaterialService $materialService)
    {
        $this->categoriaService = $categoriaService;
        $this->materialService = $materialService;
    }
    public function index()
    {
        try {

            $CategoriaInfo = $this->categoriaService->obtenerCategoriasConMaterialesYTasaActivos();
            // Retornar una respuesta JSON de éxito
            return response()->json([
                'success' => true,
                'message' => 'Informacion de categorias',
                'Categorias' => $CategoriaInfo,
            ], 201);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Hubo un error al procesar la petición',
            ], 500);
        }
    }
    public function show($materiales)
    {
        try {

            $MaterialesInfo = $this->materialService->obtenerMaterialesConTasasPorCategoria($materiales);
            // Retornar una respuesta JSON de éxito
            return response()->json([
                'success' => true,
                'message' => 'Informacion de Materiales de la categoria',
                'Materiales' => $MaterialesInfo,
            ], 201);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Hubo un error al procesar la petición',
            ], 500);
        }
    }

}
