<?php
/** @noinspection ALL */

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::get()->reverse();
        return view('trainerTable')->with('trainers', $trainers);
    }

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
//        Students create their own

        return redirect('/trainer');
    }

    public function createMany()
    {
        $newTrainers = [
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

        foreach ($newTrainers as $newTrainer) {
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
                array_values($newTrainer)
            );
        }
//        foreach ($newTrainers as $newTrainer) {
//            Trainer::create($newTrainer);
//        }

//        $trainers = Collection::make($newTrainers)->map(function($params) {
//            return Trainer::create($params);
//        });

        return redirect('/trainer');
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
        // Students translate

        return redirect('/trainer');

    }
}
