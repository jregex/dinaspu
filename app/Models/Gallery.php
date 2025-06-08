<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $guarded = [];

    public function gallery_category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class);
    }
}
