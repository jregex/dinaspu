<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryCategory extends Model
{
    protected $guarded = [];

    /**
     * Get all of the galleries for the GalleryCategory
     */
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }
}
