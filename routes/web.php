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

Route::get('/details', 'PagesController@details')->name('user.details');
Route::get('/details/update-password', 'ClientController@password')->name('user.details.password');
Route::post('/details/update-password', 'ClientController@updatePassword')->name('user.details.updatePassword');

Route::get('/pricelist', 'PagesController@pricelist')->name('user.pricelist');

Route::get('/statements', 'PagesController@statements')->name('user.statements');

Route::get('/contact', 'PagesController@contact')->name('user.contact');

Route::get('/welcome', 'PagesController@welcome');

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

Route::get('/download/{file}', function ($file='') {
    return response()->download(public_path('storage/upload/'.$file)); 
});


Route::get('/bookings/{booking}/show', 'BookingsController@show')->name('user.bookings.show');

Route::get('/bookings/{booking}/portal', 'BookingsController@showPortal')->name('user.bookings.showPortal');
Route::post('/bookings/{booking}/portal', 'BookingsController@updatePortal')->name('user.bookings.updatePortal');


Auth::routes();

Route::get('/', 'BookingsController@calendar')->name('bookings.user.dashboard');

Route::post('/logout', 'Auth\LoginController@clientLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
    Route::get('/bookings/create', 'AdminBookingsController@create')->name('admin.bookings.create');
    Route::post('/bookings/create', 'AdminBookingsController@store')->name('admin.bookings.store');
    Route::get('/bookings', 'AdminBookingsController@dashboard')->name('admin.bookings.dashboard');
    Route::get('/bookings/{booking}/edit', 'AdminBookingsController@edit')->name('admin.bookings.edit');
    Route::patch('/bookings/{booking}', 'AdminBookingsController@update')->name('admin.bookings.update');
    Route::get('/bookings/{booking}/show', 'AdminBookingsController@show')->name('admin.bookings.show');
    Route::get('/', 'AdminBookingsController@calendar')->name('admin.dashboard');
});

Route::prefix('clerk')->group(function(){
    Route::get('/login', 'Auth\ClerkLoginController@showLoginForm')->name('clerk.login');
    Route::post('/login', 'Auth\ClerkLoginController@login')->name('clerk.login.submit');
    Route::post('/logout', 'Auth\ClerkLoginController@clerkLogout')->name('clerk.logout');
    
    Route::get('/bookings/create', 'ClerkBookingsController@create')->name('clerk.bookings.create');
    Route::post('/bookings/create', 'ClerkBookingsController@store')->name('clerk.bookings.store');
    
    
    // Route::get('/bookings/upload', 'ClerkBookingsController@showUploadForm')->name('clerk.bookings.upload');
    // Route::post('/bookings/upload', 'ClerkBookingsController@storeFile')->name('clerk.bookings.store');
    
    
    Route::get('/bookings', 'ClerkBookingsController@index')->name('clerk.bookings.dashboard'); 
    
    Route::get('/bookings/{booking}/report', 'WordCreationController@showUploadForm');
    Route::post('/bookings/{booking}', 'WordCreationController@storeFile')->name('clerk.bookings.save');
    Route::get('/bookings/{booking}/report/createWord', 'WordCreationController@createWordDocx')->name('createWord');
    
    Route::get('/bookings/{booking}/edit', 'ClerkBookingsController@edit')->name('clerk.bookings.edit');
    Route::patch('/bookings/{booking}', 'ClerkBookingsController@update')->name('clerk.bookings.update');
    
    Route::get('/bookings/{booking}/show', 'ClerkBookingsController@show')->name('clerk.bookings.show');
    Route::get('/', 'ClerkBookingsController@calendar')->name('clerk.dashboard');  
    
});

Route::post('bookings/dashboard/toggle-approve', 'BookingsController@approve')->name('bookings.user.dashboard.toggle-approve');

Route::post('bookings/create', 'BookingsController@store')->name('bookings.create.submit');

Route::resource('bookings', 'BookingsController');


Route::get('/clerkregister', 'ClerkRegisterController@showRegistrationForm')->name('clerkregisterpage');
Route::post('/clerkregister', 'ClerkRegisterController@register')->name('clerkregister');
