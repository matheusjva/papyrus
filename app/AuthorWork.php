<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AuthorWork extends Pivot
{
    protected $fillable = [
        'author_id', 'work_id'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function work(): BelongsTo
    {
        return $this->belongsTo(Work::class);
    }
}
