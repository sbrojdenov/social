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
Route::get('/home','HomeController@profile');
Route::post('/avatar/{id?}','MeController@upload');
Route::get('/thumbs','MeController@images');
Route::get('/profile','ProfileController@index');
Route::get('/getall','MatchController@getAll');
Route::get('/getmatch','MatchController@getmatch');
Route::post('/create','HomeController@create');
Route::get('/me','MeController@index');
Route::get('/match','MatchController@index');
Route::post('/email','HomeController@email');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('updateStatus', 'MatchController@update');


Route::get('/mongodb', function()
{    
    $chat= \App\Chatmongodb::groupBy('name','avatar','email')->get();
    return($chat);
});

Route::get('getmessage/{recepient}', function($recepient)
{ 
   //$email =\Auth::user()->email;
  
   $users = \App\Chatmongodb::orderBy('created_at', 'asc')->where('email', '=','stefn2@abv.bg')->where('recipient', '=', $recepient)->get();
   return $users;
});

Route::get('getmessage', function()
{ 
   //$email =\Auth::user()->email;
  
   $users = \App\Chatmongodb::groupBy('email')->where('email', '=','stefn2@abv.bg')->orderBy('created_at', 'asc')->get(['email','name','avatar','recipient']);
   
   return $users;
});

Route::get('getauth', function()
{ 
   $user =\Auth::user();
   
   return $user;
  

});






