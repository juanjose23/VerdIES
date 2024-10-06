<?php

namespace Modules\GestionCatalogos\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\GestionCatalogos\Database\Factories\MonedasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Monedas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): MonedasFactory
    // {
    //     // return MonedasFactory::new();
    // }
    public function imagenes():MorphOne
    {
        return $this->morphOne(Media::class, 'imagenable');
    }
}
