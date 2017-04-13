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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});


Route::get('/dashboard', 'HomeController@index')->middleware('auth');
Route::post('/contact', 'ContactController@store');
Route::get('/message', 'ContactController@index')->middleware('auth');
Route::post('/message/{id}', 'ContactController@destroy')->middleware('auth');
