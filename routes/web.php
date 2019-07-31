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


Route::get('/', 'PagesController@index');

Route::get('/details', 'PagesController@details');

Route::get('/pricelist', 'PagesController@pricelist');

Route::get('/statements', 'PagesController@statements');

Route::get('/contact', 'PagesController@contact');

Route::resource ('bookings', 'BookingsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/clerk', 'AdminController@index');

