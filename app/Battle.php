<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Battle extends Model
{
    use HasFactory;

    protected $table = 'battle';

    protected $fillable = [
        'trainer_1',
        'trainer_2',
        'winner_id',
    ];

    public function trainer1(): HasOne
    {
        return $this->hasOne(
            Trainer::class,
            'id',
            'trainer_1'
        );
    }

    public function trainer2(): HasOne
    {
        return $this->hasOne(
            Trainer::class,
            'id',
            'trainer_2'
        );
    }

    public function winner(): HasOne
    {
        return $this->hasOne(
            Trainer::class,
            'id',
            'winner_id'
        );
    }
}
