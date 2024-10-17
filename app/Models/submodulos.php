<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class submodulos extends Model
{
    use HasFactory;
    public function modulos()
    {
        return $this->belongsTo(modulos::class);
    }
    public function privilegios()
    {
        return $this->hasMany('App\Models\Privilegios');
    }

 
    
}
