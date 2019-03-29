<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jury extends Model
{
    protected $fillable = [
        'name', 'type'
    ];

    public function juryWorks(): BelongsToMany
    {
        return $this->belongsToMany(JuryWork::class);
    }
}
