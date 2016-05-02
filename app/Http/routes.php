<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('/admin/blog', [
	'as' => 'home',
	'uses' => 'AdminController@index'
]);

Route::get('admin/posts/{id}/edit', 'AdminController@edit');

Route::post('admin/posts/{id}/refresh', 'AdminController@refresh');

Route::get('admin/posts/new', [
	'as' => 'nuevo',
	'uses' => 'AdminController@create'
]);

Route::get('admin/posts/{id}/delete', 'AdminController@delete');

Route::post('admin/posts/new', 'AdminController@store');


