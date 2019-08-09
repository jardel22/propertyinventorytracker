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
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('clerk')->group(function(){
    Route::get('/login', 'Auth\ClerkLoginController@showLoginForm')->name('clerk.login');
    Route::post('/login', 'Auth\ClerkLoginController@login')->name('clerk.login.submit');
    Route::get('/', 'ClerkController@index')->name('clerk.dashboard');
    Route::get('/logout', 'Auth\ClerkLoginController@clerkLogout')->name('clerk.logout');
});



