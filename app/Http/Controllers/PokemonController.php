<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index(Request $request, $level)
    {
        $pokemon = Pokemon::where('level', '>', $level)
            ->get();
        return response()->json($pokemon);

//        $pokemon = Pokemon::levelMoreThan($level)
//            ->get();
//        return response()->json($pokemon);

//        $pokemon = Pokemon::with('species')
//            ->where('level', '>', $level)
//            ->whereHas('species', function ($builder) {
//                return $builder->where('evolves_to', null);
//            })
//            ->get()
//            ->sortBy('species_id')
//            ->values();
//        return response()->json($pokemon);


//        $pokemon = Pokemon::with('species')
//            ->levelMoreThan($level)
//            ->finalEvolution()
//            ->get()
//            ->sortBy('species_id')
//            ->values();

//        return response()->json($pokemon);
    }
}
