<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class STLouis extends Model
{
    protected $table = 'st_louis';

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function track(): BelongsTo
    {
        return $this->belongsTo(Track::class, 'track_id', 'id');
    }
}
