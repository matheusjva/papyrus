<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class JuryWork extends Pivot
{
    protected $fillable = [
        'jury_id', 'work_id'
    ];

    public function jury(): BelongsTo
    {
        return $this->belongsTo(Jury::class);
    }

    public function work(): BelongsTo
    {
        return $this->belongsTo(Work::class);
    }
}
