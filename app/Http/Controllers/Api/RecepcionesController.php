<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RecepcionMaterialesService;
use App\Services\CentroAcopioService;
class RecepcionesController extends Controller
{
    //
    protected $centroAcopioService;
    protected $recepcionMaterialesService;
    public function __construct( RecepcionMaterialesService $recepcionMaterialesService, CentroAcopioService $centroAcopioService)
    {
        $this->centroAcopioService = $centroAcopioService;
        $this->recepcionMaterialesService =$recepcionMaterialesService;
       
    }
    public function store(Request $request)
    {
        try {
        // Validar los datos entrantes
        $validatedData = $request->validate([
            'acopios' => 'required|exists:acopios,id', 
            'user' => 'required|exists:users,id', 
            'materialesData' => 'required',
           
        ]);

        // Decodificar el JSON de 'materialesData'
        $materialesData = json_decode($validatedData['materialesData'], true);

        // Crear la entrega utilizando los datos validados
        $entrega = $this->recepcionMaterialesService->CrearEntrega([
            'user' => $validatedData['user'],
            'acopios' => $validatedData['acopios'],
            'nota' => $validatedData['nota'] ?? '', // Si es opcional
            'estado' => 2, // Asignar un estado por defecto
        ]);
        $this->recepcionMaterialesService->ProcesarMateriales($entrega, $materialesData);
        $this->centroAcopioService->CambiarEstados( $validatedData['acopios'], 1);
      
        // Retornar una respuesta JSON de éxito
        return response()->json([
            'success' => true,
            'message' => 'Entrega creada y materiales procesados correctamente',
            'Entregas' => $entrega,
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
