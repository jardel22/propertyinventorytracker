<?php

namespace App\Providers;

use App\Clerk;
use App\Booking;
use App\Client;

use Illuminate\Support\ServiceProvider;

class DynamicClassname extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('clerkname_array', Clerk::all());
        });

        view()->composer('*',function($view){
            $view->with('bookingname_array', Booking::all());
        });

        view()->composer('*',function($view){
            $view->with('clientname_array', Client::all());
        });
    }
}
