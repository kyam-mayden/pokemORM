<?php

use App\Location;
use App\Species;
use App\Trainer;
use Illuminate\Database\Seeder;

class TrainerTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Trainer::insert(
            [
                [
                    'first_name' => 'Ash',
                    'second_name' => 'Ketchum',
                    'home_town' => Location::where('name', 'Pallet Town')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Pikachu')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Gary',
                    'second_name' => 'Oak',
                    'home_town' => Location::where('name', 'Pallet Town')->get()->first()->id,
                    'favourite_pokemon' => Species::whereIn('name', ['Charmander', 'Bulbasaur', 'Squirtle'])->get()->random()->id,
                    'evil' => false,
                ],
            ]
        );

        factory(App\Trainer::class, 50)->create();
    }
}
