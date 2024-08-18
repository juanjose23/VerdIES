<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
class Carreras extends Model
{
    use HasFactory;
    public function areas():BelongsTo
    {
        return $this->belongsTo(Areas::class,'area_conocimientos_id');
    }
    
    public function user_carrera():HasMany
    {
        return $this->hasMany(User_carreras::class, 'carreras_id');
    }
    public function imagenes():MorphOne
    {
        return $this->morphOne(Media::class, 'imagenable');
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
