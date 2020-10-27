<?php

use App\PokemonType;
use App\Species;
use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(base_path() . '/resources/csv/pokemon.csv', 'r');
        fgetcsv($file); // skip the first line
        while (($line = fgetcsv($file)) !== FALSE) {
            $secondaryType = PokemonType::where('name', $line[3])->limit(1)->get()->first();
            Species::insert(
                [
                    [
                        'pokedex_number' => (int) $line[0],
                        'name' => $line[1],
                        'primary_type' => PokemonType::where('name', $line[2])->limit(1)->get()->first()->id,
                        'secondary_type' => $secondaryType ? $secondaryType->id : null,
                    ],
                ]
            );
        }

        // We have to loop through each one again to update it's evolution
        // now that they have all been added
        rewind($file);
        fgetcsv($file); // skip the first line

        while (($line = fgetcsv($file)) !== FALSE) {
            $evolution = Species::where('name', $line[13])->limit(1)->get()->first();
            $species = Species::where('pokedex_number', $line[0])->get()->first();
            $species->evolves_to = $evolution ? $evolution->id : null;
            $species->save();
        }

        fclose($file);
    }
}
