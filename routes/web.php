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

//authentication routes
Auth::routes();

//homepage route
Route::get('/', function () {
    return view('welcome');
});

//homepage route
Route::get('/home', function () {
    return view('welcome');
});

//store message from contact us page
Route::post('/contact', 'ContactController@store');

//display the lists of the blog posts
Route::get('/blog', 'PostController@posts');

//display a particular post along with comment section
Route::get('/blog/{slug}', 'PostController@show');

//display the lists of portfilios
Route::get('/portfolio', 'PortfolioController@frontEndPortfolio');

//following routes can be accessed by only authenticated users
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

	//landing page after login
	Route::get('/dashboard', 'HomeController@index');

	// viewing the messages from contact us page
	Route::get('/message', 'ContactController@index');

	//deleting the messaage from contact us page
	Route::post('/message/{id}', 'ContactController@destroy');

	//list all the resources of portfolio in backend
	Route::get('all-portfolios', 'PortfolioController@index');

	//display a page for creating portfolio in backend
	Route::get('new-portfolio', 'PortfolioController@create');

	//Store portfolio data into database
	Route::post('new-portfolio', 'PortfolioController@store');

	// edit portfolio form
	Route::get('portfolio/edit/{id}',['as' => 'portfolio.edit', 'uses' => 'PortfolioController@edit']);

	// update portfolio
	Route::post('portfolio/update','PortfolioController@update');

	//deleting a portfolio
	Route::get('/portfolio/delete/{id}', 'PortfolioController@destroy');


});
