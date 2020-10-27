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
                PokemonTypeSeeder::class,
                SpeciesSeeder::class,
                LocationSeeder::class,
                TrainerSeeder::class,
                PokemonSeeder::class,
                GymSeeder::class,
                BattleSeeder::class,
            ]
        );
    }
}
