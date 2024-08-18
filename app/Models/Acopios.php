<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acopios extends Model
{
    use HasFactory;
    public function entregas():HasMany
    {
        return $this->hasMany(Entregas::class);
    }
    public function inventarios():HasMany
    {
        return $this->hasMany(Inventarios::class);
    }
}
