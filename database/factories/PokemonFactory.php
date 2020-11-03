<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pokemon;
use App\Species;
use App\Trainer;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$species = Species::all();
$trainers = Trainer::all();

$factory->define(Pokemon::class, function (Faker $faker) use ($species) {
    return [
    'species_id' => $species->random()->id,
    'trainer_id' => $species->random()->id,
    'level' => $faker->numberBetween(1, 100),
    ];
});
