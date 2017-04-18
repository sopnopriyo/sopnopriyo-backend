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

Route::get('/blog', 'PostController@posts');
Route::get('/blog/{slug}', 'PostController@show');


Route::group(['middleware' => ['auth']], function()
{
	// show new post form
	Route::get('new-post','PostController@create');
	
	// save new post
	Route::post('new-post','PostController@store');
	
	// edit post form
	Route::get('edit/{slug}',['as' => 'post.edit', 'uses' => 'PostController@edit']);

	// update post
	Route::post('update','PostController@update');
	
	// delete post
	Route::get('delete/{id}',['as' => 'post.delete', 'uses' => 'PostController@destroy']);
	
	// display user's all posts
	Route::get('all-posts','PostController@index');

	
});
