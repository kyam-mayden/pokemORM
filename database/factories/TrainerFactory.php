<?php

namespace Database\Factories;

use App\Location as Town;
use App\PokemonType;
use App\Species;
use App\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trainer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $allPokemon = Species::all();
        $allTypes = PokemonType::all();
        $locations = Town::all();

        return [
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->lastName,
            'home_town' => $locations->random()->id,
            'favourite_type' => $allTypes->random()->id,
            'favourite_pokemon' => $allPokemon->random()->id,
            'evil' => random_int(0, 1) === 1,
        ];
    }
}
