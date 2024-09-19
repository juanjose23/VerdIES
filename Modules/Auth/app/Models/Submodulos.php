<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Auth\Database\Factories\SubmodulosFactory;

class Submodulos extends Model
{
    use HasFactory;
    public function modulos()
    {
        return $this->belongsTo(Modulos::class);
    }
    public function privilegios()
    {
        return $this->hasMany(Privilegios::class);
    }

    /**
     * Obtener módulos con sus submódulos.
     * 
     * Esta función obtiene todos los módulos activos junto con sus submódulos
     * y los ordena por la cantidad de submódulos que tienen, de menor a mayor.
     * 
     * @return array
     */

    public static function ObtenerModulosConSubmodulos()
    {
        $modulos = Modulos::where('estado', 1)->with('submodulos')->get();
        $resultados = [];
        foreach ($modulos as $modulo) {
            $nombreModulo = $modulo->nombre;
            $cantidadSubmodulos = $modulo->submodulos->count();
            // Almacenar la cantidad de submódulos para cada módulo
            $resultados[] = [
                'nombre' => $nombreModulo,
                'id' => $modulo->id,
                'cantidad_submodulos' => $cantidadSubmodulos,
                'submodulos' => $modulo->submodulos->toArray()
            ];
        }
        usort($resultados, function ($a, $b) {
            return $a['cantidad_submodulos'] - $b['cantidad_submodulos'];
        });
        return $resultados;
    }

}
