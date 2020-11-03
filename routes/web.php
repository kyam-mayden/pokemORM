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

//http://pokemorm.test/trainer/new
Route::get('/trainer/new', [TrainerController::class, 'create']);

//http://pokemorm.test/trainer/new/first
Route::get('/trainer/new/first', [TrainerController::class, 'createNew']);

//http://pokemorm.test/trainer/loads
Route::get('/trainer/new/loads', [TrainerController::class, 'createMany']);
