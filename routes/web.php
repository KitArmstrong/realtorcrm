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

// Landing page route.
Route::get('/', function () {
    return view('layouts.login');
})->name('mainlogin');

// Authorization and login routes.
Auth::routes();

// Protected route group.
Route::middleware('auth')->group(function () {
    Route::get('/home', 'AppController@index')->name('home');

    // API protected routes.
	Route::get('/user', 'UserController@getLoggedInUser');
});
