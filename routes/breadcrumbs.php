<?php

//For Clients

//Home
Breadcrumbs::for('home', function ($trail){
    $trail->push('Home', route('bookings.user.dashboard'));
});

//Home > [Bookings]
Breadcrumbs::for('bookings', function ($trail){
    $trail->parent('home');
    $trail->push('Bookings', route('bookings.index'));
});

//Home > [Bookings] > [Create]
Breadcrumbs::for('create', function ($trail){
    $trail->parent('bookings');
    $trail->push('Create a New Booking', route('bookings.create'));
});

//Home > [Pricelist]
Breadcrumbs::for('pricelist', function ($trail){
    $trail->parent('home');
    $trail->push('Pricelist', route('user.pricelist'));
});

//Home > [My Details]
Breadcrumbs::for('details', function ($trail){
    $trail->parent('home');
    $trail->push('My Details', route('user.details'));
});

//Home > [My Details] > [Update Password]
Breadcrumbs::for('changePassword', function ($trail){
    $trail->parent('details');
    $trail->push('Change Password', route('user.details.password'));
});

//Home > [Contact Us]
Breadcrumbs::for('contact-us', function ($trail){
    $trail->parent('home');
    $trail->push('Contact Us', route('user.contact'));
});

//Home > [Statements]
Breadcrumbs::for('statements', function ($trail){
    $trail->parent('home');
    $trail->push('Statements', route('user.statements'));
});