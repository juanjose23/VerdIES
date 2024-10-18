<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CentroAcopioService;
use Illuminate\Http\Request;

class AcopiosController extends Controller
{
    //
    protected $centroAcopioService;
    public function __construct(CentroAcopioService $centroAcopioService)
    {
        $this->centroAcopioService = $centroAcopioService;
    }
    public function show($acopio)
    {

        try {
            $this->centroAcopioService->CambiarEstados($acopio, 2);
            $InfoAcopios = $this->centroAcopioService->ObtenerAcopio($acopio);
       

            // Retornar una respuesta JSON de éxito
            return response()->json([
                'success' => true,
                'message' => 'Lista Centro de acopios',
                'centroacopios' => $InfoAcopios,
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
