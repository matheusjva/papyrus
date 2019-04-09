<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'name'
    ];

    public function works(): BelongsToMany
    {
        return $this->belongsToMany(Work::class);
    }
}
