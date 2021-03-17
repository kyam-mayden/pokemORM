<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
