<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Track extends Model
{
    public function longbeach(): HasMany
    {
        return $this->hasMany(LongBeach::class, 'track_id', 'id');
    }

    public function atlanta(): HasMany
    {
        return $this->hasMany(Atlanta::class, 'track_id', 'id');
    }

    public function orlando(): HasMany
    {
        return $this->hasMany(Orlando::class, 'track_id', 'id');
    }

    public function englishtown(): HasMany
    {
        return $this->hasMany(Englishtown::class, 'track_id', 'id');
    }
    public function stlouis(): HasMany
    {
        return $this->hasMany(STLouis::class, 'track_id', 'id');
    }
    public function seattle(): HasMany
    {
        return $this->hasMany(Seattle::class, 'track_id', 'id');
    }

    public function grantsville(): HasMany
    {
        return $this->hasMany(Grantsville::class, 'track_id', 'id');
    }

    public function irwindale(): HasMany
    {
        return $this->hasMany(Irwindale::class, 'track_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}