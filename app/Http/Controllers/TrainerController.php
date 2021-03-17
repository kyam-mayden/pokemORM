<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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

//        $trainer = new Trainer(
//            [
//                'first_name' => 'Vinnie',
//                'second_name' => 'Jones',
//                'home_town' => 1,
//                'favourite_pokemon' => 150,
//                'favourite_type' => 5,
//                'evil' => true,
//            ]
//        );
//        $trainer->save();

        return response()->json($trainer);
    }

    public function createMany()
    {
        $params = [
            [
                'first_name' => 'Vinnie',
                'second_name' => 'Jones',
                'home_town' => 1,
                'favourite_pokemon' => 150,
                'favourite_type' => 5,
                'evil' => true,
            ],
            [
                'first_name' => 'Dennis',
                'second_name' => 'Wise',
                'home_town' => 4,
                'favourite_pokemon' => 55,
                'favourite_type' => 2,
                'evil' => true,
            ],
            [
                'first_name' => 'Mick',
                'second_name' => 'Hartford',
                'home_town' => 6,
                'favourite_pokemon' => 12,
                'favourite_type' => 9,
                'evil' => true,
            ],
        ];

        foreach ($params as $param) {
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
                array_values($param)
            );
        }

        $trainers = DB::SELECT('SELECT * FROM trainer ORDER BY id DESC LIMIT ?', [count($params)]);

//        $trainers = Collection::make($params)->map(function($params) {
//            return Trainer::create($params);
//        });

        return response()->json($trainers);
    }

    public function createNew()
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
                          SELECT ?,?,?,?,?,?, NOW(), NOW()
                          WHERE NOT EXISTS (SELECT * FROM trainer WHERE first_name = ? AND second_name = ? LIMIT 1)',
            [
                'Vinnie',
                'Jones',
                1,
                150,
                5,
                true,
                'Vinnie',
                'Jones',
            ]
        );
        $trainer = DB::SELECT('SELECT * FROM trainer ORDER BY id DESC LIMIT 1');

//        $trainer = Trainer::firstOrCreate(
//            [
//                'first_name' => 'Vinnie',
//                'second_name' => 'Jones',
//            ],
//            [
//                'home_town' => 1,
//                'favourite_pokemon' => 150,
//                'favourite_type' => 5,
//                'evil' => true,
//            ]
//        );

        return response()->json($trainer);
    }
}
