<?php

use App\Gym;
use App\Location;
use App\PokemonType;
use App\Trainer;
use Illuminate\Database\Seeder;

class GymTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Gym::insert(
            [
                [
                    'name' => 'Pewter City Gym',
                    'badge_name' => 'Boulder Badge',
                    'type' => PokemonType::where('name', 'Rock')->first()->id,
                    'town' => Location::where('name', 'Pewter City')->first()->id,
                    'badge_description' => 'It is a simple gray octagon.',
                ],
                [
                    'name' => 'Cerulean City Gym',
                    'badge_name' => 'Cascade Badge',
                    'type' => PokemonType::where('name', 'Water')->first()->id,
                    'town' => Location::where('name', 'Cerulean City')->first()->id,
                    'badge_description' => 'It is in the shape of a light blue raindrop.',
                ],
                [
                    'name' => 'Vermilion City Gym',
                    'badge_name' => 'Thunder Badge',
                    'type' => PokemonType::where('name', 'Electric')->first()->id,
                    'town' => Location::where('name', 'Vermilion City')->first()->id,
                    'badge_description' => 'It is in the shape of an eight-pointed gold star with an orange octagon in the center.',
                ],
                [
                    'name' => 'Celadon City Gym',
                    'badge_name' => 'Rainbow Badge',
                    'type' => PokemonType::where('name', 'Grass')->first()->id,
                    'town' => Location::where('name', 'Celadon City')->first()->id,
                    'badge_description' => 'It is shaped like a flower, showing grass, with rainbow colored petals.',
                ],
                [
                    'name' => 'Fuchsia City Gym',
                    'badge_name' => 'Soul Badge',
                    'type' => PokemonType::where('name', 'Poison')->first()->id,
                    'town' => Location::where('name', 'Fuchsia City')->first()->id,
                    'badge_description' => 'It is in the shape of a fuchsia heart.',
                ],
                [
                    'name' => 'Saffron City Gym',
                    'badge_name' => 'Marsh Badge',
                    'type' => PokemonType::where('name', 'Psychic')->first()->id,
                    'town' => Location::where('name', 'Saffron City')->first()->id,
                    'badge_description' => 'It is two concentric golden circles.',
                ],
                [
                    'name' => 'Cinnabar Island Gym',
                    'badge_name' => 'Volcano Badge',
                    'type' => PokemonType::where('name', 'Fire')->first()->id,
                    'town' => Location::where('name', 'Cinnabar Island')->first()->id,
                    'badge_description' => 'It is red and shaped like a flame with a small pink diamond in the center.',
                ],
                [
                    'name' => 'Viridian City Gym',
                    'badge_name' => 'Earth Badge',
                    'type' => PokemonType::where('name', 'Ground')->first()->id,
                    'town' => Location::where('name', 'Viridian City')->first()->id,
                    'badge_description' => 'It is shaped like a plant, possibly a Sakaki tree, which is identical to the Japanese name of the Gym Leader.',
                ],
            ]
        );

        DB::table('gym_leaders')->insert(
            [
                [
                    'gym' => Gym::where('name', 'Pewter City Gym')->first()->id,
                    'leader' => Trainer::where(['first_name' => 'Brock', 'second_name' => null])->get()->first()->id,
                ],
                [
                    'gym' => Gym::where('name', 'Cerulean City Gym')->first()->id,
                    'leader' => Trainer::where(['first_name' => 'Misty', 'second_name' => null])->get()->first()->id,
                ],
                [
                    'gym' => Gym::where('name', 'Vermilion City Gym')->first()->id,
                    'leader' => Trainer::where(['first_name' => 'Lt. Surge', 'second_name' => null])->get()->first()->id,
                ],
                [
                    'gym' => Gym::where('name', 'Celadon City Gym')->first()->id,
                    'leader' => Trainer::where(['first_name' => 'Erika', 'second_name' => null])->get()->first()->id,
                ],
                [
                    'gym' => Gym::where('name', 'Fuchsia City Gym')->first()->id,
                    'leader' => Trainer::where(['first_name' => 'Koga', 'second_name' => null])->get()->first()->id,
                ],
                [
                    'gym' => Gym::where('name', 'Saffron City Gym')->first()->id,
                    'leader' => Trainer::where(['first_name' => 'Sabrina', 'second_name' => null])->get()->first()->id,
                ],
                [
                    'gym' => Gym::where('name', 'Cinnabar Island Gym')->first()->id,
                    'leader' => Trainer::where(['first_name' => 'Blaine', 'second_name' => null])->get()->first()->id,
                ],
                [
                    'gym' => Gym::where('name', 'Viridian City Gym')->first()->id,
                    'leader' => Trainer::where(['first_name' => 'Giovanni', 'second_name' => null])->get()->first()->id,
                ],
            ]
        );
    }
}
