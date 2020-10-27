<?php

use App\Battle;
use Illuminate\Database\Seeder;

class BattleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Battle::class, 500)->create();
    }
}
