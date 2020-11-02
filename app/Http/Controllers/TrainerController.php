<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    public function create()
    {
        DB::INSERT(
            'INSERT INTO trainer (first_name,
                                  second_name,
                                  home_town,
                                  favourite_pokemon,
                                  favourite_type,
                                  evil,
                                  created_at,
                                  updated_at)
                          VALUES (?,?,?,?,?,?, NOW(), NOW())',
            [
                'Vinnie',
                'Jones',
                1,
                150,
                5,
                true,
            ]
        );
        $trainer = DB::SELECT('SELECT * FROM trainer ORDER BY id DESC LIMIT 1');

//        $trainer = Trainer::create(
//            [
//                'first_name' => 'Vinnie',
//                'second_name' => 'Jones',
//                'home_town' => 1,
//                'favourite_pokemon' => 150,
//                'favourite_type' => 5,
//                'evil' => true,
//            ]
//        );

        return response()->json($trainer);
    }
}
