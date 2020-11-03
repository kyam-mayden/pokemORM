<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trainer extends Model
{
    protected $table = 'trainer';

    protected $softDelete = true;

    protected $fillable = [
        'first_name',
        'second_name',
        'home_town',
        'favourite_pokemon',
        'evil',
    ];

    public function pokemon(): HasMany
    {
        return $this->hasMany(Pokemon::class, 'trainer', 'id');
    }
}
