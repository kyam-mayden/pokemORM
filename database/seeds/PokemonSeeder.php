<?php

use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pokemon::class, 500)->create();
    }
}
