<?php

namespace App\Http\Controllers;

use App\Battle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BattleController extends Controller
{
    public function delete(Request $request, $id)
    {
        DB::update(
            'UPDATE battle SET deleted_at = NOW(), updated_at = NOW() WHERE trainer_1 = ? OR trainer_2 = ?',
            [
                $id,
                $id,
            ]
        );

//        Battle::where('trainer_1', $id)
//            ->orWhere('trainer_2', $id)
//            ->delete();

        return response()->json(['yes']);
    }

    public function hardDelete(Request $request, $id)
    {
        DB::update(
            'DELETE FROM battle WHERE trainer_1 = ? OR trainer_2 = ?',
            [
                $id,
                $id,
            ]
        );

//        Battle::where('trainer_1', $id)
//            ->orWhere('trainer_2', $id)
//            ->forceDelete();

        return response()->json(['yes']);
    }
}
