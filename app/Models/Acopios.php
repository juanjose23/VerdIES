<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acopios extends Model
{
    use HasFactory;
    public function entregas()
    {
        return $this->hasMany('App\Models\Entregas');
    }
    public function inventarios()
    {
        return $this->hasMany('App\Models\Inventarios');
    }
}
