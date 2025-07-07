<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Driver extends Model
{
    public function longbeach(): HasOne
    {
        return $this->hasOne(LongBeach::class);
    }

    public function atlanta(): HasOne
    {
        return $this->hasOne(Atlanta::class);
    }

    public function orlando(): HasOne
    {
        return $this->hasOne(Orlando::class);
    }

    public function englishtown(): HasOne
    {
        return $this->hasOne(Englishtown::class);
    }
    public function stlouis(): HasOne
    {
        return $this->hasOne(STLouis::class);
    }
    public function seattle(): HasOne
    {
        return $this->hasOne(Seattle::class);
    }

    public function grantsville(): HasOne
    {
        return $this->hasOne(Grantsville::class);
    }

    public function irvindale(): HasOne
    {
        return $this->hasOne(Irwindale::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'driver_user'); // pivot table
    }
}
