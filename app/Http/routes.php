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



Route::group(['middleware' => ['web']], function (){

	Route::get('/', function () {
    	return view('welcome');
	})->name('home');

	Route::get('/home', function () {
    	return view('welcome');
	});



	Route::post('/signup', [
		'uses' => 'UserController@postSignUp',
		'as' => 'signup'
	]);

	Route::post('/newuser', [
		'uses' => 'UserController@postNewUser',
		'as' => 'newuser',
		'middleware' => ['auth', 'subadmin'],
	]);


	Route::post('/signin', [
		'uses' => 'UserController@postSignIn',
		'as' => 'signin'
	]);

	Route::get('/account', [

		'uses' => 'UserController@getAccount',
		'as' => 'account'

	]);

	Route::get('/createuser', [

		'uses' => 'UserController@getCreateUser',
		'as' => 'createuser',
		'middleware' => 'auth'

	]);
	

	Route::get('/dashboard', [
		'uses' => 'PostController@getDashboard',
		'as' => 'dashboard',
		'middleware' => 'auth'

	]);

	Route::get('/logout', [

		'uses' => 'UserController@getLogout',
		'as' => 'logout'


	]);

	Route::get('/playgame', [

		'uses' => 'UserController@getPlayGame',
		'as' => 'playgame',
		'middleware' => ['auth'],


	]);

	Route::get('/playgame', [

		'uses' => 'UserController@getPlayGame',
		'as' => 'playgame',
		'middleware' => ['auth'],


	]);

	Route::get('/info', [

		'uses' => 'UserController@getInfo',
		'as' => 'info',
		'middleware' => ['auth'],


	]);
	
	Route::post('/getstats', [

		'uses' => 'UserController@postGetStats',
		'as' => 'getstats',
		'middleware' => ['auth', 'admin'],
	]);

});
