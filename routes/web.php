<?php

use App\Http\Controllers\BattleController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TrainerController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Lesson 0 - Models
|--------------------------------------------------------------------------
*/
// php artisan tinker
// $trainer = App\Battle::create(['trainer_1' => 1, 'trainer_2' => 2, 'winner_id' => 5]);
/*
|--------------------------------------------------------------------------
| Lesson 1 - Select
|--------------------------------------------------------------------------
*/
//http://pokemorm.test/species
Route::get('/species', [PokemonController::class, 'index']);

//http://pokemorm.test/species/64
Route::get('/species/{id}', [PokemonController::class, 'get']);

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Lesson 2 - Insert
|--------------------------------------------------------------------------
*/
//http://pokemorm.test/trainer/new
Route::get('/trainer/new', [TrainerController::class, 'create']);
Route::get('/trainer', [TrainerController::class, 'index']);

//http://pokemorm.test/trainer/new/first
Route::get('/trainer/new/first', [TrainerController::class, 'createNew']);

//http://pokemorm.test/trainer/loads
Route::get('/trainer/new/loads', [TrainerController::class, 'createMany']);

/*
|--------------------------------------------------------------------------
| Lesson 3 - Joins & Relationships
|--------------------------------------------------------------------------
*/
//http://pokemorm.test/trainer/battle
Route::get('/battle', [BattleController::class, 'index']);
//http://pokemorm.test/trainer/battle/all
Route::get('/battle/all', [BattleController::class, 'getAll']);
