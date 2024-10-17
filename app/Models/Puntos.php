<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntos extends Model
{
    use HasFactory;
    public function monedas()
    {
        return $this->belongsTo(Monedas::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
   
}
