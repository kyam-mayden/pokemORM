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

// http://pokemorm.test/trainer/20/update/ross/kemp
Route::get('/trainer/{id}/update/{new_first_name}/{new_second_name}', [TrainerController::class, 'update']);
