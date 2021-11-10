<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    protected $table = 'location';

    protected $fillable = [
        'name',
        'region',
    ];

    public function gym(): BelongsTo
    {
        return $this->belongsTo(
            Gym::class,
            'id',
            'town',
        );
    }
}
