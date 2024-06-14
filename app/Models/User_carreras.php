<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_carreras extends Model
{
    use HasFactory;
    protected $table="user_carrera";
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function carreras()
    {
        return $this->belongsTo('App\Models\Carreras');
    }
}
