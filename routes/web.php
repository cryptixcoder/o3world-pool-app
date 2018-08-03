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

Route::get('/', 'LeaderboardController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/players', 'PlayerController@index')->name('player.index');
Route::get('/players/create', 'PlayerController@create')->name('player.create');
Route::post('/players/create', 'PlayerController@store')->name('player.store');
Route::get('/players/{player}', 'PlayerController@show')->name('player.show');
Route::get('/players/{player}/edit', 'PlayerController@edit')->name('player.edit');
Route::post('/players/{player}/edit', 'PlayerController@update')->name('player.update');

Route::get('/games', 'GameController@index')->name('game.index');
Route::get('/games/create', 'GameController@create')->name('game.create');
Route::post('/games/create', 'GameController@store')->name('game.store');
Route::get('/games/{game}', 'GameController@show')->name('game.show');
Route::get('/games{game}/edit', 'GameController@edit')->name('game.edit');
Route::post('/games/{game}/edit', 'GameController@update')->name('game.update');

Route::get('/game/{game}/start','GameController@start')->name('game.start');
Route::get('/game/{game}/player/{player}/winner', 'GameController@winner')->name('game.winner');