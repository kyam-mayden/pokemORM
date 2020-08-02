<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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

$allPokemon = Species::all();
$locations = Location::all();

$factory->define(Trainer::class, function (Faker $faker) use ($allPokemon, $locations) {
    return [
        'first_name' => $faker->firstName,
        'second_name' => $faker->lastName,
        'home_town' => $locations->random()->id,
        'favourite_pokemon' => $allPokemon->random()->id,
        'evil' => rand(0, 1) == 1,
    ];
});
