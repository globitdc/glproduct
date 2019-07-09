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

//route for home page
Route::get('/', 'HomeController@index')->name('index');

//route for ajax requests
Route::post('/add-to-card', 'ajaxRequestsController@addToCard')->name('add-to-card');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// route for transporting
Route::get('/transporting', 'TransportingsController@transporting')->name('transporting');

 // Getting data from inputs, that user filled in order to set a direction
Route::post('/store', 'TransportingsController@store');











