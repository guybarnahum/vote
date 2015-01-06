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

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/
    

// home
Route::get('/', 'HomeController@showWelcome');
    
// Authentication
Route::get ('login' , 'AuthController@showLogin');
Route::post('login' , 'AuthController@postLogin');
Route::get ('logout', 'AuthController@getLogout');

// Quest
Route::get( 'quest'      , 'QuestController@showRandomQuest');
Route::get( 'quest/{id}' , 'QuestController@showQuest')->where('id', '[0-9]+');
    
Route::get( 'quests', 'QuestController@showQuests' );
Route::get( 'chart', 'ChartController@showChart' );

// Secure-Routes
Route::group(array('before' => 'auth'), function()
{
    Route::get( 'user' , 'UserController@showUser' );
    Route::get( 'users', 'UserController@showUsers');

    Route::get('secret', 'UserController@showSecret');
});