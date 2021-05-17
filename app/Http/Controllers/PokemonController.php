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

//        $pokemon = Species::all();
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
