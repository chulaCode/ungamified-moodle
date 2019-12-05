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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/post','PostController@store');
Route::get('/profile/create','PostController@create');
Route::post('/profile','PostController@store');
Route::get('/enrol','EnrollController@index')->name('enrol.show');
Route::post('/answer','AnswerController@index');
Route::get('/question/{user}','ProfileController@show')->name('profile.show');
Route::post('/profile/{user}','HomeController@store')->name('home.store');
Route::post('/answer/{user}','ProfileController@show');
Route::get('/home/{user}', 'HomeController@index')->name('home.show');
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

