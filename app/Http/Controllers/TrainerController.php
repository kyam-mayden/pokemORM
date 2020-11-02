<?php

namespace App\Http\Controllers;

use App\Trainer;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    public function update(Request $request, $id, $firstName, $secondName)
    {
        $trainer = DB::select('SELECT * FROM trainer WHERE id = ?', [$id]);

        if (empty($trainer)) {
            throw new Exception();
        }

        DB::update(
            'UPDATE trainer
                SET first_name = ?,
                    second_name = ?
              WHERE id = ?',
            [$firstName, $secondName, $id]
        );

        $trainer = DB::select('SELECT * FROM trainer WHERE id = ?', [$id]);

//        $trainer = Trainer::findOrFail($id);
//        $trainer->first_name = $firstName;
//        $trainer->second_name = $secondName;
//
//        $trainer->save();

//        $trainer = Trainer::where('id', $id)
//            ->update(
//                [
//                    'first_name' => $firstName,
//                    'second_name' => $secondName,
//                ]
//            );

        return response()->json($trainer);
    }
}
