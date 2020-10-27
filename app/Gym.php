<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $table = 'gym';

    protected $fillable = [
        'name',
        'leader',
        'badge_name',
        'type',
        'town',
    ];
}
