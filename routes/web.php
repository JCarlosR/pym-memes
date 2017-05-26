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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/memes', 'MemeController@index');
Route::post('/memes', 'MemeController@store');
Route::get('/meme/{id}', 'MemeController@edit');
Route::post('/meme/{id}', 'MemeController@update');
Route::get('/meme/{id}/eliminar', 'MemeController@delete');	