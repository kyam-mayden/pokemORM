<?php

use App\Http\Controllers\BattleController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Lesson 0 - Models
|--------------------------------------------------------------------------
*/
// sail artisan tinker
// $battle = App\Battle::create(['trainer_1' => 1, 'trainer_2' => 2, 'winner_id' => 1]);
/*
|--------------------------------------------------------------------------
| Lesson 1 - Select
|--------------------------------------------------------------------------
*/
//http://pokemorm.test/species
Route::get('/species', [PokemonController::class, 'index']);

//http://pokemorm.test/species/64
Route::get('/species/{id}', [PokemonController::class, 'get']);

//http://pokemorm.test/species/strict/64
Route::get('/species/strict/{id}', [PokemonController::class, 'getStrict']);

//http://pokemorm.test/species/columns/64
Route::get('/species/columns/{id}', [PokemonController::class, 'getColumns']);

// student exercise
//http://pokemorm.test/species/solve
Route::get('/species/all/solve', [PokemonController::class, 'getUnsolved']);

/*
|--------------------------------------------------------------------------
| Lesson 2 - Insert
|--------------------------------------------------------------------------
*/
//http://pokemorm.test/trainer
Route::get('/trainer', [TrainerController::class, 'index']);
Route::get('/trainer/new', [TrainerController::class, 'create']);

Route::get('/trainer/new/first', [TrainerController::class, 'createNew']);

Route::get('/trainer/new/loads', [TrainerController::class, 'createMany']);

/*
|--------------------------------------------------------------------------
| Lesson 3 - Joins & Relationships
|--------------------------------------------------------------------------
*/
//http://pokemorm.test/battle
Route::get('/battle', [BattleController::class, 'index']);
//http://pokemorm.test/battle/all
Route::get('/battle/all', [BattleController::class, 'getAll']);
