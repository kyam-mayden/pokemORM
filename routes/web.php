<?php

use App\Http\Controllers\PokemonController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Lesson 0 - Models
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Lesson 1 - Select
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//http://pokemorm.test/species
Route::get('/species', [PokemonController::class, 'index']);

//http://pokemorm.test/species/64
Route::get('/species/{id}', [PokemonController::class, 'get']);
