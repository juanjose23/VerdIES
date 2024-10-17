<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaMaterial extends Model
{
    use HasFactory;
    protected $table="entrega_material";
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function recicladoras()
    {
        return $this->belongsTo(Recicladoras::class);
    }
}
