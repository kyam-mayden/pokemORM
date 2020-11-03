<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $table = 'gym';

    protected $fillable = [
        'name',
        'badge_name',
        'type_id',
        'town',
    ];
}
