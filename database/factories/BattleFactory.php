<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Battle;
use App\Trainer;
use Faker\Generator as Faker;

$trainers = Trainer::all();

$factory->define(Battle::class, function (Faker $faker) use ($trainers)
{
    $battleTrainers = $trainers->random(2);

    return [
        'trainer_1' => $battleTrainers->first()->id,
        'trainer_2' => $battleTrainers->last()->id,
        'winner' => $battleTrainers->random(1)->first()->id,
    ];
});
