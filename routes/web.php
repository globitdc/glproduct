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
Route::post('/get_basket_count', 'BasketController@get_basket_count');
Route::post('/show_basket_count', 'ajaxRequestsController@show_basket_count');
Route::post('/get-basket-items','ajaxRequestsController@get_basket_items');
Route::post('/baskets-product-count-plus','ajaxRequestsController@baskets_product_count_plus');
Route::post('/delete-into-basket','ajaxRequestsController@delete_into_basket');
Route::post('/all_price_basket','ajaxRequestsController@all_price_basket');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

