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

Route::get('/welcome', 'PagesController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/home', 'HomeController@index')->name('user.dashboard');

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
    Route::get('/bookings/create', 'ClerkBookingController@create')->name('clerk.create.booking');
    Route::post('/bookings/create', 'ClerkController@store')->name('clerk.create.booking.submit');
    Route::get('/bookings/dashboard', 'ClerkBookingsController@dashboard')->name('clerk.bookings.dashboard');    
    Route::post('/bookings/dashboard', 'ClerkBookingsController@approve')->name('clerk.bookings.dashboard.approve');
    Route::get('/', 'ClerkController@index')->name('clerk.dashboard');

});


Route::get('bookings/dashboard', 'BookingsController@dashboard')->name('bookings.user.dashboard');

Route::get('bookings/calendar', 'BookingsController@calendar')->name('bookings.user.calendar');

Route::post('bookings/dashboard/toggle-approve', 'BookingsController@approve')->name('bookings.user.dashboard.toggle-approve');

Route::get('bookings/create', 'BookingsController@create')->name('booking.user.create');

Route::post('bookings/create', 'BookingsController@store')->name('bookings.create.submit');

Route::resource('bookings', 'BookingsController');

Route::get('/createWord', ['as'=>'createWord','uses'=>'WordTestController@createWordDocx']);

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');


