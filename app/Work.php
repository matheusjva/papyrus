<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title', 'description', 'authors', 'year', 'jury', 'path_file', 'creator_id'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
