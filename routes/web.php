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

    // Vue protected routes.
	Route::get('/user', 'UserController@getLoggedInUser');
	Route::post('/contact/add', 'ContactController@addContact');
	Route::get('/contacts', 'ContactController@getContactListing');
	Route::get('/contact/{id}', 'ContactController@getContact');
	Route::post('/contact/delete', 'ContactController@deleteContact');
	Route::get('/notes', 'NotesController@getContactNotes');
	Route::post('/note/delete', 'NotesController@deleteNote');
	Route::post('/note/edit', 'NotesController@editNote');
	Route::post('/note/add', 'NotesController@addNewNote');
});
