<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Auth\Database\Factories\PermisosFactory;

class Permisos extends Model
{
    use HasFactory;

    use HasFactory;

    public function permisos(){
        return $this->hasMany(PermisosModulos::class);
    }
}
