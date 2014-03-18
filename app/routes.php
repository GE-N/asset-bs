<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// Route::group([ 'prefix' => 'api/v1' ], function (){
// 	Route::resource('phones', 'PhonesController');	
// });

Route::filter('auth', function(){

	if (Auth::guest()) {
		return Redirect::route('login');
	}
});

Route::filter('guest', function(){
	
	if (Auth::user()) {
		return Redirect::route('users.show', Auth::user()->id);
	}
});

Route::filter('adminOnly', function (){

	if (Auth::user()->role != 'admin') {
		return Redirect::route('users.show', Auth::user()->id);
	}
});

// :: Group route

Route::group( array('before' => 'auth'), function(){

	// Transaction routes.
	Route::resource('transactions', 'TransactionsController');
	Route::post('transactions/{id}', array( 'as' => 'transactions.update.action', 
											'uses' => 'TransactionsController@updateAction'));

	// User routes.
	Route::resource('users', 'UsersController');
});

Route::group( array('before' => 'guest'), function (){

	Route::get('/login', array( 'as' => 'login', 
								'uses' => 'UsersController@login' ) );
	Route::post('/login', array( 'as' => 'login.auth', 
								 'uses' => 'UsersController@authenticate' ) );
});

Route::group( array('before' => 'adminOnly'), function (){

	$adminRole = ['only' => ['edit', 'delete']];

	Route::resource('phones', 'PhonesController');
	Route::resource('simcards', 'SimcardsController');
	Route::resource('accessories', 'AccessoriesController');
	
	Route::resource('users', 'UsersController', [ 'only' => ['index', 'create', 'destroy'] ]);
});

// :: Public routes

$publicRoute = ['only' => ['index', 'show']];

Route::resource('phones', 'PhonesController', $publicRoute );
Route::resource('simcards', 'SimcardsController', $publicRoute);
Route::resource('accessories', 'AccessoriesController', $publicRoute);

Route::get('/logout', function (){
	Auth::logout();
	return Redirect::route('login');
});
