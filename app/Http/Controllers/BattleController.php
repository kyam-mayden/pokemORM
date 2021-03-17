<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Battle;
use Illuminate\Support\Facades\DB;

class BattleController extends Controller
{
    public function index()
    {
        $battlesAndTrainers = DB::select(
            'SELECT battle.id,
                    t1.id AS trainer_1_id,
                    t1.first_name AS trainer_1_first_name,
                    t1.second_name AS trainer_1_second_name,
                    t2.id AS trainer_2_id,
                    t2.first_name AS trainer_2_first_name,
                    t2.second_name AS trainer_2_second_name,
                    winner_id
                    FROM battle
                    INNER JOIN trainer AS t1 ON battle.trainer_1 = t1.id
                    INNER JOIN trainer AS t2 ON battle.trainer_2 = t2.id
                    INNER JOIN trainer AS winner ON battle.winner_id = winner.id'
        );

//        $battlesAndTrainers = Battle::with(['trainer1', 'trainer2', 'winner'])->get();

        return view('battleTable')->with('battles', $battlesAndTrainers);
    }

    public function getAll()
    {
        $battlesAndTrainers = DB::select(
            'SELECT battle.id,

                    t1.id AS trainer_1_id,
                    t1.first_name AS trainer_1_first_name,
                    t1.second_name AS trainer_1_second_name,
                    s1.name AS trainer_1_favourite,
                    pt1.name AS trainer_1_favourite_type,
                    t2.id AS trainer_2_id,

                    t2.first_name AS trainer_2_first_name,
                    t2.second_name AS trainer_2_second_name,
                    s2.name AS trainer_2_favourite,
                    pt2.name AS trainer_2_favourite_type,

                    winner_id
                    FROM battle
                    INNER JOIN trainer AS t1 ON battle.trainer_1 = t1.id
                    INNER JOIN trainer AS t2 ON battle.trainer_2 = t2.id
                    INNER JOIN trainer AS winner ON battle.winner_id = winner.id
                    INNER JOIN pokemon AS p1 ON t1.favourite_pokemon = p1.id
                    INNER JOIN pokemon AS p2 ON t2.favourite_pokemon = p2.id
					INNER JOIN species AS s1 ON p1.species_id = s1.id
                    INNER JOIN species AS s2 ON p2.species_id = s2.id
                    INNER JOIN pokemon_type AS pt1 ON s1.primary_type = pt1.id
                    INNER JOIN pokemon_type AS pt2 ON s2.primary_type = pt2.id'
        );

//        $battlesAndTrainers = Battle::with(
//            [
//                'trainer1',
//                'trainer2',
//                'winner',
//            ])
//            ->get();

        return view('battleTableAll')->with('battles', $battlesAndTrainers);
    }
}
