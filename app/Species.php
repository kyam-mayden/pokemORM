<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $table = 'type';

    protected $fillable = [
        'pokedex_number',
        'evolves_to',
        'name',
        'primary_type',
        'secondary_type',
    ];
}
