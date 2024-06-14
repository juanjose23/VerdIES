<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    use HasFactory;
    public function areas()
    {
        return $this->belongsTo('App\Models\Areas','area_conocimientos_id');
    }
    
    public function user_carrera()
    {
        return $this->hasMany('App\Models\User_carreras', 'carreras_id');
    }
    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }
    public static function ObtenerCarrera()
    {
        $areas = Areas::where('estado', 1)->with('carreras')->get(); // Asegúrate de cargar las carreras
    
        $resultados = [];
    
        foreach ($areas as $area) {
            $nombreArea = $area->nombre;
    
            if ($area->carreras !== null && $area->carreras->count() > 0) {
                foreach ($area->carreras as $carrera) {
                    $resultados[$nombreArea][] = [
                        'id' => $carrera->id,
                        'nombre' => $carrera->nombre
                    ];
                }
            }
        }
    
        return $resultados;
    }
    

}
