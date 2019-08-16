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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/details', 'PagesController@details');

Route::get('/pricelist', 'PagesController@pricelist');

Route::get('/statements', 'PagesController@statements');

Route::get('/contact', 'PagesController@contact');

Route::get('/welcome', 'PagesController@welcome');


Auth::routes();

Route::get('/', 'BookingsController@calendar')->name('bookings.user.dashboard');

Route::get('/home', 'BookingsController@calendar')->name('bookings.user.dashboard');

Route::post('/logout', 'Auth\LoginController@clientLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('clerk')->group(function(){
    Route::get('/login', 'Auth\ClerkLoginController@showLoginForm')->name('clerk.login');
    Route::post('/login', 'Auth\ClerkLoginController@login')->name('clerk.login.submit');
    Route::post('/logout', 'Auth\ClerkLoginController@clerkLogout')->name('clerk.logout');
    Route::get('/bookings/create', 'ClerkBookingsController@create')->name('clerk.bookings.create');
    Route::post('/bookings/create', 'ClerkBookingsController@store')->name('clerk.bookings.store');
    Route::get('/bookings', 'ClerkBookingsController@index')->name('clerk.bookings.dashboard');    
    Route::get('/bookings/{booking}/edit', 'ClerkBookingsController@edit')->name('clerk.bookings.edit');
    Route::patch('/bookings/{booking}', 'ClerkBookingsController@update')->name('clerk.bookings.update');
    Route::get('/bookings/{booking}/show', 'ClerkBookingsController@show')->name('clerk.bookings.show');
    Route::get('/', 'ClerkBookingsController@calendar')->name('clerk.dashboard');  

});

Route::get('bookings/calendar', 'BookingsController@calendar')->name('bookings.user.calendar');

Route::post('bookings/dashboard/toggle-approve', 'BookingsController@approve')->name('bookings.user.dashboard.toggle-approve');

Route::post('bookings/create', 'BookingsController@store')->name('bookings.create.submit');

Route::resource('bookings', 'BookingsController');

Route::get('/createWord', ['as'=>'createWord','uses'=>'WordTestController@createWordDocx']);

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');


