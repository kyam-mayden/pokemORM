<?php

namespace App\Http\Controllers;

use App\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemon = DB::select(
            'SELECT * FROM species'
        );
        return response()->json($pokemon);

//        $pokemon = Species::all();
//        return response()->json($pokemon);
    }

    public function get(Request $request, $id)
    {
        $pokemon = DB::select(
            'SELECT * FROM species
              WHERE `id` = :id',
            [
                'id' => $id,
            ]
        );
        return response()->json($pokemon[0]);

//        $pokemon = Species::findOrFail($id);
//        return response()->json($pokemon);

//        $pokemon = DB::select(
//            'SELECT id, name FROM species
//              WHERE id > :id
//                AND secondary_type IS NOT NULL
//                AND evolves_to IS NULL
//              ORDER BY name DESC',
//            [
//                'id' => $id,
//            ]
//        );
//        return response()->json($pokemon);

//        $pokemon = Species::select(['id', 'name'])
//            ->where(
//                [
//                    ['id', '>' , $id],
//                    ['secondary_type', '!=', null]
//            ])
//            ->whereNull('evolves_to')
//            ->orderBy('name', 'DESC')
//            ->get();
//
//        return response()->json($pokemon);

//        $pokemon = Species::findOrFail($id);
//
//        dd($pokemon->name, $pokemon['pokedex_number']);
    }
}
