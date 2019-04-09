<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    protected $fillable = [
        'name'
    ];

    public function authorWorks(): BelongsToMany
    {
        return $this->belongsToMany(AuthorWork::class);
    }
}
