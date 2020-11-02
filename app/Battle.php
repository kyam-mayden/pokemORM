<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Battle extends Model
{
    protected $table = 'battle';

    use SoftDeletes;

    protected $fillable = [
        'trainer_1',
        'trainer_2',
        'winner',
    ];
}
