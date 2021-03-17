<?php

namespace Database\Factories;

use App\Pokemon;
use App\Species;
use App\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pokemon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $species = Species::all();
        $trainers = Trainer::all();

        return [
            'species_id' => $species->random()->id,
            'trainer_id' => $trainers->random()->id,
            'level' => $this->faker->numberBetween(1, 100),
        ];
    }
}