<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'acopios_id',
        'materiales_id',
        'cantidad',
        'estado',
    ];
    public function acopios():BelongsTo
    {
        return $this->belongsTo(ACopios::class);
    }

    public function materiales():BelongsTo
    {
        return $this->belongsTo(Materiales::class);
    }
    
}
