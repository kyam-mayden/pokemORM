<?php

use App\Location;
use App\PokemonType;
use App\Species;
use App\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $namedTrainers = collect(
            [
                [
                    'first_name' => 'Ash',
                    'second_name' => 'Ketchum',
                    'home_town' => Location::where('name', 'Pallet Town')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Rock')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Pikachu')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Gary',
                    'second_name' => 'Oak',
                    'home_town' => Location::where('name', 'Pallet Town')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Rock')->get()->first()->id,
                    'favourite_pokemon' => Species::whereIn('name', ['Charmander', 'Bulbasaur', 'Squirtle'])
                        ->get()
                        ->random()
                        ->id,
                    'evil' => true,
                ],
                [
                    'first_name' => 'Brock',
                    'second_name' => null,
                    'home_town' => Location::where('name', 'Pewter City')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Rock')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Onix')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Misty',
                    'second_name' => null,
                    'home_town' => Location::where('name', 'Cerulean City')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Water')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Starmie')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Lt. Surge',
                    'second_name' => null,
                    'home_town' => Location::where('name', 'Vermilion City')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Electric')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Electrode')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Erika',
                    'second_name' => null,
                    'home_town' => Location::where('name', 'Celadon City')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Grass')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Vileplume')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Koga',
                    'second_name' => null,
                    'home_town' => Location::where('name', 'Fuchsia City')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Poison')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Weezing')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Sabrina',
                    'second_name' => null,
                    'home_town' => Location::where('name', 'Saffron City')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Psychic')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Alakazam')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Blaine',
                    'second_name' => null,
                    'home_town' => Location::where('name', 'Cinnabar Island')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Fire')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Arcanine')->get()->first()->id,
                    'evil' => false,
                ],
                [
                    'first_name' => 'Giovanni',
                    'second_name' => null,
                    'home_town' => Location::where('name', 'Viridian City')->get()->first()->id,
                    'favourite_type' => PokemonType::where('name', 'Ground')->get()->first()->id,
                    'favourite_pokemon' => Species::where('name', 'Rhydon')->get()->first()->id,
                    'evil' => true,
                ],
            ]
        )->each(static function ($data) {
            $trainer = new Trainer($data);
            $trainer->save();
        });

        Trainer::factory(50)->create();
    }
}
