<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acopios extends Model
{
    use HasFactory;
    public function recepciones()
    {
        return $this->hasMany(Recepciones::class);
    }
    public function inventarios()
    {
        return $this->hasMany('App\Models\Inventarios');
    }
}
