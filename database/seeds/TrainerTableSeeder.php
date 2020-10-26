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
                    'favourite_type' => 'Rock',
                    'favourite_pokemon' => Species::where('name', 'Pikachu')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Gary',
                    'second_name' => 'Oak',
                    'home_town' => Location::where('name', 'Pallet Town')->get()->first()->id,
                    'favourite_type' => 'Rock',
                    'favourite_pokemon' => Species::whereIn('name', ['Charmander', 'Bulbasaur', 'Squirtle'])
                        ->get()
                        ->random()
                        ->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Brock',
                    'home_town' => Location::where('name', 'Pewter City')->get()->first()->id,
                    'favourite_type' => 'Rock',
                    'favourite_pokemon' => Species::where('name', 'Onyx')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Misty',
                    'home_town' => Location::where('name', 'Cerulean City')->get()->first()->id,
                    'favourite_type' => 'Water',
                    'favourite_pokemon' => Species::where('name', 'Starmie')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Lt. Surge',
                    'home_town' => Location::where('name', 'Vermilion City')->get()->first()->id,
                    'favourite_type' => 'Electric',
                    'favourite_pokemon' => Species::where('name', 'Electrode')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Erika',
                    'home_town' => Location::where('name', 'Celadon City')->get()->first()->id,
                    'favourite_type' => 'Grass',
                    'favourite_pokemon' => Species::where('name', 'Vileplume')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Koga',
                    'home_town' => Location::where('name', 'Fuchsia City')->get()->first()->id,
                    'favourite_type' => 'Poison',
                    'favourite_pokemon' => Species::where('name', 'Weezing')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Sabrina',
                    'home_town' => Location::where('name', 'Saffron City')->get()->first()->id,
                    'favourite_type' => 'Psychic',
                    'favourite_pokemon' => Species::where('name', 'Alakazam')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Blaine',
                    'home_town' => Location::where('name', 'Cinnabar Island')->get()->first()->id,
                    'favourite_type' => 'Fire',
                    'favourite_pokemon' => Species::where('name', 'Arcanine')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Giovanni',
                    'home_town' => Location::where('name', 'Viridian City')->get()->first()->id,
                    'favourite_type' => 'Ground',
                    'favourite_pokemon' => Species::where('name', 'Rhydon')->get()->first()->id,
                    'evil' => true,
                ],
            ]
        );

        factory(App\Trainer::class, 50)->create();
    }
}
