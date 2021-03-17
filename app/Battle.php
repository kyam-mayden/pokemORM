<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;

    protected $table = 'battle';

    protected $fillable = [
        'trainer_1',
        'trainer_2',
        'winner',
    ];
}
