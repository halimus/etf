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
    //return view('welcome');
});

Auth::routes();


//Home routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//Etf routes
Route::get('/etf', 'EtfController@index');


//Users routes
Route::get('/users', 'UsersController@index');



//About routes
Route::get('/about', 'AboutController@index');
