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
	$articles = Article::with('user')->orderBy('created_at', 'desc')->paginate(10);

	return View::make('index')->with('articles', $articles);

});

Route::get('/login', function()

{

	return View::make('login');

});
/**
* login
*/
Route::post('/login',   array('before' => 'csrf',
	'uses' => 'UserController@login'));


Route::post('register', array('before' => 'csrf', 
	'uses'=>'UserController@register'));

Route::get('register', function(){
	return View::make('users.create');
});


Route::get('/logout', array('before' => 'auth', 'uses'=>'UserController@logout'));

Route::get('/user/{id}/edit', array('before' => 'auth', 'as'=>'user.edit', 'uses'=>'UserController@edit' ));
Route::put('user/{id}', array('before' => 'auth|csrf', 'uses'=>'UserController@update'));

Route::get('/article/{id}/delete', array('before' => 'auth', 'uses'=>'ArticleController@destroy_get'));



Route::resource('article', 'ArticleController');




