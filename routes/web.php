<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\BattleController;

Route::get('/', function () {
    return view('welcome');
});

// http://pokemorm.test/battle/delete/user/1
Route::get('/battle/delete/user/{id}', [BattleController::class, 'delete']);

// http://pokemorm.test/battle/delete/user/1/hard
Route::get('/battle/delete/user/{id}/hard', [BattleController::class, 'hardDelete']);
