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



Route::get('/','HomeController@index');
Route::post('/avatar/{id?}','MeController@upload');
Route::get('/thumbs','MeController@images');
Route::get('/profile','ProfileController@index');
Route::post('/create','HomeController@create');
Route::get('/me','MeController@index');
Route::post('/email','HomeController@email');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/sega', function()
{
    $img = Image::make('img/f.jpg')->resize(400, 300);

    return $img->response('jpg');
    
    //$img->save('public/bar.jpg');
});

Route::get('/mongodb', function()
{
    $chat= \App\Chatmongodb::all();
    return($chat);
});




