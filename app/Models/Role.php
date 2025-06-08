<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function users()
    {
        $this->hasMany(User::class);
    }
}
