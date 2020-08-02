<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Location::insert(
            [
                ['name' => 'Pallet Town', 'region' => 'Kanto'],
                ['name' => 'Viridian City', 'region' => 'Kanto'],
                ['name' => 'Pewter City', 'region' => 'Kanto'],
                ['name' => 'Cerulean City', 'region' => 'Kanto'],
                ['name' => 'Vermilion City', 'region' => 'Kanto'],
                ['name' => 'Lavender Town', 'region' => 'Kanto'],
                ['name' => 'Celadon City', 'region' => 'Kanto'],
                ['name' => 'Fuchsia City', 'region' => 'Kanto'],
                ['name' => 'Saffron City', 'region' => 'Kanto'],
                ['name' => 'Cinnabar Island', 'region' => 'Kanto'],
            ]
        );
    }
}
