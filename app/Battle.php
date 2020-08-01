<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    protected $table = 'battle';

    protected $fillable = [
        'trainer_1',
        'trainer_2',
        'winner',
    ];
}
