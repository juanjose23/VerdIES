<?php

namespace Modules\GestionCatalogos\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\GestionCatalogos\Database\Factories\TasasFactory;

class Tasas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TasasFactory
    // {
    //     // return TasasFactory::new();
    // }
}
