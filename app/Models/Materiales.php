<?php

namespace App\Models;

use App\Livewire\Material;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;



class Materiales extends Model
{
    use HasFactory;
    public function categorias():BelongsTo
    {
        return $this->belongsTo(Categorias::class);
    }
    public function tasas():HasMany
    {
        return $this->hasMany(Tasas::class);
    }
    public function imagenes():MorphOne
    {
        return $this->morphOne(Media::class, 'imagenable');
    }

    public function detalles():HasMany
    {
        return $this->hasMany(Detalles_entregas::class);
    }

    public function inventarios():HasMany
    {
        return $this->hasMany(Inventarios::class);
    }
    public function material():HasMany
    {
        return $this->hasMany(Material::class);
    }




  
    public static function ObtenerInventario()
    {
        // Obtener los inventarios agrupados por acopio, categoría y material, y sumar las cantidades
        $inventarios = Inventarios::select('id','acopios_id', 'materiales_id', 'cantidad as total_cantidad')
            ->where('estado', 1)
            ->where('cantidad', '>', 0)
            ->with(['acopios', 'materiales.categorias'])
            ->get();
    
        $resultados = [];
    
        // Agrupar los resultados
        foreach ($inventarios as $inventario) {
            $acopioNombre = $inventario->acopios->nombre;
            $categoriaNombre = $inventario->materiales->categorias->nombre;
            $materialNombre = $inventario->materiales->nombre;
    
            $resultados[$acopioNombre][$categoriaNombre][] = [
                'acopio'=> $inventario->acopios_id,
                'id' => $inventario->id,
                'id_materiales'=> $inventario->materiales->id,
                'nombre' => $materialNombre,
                'cantidad' => $inventario->total_cantidad,
            ];
        }
    
        return $resultados;
    }
    
}
