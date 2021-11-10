<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trainer extends Model
{
    use HasFactory;
    protected $table = 'trainer';

    protected $softDelete = true;

    protected $fillable = [
        'first_name',
        'second_name',
        'home_town',
        'favourite_type',
        'favourite_pokemon',
        'evil',
    ];

    public $appends = [
        'fullName',
        'favouriteSpeciesTypeName',
    ];

    public function favouritePokemon(): HasOne
    {
        return $this->hasOne(
            Pokemon::class,
            'id',
            'favourite_pokemon'
        );
    }

    public function homeTown(): HasOne
    {
        return $this->hasOne(
            Location::class,
            'id',
            'home_town'
        );
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->second_name;
    }

    public function setFullNameAttribute($fullName): string
    {
        $parts = explode(" ", $fullName);
        $this->first_name = strtolower($parts[0]);
        $this->second_name = strtolower($parts[1]);
    }


    public function getFavouriteSpeciesTypeNameAttribute(): string
    {
        return $this->favouritePokemon->species->type->name;
    }
}
