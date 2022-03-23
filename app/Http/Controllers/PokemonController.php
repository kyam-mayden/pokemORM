<?php

namespace App\Http\Controllers;

use App\Species;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemon = DB::select(
            'SELECT * FROM species'
        );

        // See that it returns a COLLECTION of MODELS
//        $pokemon = Species::get();

        // Query builder
//        $pokemon = Species::where('pokedex_number', '<', 50)->get();
//        dd($pokemon);
        return view('pokemonTable')->with('species', $pokemon);
    }

    public function get(Request $request, $id)
    {
        // Find by ID
        $pokemon = DB::select(
            'SELECT * FROM species
              WHERE `id` = :id',
            [
                'id' => $id,
            ]
        );

        $pokemon = $pokemon[0];

//        $pokemon = Species::where('id', $id)->get()->first();
//        $pokemon = Species::find($id);

        // Get specific columns by ID

//        $pokemon = DB::select(
//            'SELECT pokedex_number, `name` FROM species
//              WHERE id > :id
//                AND secondary_type IS NOT NULL
//                AND evolves_to IS NULL
//              ORDER BY name DESC',
//            [
//                'id' => $id,
//            ]
//        );
//        $pokemon = $pokemon[0];

//        $pokemon = Species::select(['pokedex_number', 'name'])
//            ->where(
//                [
//                    ['id', '>' , $id],
//                    ['secondary_type', '!=', null],
//                ])
//            ->whereNull('evolves_to')
//            ->orderBy('name', 'DESC')
//            ->first();
//

        // For the students to translate
//                $pokemon = DB::select(
//            "SELECT `name`, primary_type FROM species
//              WHERE name LIKE 's%'
//                AND evolves_to IS NOT NULL
//              ORDER BY name DESC
//              LIMIT 5;",
//                );
//        $pokemon = $pokemon ?? [];
//        dd($pokemon);

        // Halt execution of app if entry not found

//        $pokemon = DB::select(
//            'SELECT * FROM species
//              WHERE `id` = :id',
//            [
//                'id' => $id,
//            ]
//        );
//
//        if (empty($pokemon)) {
//            throw new ModelNotFoundException();
//        }
//
//        $pokemon = $pokemon[0];

//        $pokemon = Species::findOrFail($id);
//
        return view('singlePokemon')->with('pokemon', $pokemon);
    }
}
