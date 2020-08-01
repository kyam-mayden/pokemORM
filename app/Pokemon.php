<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'type';

    protected $fillable = [
        'species',
        'trainer',
        'level',
    ];
}
