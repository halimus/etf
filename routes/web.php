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

Auth::routes();

//Home routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@search')->name('home');


//Etf routes
Route::get('/etf', 'EtfController@index');


//Users routes
Route::get('/users', 'UsersController@index');
Route::get('/users/getdata', 'UsersController@getUsers');
Route::get('users/create', 'UsersController@create');
Route::post('users/create', 'UsersController@store');
Route::get('users/{id}', 'UsersController@show');

Route::get('users/{id}/edit/', 'UsersController@edit');
Route::post('users/{id}/edit/', 'UsersController@update');

Route::delete('users/{id}', 'UsersController@destroy');

//change_password routes
Route::get('change_password', 'ProfileController@password_form');
Route::post('change_password', 'ProfileController@update_password');


//About routes
Route::get('/about', 'AboutController@index');
