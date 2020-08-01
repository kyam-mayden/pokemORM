<?php

use App\PokemonType;
use Illuminate\Database\Seeder;

class PokemonTypeTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        PokemonType::insert(
            [
                [
                    'name' => 'Fighting',
                ],
                [
                    'name' => 'Ice',
                ],
                [
                    'name' => 'Water',
                ],
                [
                    'name' => 'Grass',
                ],
                [
                    'name' => 'Fire',
                ],
                [
                    'name' => 'Ground',
                ],
                [
                    'name' => 'Normal',
                ],
                [
                    'name' => 'Ghost',
                ],
                [
                    'name' => 'Poison',
                ],
                [
                    'name' => 'Psychic',
                ],
                [
                    'name' => 'Flying',
                ],
                [
                    'name' => 'Bug',
                ],
                [
                    'name' => 'Rock',
                ],
                [
                    'name' => 'Electric',
                ],
                [
                    'name' => 'Dragon',
                ],
                [
                    'name' => 'Fairy',
                ],
            ]
        );
    }
}
