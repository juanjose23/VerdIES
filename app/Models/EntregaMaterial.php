<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntregaMaterial extends Model
{
    use HasFactory;
    protected $table="entrega_material";
    public function users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function recicladoras():BelongsTo
    {
        return $this->belongsTo(Recicladoras::class);
    }
}
