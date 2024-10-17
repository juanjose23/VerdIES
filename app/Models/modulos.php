<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modulos extends Model
{
    use HasFactory;

    public function submodulos(){
        return $this->hasMany(Submodulos::class);
    }
    public function permisosm(){
        return $this->hasMany('App\Models\permisosmodulos');
    }
}
