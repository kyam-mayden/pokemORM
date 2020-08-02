<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainer';

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'second_name',
        'home_town',
        'favourite_pokemon',
        'evil',
    ];
}
