<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Auth\Database\Factories\ModulosFactory;

class Modulos extends Model
{
    use HasFactory;
    public function submodulos()
    {
        return $this->hasMany(Submodulos::class);
    }
    public function permisosm()
    {
        return $this->hasMany(PermisosModulos::class);
    }
}
