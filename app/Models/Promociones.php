<?php

namespace App\Models;

use App\Livewire\Categoria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    use HasFactory;
    protected $casts = [
        'fecha_vencimiento' => 'datetime',
    ];
    protected $fillable = [
        'users_id',
        'categorias_id',
        'nombre',
        'fecha_vencimiento',
        'estado',
        'descripcion',
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function categorias()
    {
        return $this->belongsTo(categorias::class);
    }
    public function detalles()
    {
        return $this->hasOne(DetallesPromociones::class,'promociones_id');
    }
    public function transciones()
    {
        return $this->hasMany(Transciones::class);
    }
    public function imagenes()
    {
        return $this->morphOne('App\Models\Media', 'imagenable');
    }
    
}
