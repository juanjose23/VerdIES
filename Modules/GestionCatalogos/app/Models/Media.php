<?php

namespace Modules\GestionCatalogos\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\MorphTo;
class Media extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['url', 'public_id', 'imagenable_id', 'imagenable_type'];

    public function imagenable():MorphTo
    {
        return $this->morphTo();
    }
}
