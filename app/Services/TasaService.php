<?php
namespace App\Services;

use App\Models\Tasas;
use Illuminate\Support\Facades\Log;

class TasaService
{
    protected $TasaModel;
    public function __construct(Tasas $TasaModel)
    {
        $this->TasaModel = $TasaModel;
    }
    public function obtenerTasasPorMaterial($materialesId)
    {
        return $this->TasaModel->where('materiales_id', $materialesId)->get();
    }

    /**
     * Crea una nueva tasa y la guarda en la base de datos.
     *
     * @param  array  $data
     * @return void
     */
    public function crearTasa(array $data)
    {
        $tasas = new $this->TasaModel();
        $tasas->materiales_id = $data['materiales'];
        $tasas->monedas_id = $data['monedas'];
        $tasas->cantidad = $data['cantidad'];
        $tasas->cantidadlibra = $data['cantidadlibra'];
        $tasas->estado = $data['estado'];
        $tasas->save();
    }
    /**
     * Cambia el estado de una tasa existente y crea una nueva tasa.
     *
     * @param  array  $data
     * @return void
     * @throws \Exception
     */
    public function cambiarTasa(array $data, $materiales)
    {
        try {
            // Buscar una tasa existente con el mismo material y moneda
            $tasaExistente = $this->TasaModel
                ->where('materiales_id', $materiales)
                ->where('estado', 1)
                ->first();

            // Si la tasa existe, actualizar su estado
            if ($tasaExistente) {
                $tasaExistente->estado = 0;
                $tasaExistente->save();
            }

            // Crear una nueva tasa con los datos proporcionados
            $nuevaTasa = $this->TasaModel->create([
                'materiales_id' => $materiales,
                'monedas_id' => $data['monedas'],
                'cantidad' => $data['cantidad'],
                'cantidadlibra' => $data['cantidadlibra'],
                'estado' => $data['estado'],
            ]);

        } catch (\Exception $e) {
            Log::error('Error al cambiar la tasa: ' . $e->getMessage());
            throw new \Exception('Error al cambiar la tasa.');
        }
    }

    public function cambiarestado($TasaId)
    {
        $tasa = $this->TasaModel->findOrFail($TasaId);

        // Cambia el estado del material
        $tasa->estado = $tasa->estado == 1 ? 0 : 1;
        $tasa->save();
    }

}