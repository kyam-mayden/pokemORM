<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    public function getPokemon(Request $request, $id)
    {
        $breedsAndPokemon = DB::select(
            'SELECT pokemon.level, species.name FROM trainer
                    INNER JOIN pokemon ON pokemon.trainer_id = trainer.id
                    INNER JOIN species ON pokemon.species_id = species.id
              WHERE trainer.id = ?
              ORDER BY pokemon.level',
            [
                $id
            ]
        );

        return response()->json($breedsAndPokemon);

//        $trainer = Trainer::findOrFail($id);
//        $pokemon = $trainer->pokemon;
//        dd($pokemon[0]->species);
//
//        $breedsAndPokemon =[];
//
//        foreach ($pokemon as $poke) {
//            dd($poke->trainer);
//            $breedsAndPokemon[] = [
//                'level' => $poke->level,
//                'name' => $poke->breed->name,
//            ];
//        }
//
//        usort($breedsAndPokemon, function ($a, $b) {
//            if ($a['level'] === $b['level']) {
//                return 0;
//            }
//            return ($a['level'] < $b['level']) ? -1 : 1;
//        });
//
//        return response()->json($breedsAndPokemon);

//
//        $trainer = Trainer::where('id', $id)
//            ->with(['pokemon', 'pokemon.species'])
//            ->get();
//
//        $breedsAndPokemon = $trainer
//            ->pluck('pokemon')
//            ->flatten()
//            ->sortBy('level')
//            ->values()
//            ->map(function ($pokemon) {
//                return [
//                    'level' => $pokemon->level,
//                    'name' => $pokemon->species->name,
//                ];
//            });
//
//        return response()->json($breedsAndPokemon);

//        HasOne
//        BelongsToOne
//        HasMany
//        HasOneThrough
//        HasManyThrough
//        Using
    }
}
