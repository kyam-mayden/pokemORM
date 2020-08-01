<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PokemonType extends Model
{
    protected $table = 'pokemon_type';

    protected $fillable = [
        'name',
    ];
}
