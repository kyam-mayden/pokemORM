<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    public function index()
    {
        // get trainer full name
        $trainerNames = DB::select(
            "SELECT IF(second_name IS NULL, first_name, CONCAT(first_name, ' ', second_name)) as fullName FROM trainer"
        );
        return response()->json($trainerNames);

//        $names = array_map(function ($trainer) {
//            return $trainer->fullName;
//        }, $trainerNames);
//        return response()->json($names);
    }

    public function update(Request $request, $id, $name)
    {
        [$firstName, $secondName] = explode('_', strtolower($name));

        DB::update(
            'UPDATE trainer SET first_name = ?, second_name = ? WHERE id = ?',
            [
                $firstName,
                $secondName,
                $id,
            ]
        );

        $trainer = DB::select(
            "SELECT * FROM trainer where id = ?",
            [
                $id,
            ]
        );
        return response()->json($trainer);

//        $trainer = Trainer::findOrFail($id);
//        $trainer->name = $name;
//        $trainer->save();
//
//        return response()->json($trainer);
    }
}
