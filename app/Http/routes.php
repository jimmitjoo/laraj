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
    return view(env('INDEX_VIEW', 'welcome'));
});
Route::get('/home', function(){
    return view('home');
});


Route::resource('/install', 'CMSController');
Route::resource('/pages', 'PagesController');


// Authentication routes...
Route::get('auth/login', ['as' => 'getLogin', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Helpers for users used to Drupal and WordPress
Route::get('/user', 'CMSController@goToLogin');
Route::get('/admin', 'CMSController@goToLogin');
Route::get('/login', 'CMSController@goToLogin');
Route::get('/wp-{all}', 'CMSController@goToLogin');

