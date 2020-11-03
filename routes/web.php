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

use App\Http\Controllers\TrainerController;

Route::get('/', function () {
    return view('welcome');
});

//http://pokemorm.test/trainer
Route::get('/trainer', [TrainerController::class, 'index']);

//http://pokemorm.test/trainer/15/ROSS_KEMP
Route::get('/trainer/{id}/{name}', [TrainerController::class, 'update']);
