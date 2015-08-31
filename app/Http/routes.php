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

use App\Page;
$page = Page::where('slug', '=', '')->orWhere('slug', '=', '/')->first();

// If there are no page that should be startpage, use a default one
if (!$page) {
    Route::get('/', function () {
        return view(env('INDEX_VIEW', 'welcome'));
    });
}
// If there is a page that should act as startpage, then redirect to that one
else {
    Route::get('/', function () {
        $page = Page::where('slug', '=', '')->orWhere('slug', '=', '/')->first();
        return view('pages.show')->with(['page' => $page]);
    });
}


Route::get('/home', function () {
    return view('home');
});

Route::group(['prefix' => 'api'], function(){
    Route::put('pages/{id}', 'PagesController@apiUpdate');
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

Route::get('{slug}', ['as' => 'slugRoute', 'uses' => 'PagesController@showBySlug']);

