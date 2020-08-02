<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                PokemonTypeTableSeeder::class,
                SpeciesTableSeeder::class,
                LocationTableSeeder::class,
                TrainerTableSeeder::class,
            ]
        );
    }
}
