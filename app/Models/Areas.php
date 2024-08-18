<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
class Areas extends Model
{
    use HasFactory;
    protected $table="area_conocimientos";
    public function carreras():HasMany
    {
        return $this->hasMany(Carreras::class,'area_conocimientos_id');
    }

    public function imagenes():MorphOne
    {
        return $this->morphOne(Media::class, 'imagenable');
    }

}
