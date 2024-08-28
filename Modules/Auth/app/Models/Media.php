<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'Media';
    protected $fillable = ['url', 'public_id', 'imagenable_id', 'imagenable_type'];

    public function imagenable()
    {
        return $this->morphTo();
    }
}
