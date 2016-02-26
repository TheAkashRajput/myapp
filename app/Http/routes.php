
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

Route::get('/', 'VideoController@index');
Route::get('add', 'VideoController@add');
Route::get('success', 'VideoController@success');
Route::get('{video}/edit', 'VideoController@edit');
Route::get('{video}/delete', 'VideoController@delete');
Route:get('home', 'VideoController@home'); 
Route::get('hits', 'VideoController@hits');
Route::get('dashboard', 'VideoController@dashboard');

Route::get('ucv','cvController@updateCurrentVideo');
Route::get('gcv','cvController@getCurrentVideo');
Route::get('ghv', 'VideoController@getHighestVideo');
Route::get('gv', 'VideoController@getVideo');
Route::post('add', 'VideoController@store');
Route::get('gvc', 'VoteController@getVCount');
Route::get('rv', 'VoteController@registerVote');

Route::patch('/{video}', 'VideoController@update');

Route::controllers([
    
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);