<?php

//////////////////////////////////////////////__FOR CLIENTS__\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

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

//////////////////////////////////////////////__FOR ADMIN__\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

//Home
Breadcrumbs::for('adminHome', function ($trail){
    $trail->push('Home', route('admin.dashboard'));
});

//Home > [Bookings]
Breadcrumbs::for('adminBookings', function ($trail){
    $trail->parent('adminHome');
    $trail->push('Bookings', route('admin.bookings.dashboard'));
});

//Home > [Bookings] > [Create]
Breadcrumbs::for('adminCreate', function ($trail){
    $trail->parent('adminBookings');
    $trail->push('Create a New Booking', route('admin.bookings.create'));
});

//Home > [Pricelist]
Breadcrumbs::for('adminPricelist', function ($trail){
    $trail->parent('adminHome');
    $trail->push('Pricelist', route('admin.pricelist'));
});

//Home > [My Details]
Breadcrumbs::for('adminDetails', function ($trail){
    $trail->parent('adminHome');
    $trail->push('My Details', route('admin.details'));
});

//Home > [My Details] > [Update Password]
Breadcrumbs::for('adminChangePassword', function ($trail){
    $trail->parent('adminDetails');
    $trail->push('Change Password', route('admin.details.password'));
});

//Home > [Contact Us]
Breadcrumbs::for('adminContact-us', function ($trail){
    $trail->parent('adminHome');
    $trail->push('Contact Us', route('admin.contact'));
});

//Home > [Statements]
Breadcrumbs::for('adminStatements', function ($trail){
    $trail->parent('adminHome');
    $trail->push('Statements', route('admin.statements'));
});

//////////////////////////////////////////////__FOR CLERK__\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

//Home
Breadcrumbs::for('clerkHome', function ($trail){
    $trail->push('Home', route('clerk.dashboard'));
});

//Home > [Bookings]
Breadcrumbs::for('clerkBookings', function ($trail){
    $trail->parent('clerkHome');
    $trail->push('Bookings', route('clerk.bookings.dashboard'));
});

//Home > [Bookings] > [Create]
Breadcrumbs::for('clerkCreate', function ($trail){
    $trail->parent('clerkBookings');
    $trail->push('Create a New Booking', route('clerk.bookings.create'));
});

//Home > [Pricelist]
Breadcrumbs::for('clerkPricelist', function ($trail){
    $trail->parent('clerkHome');
    $trail->push('Pricelist', route('clerk.pricelist'));
});

//Home > [My Details]
Breadcrumbs::for('clerkDetails', function ($trail){
    $trail->parent('clerkHome');
    $trail->push('My Details', route('clerk.details'));
});

//Home > [My Details] > [Update Password]
Breadcrumbs::for('clerkChangePassword', function ($trail){
    $trail->parent('clerkDetails');
    $trail->push('Change Password', route('clerk.details.password'));
});

//Home > [Contact Us]
Breadcrumbs::for('clerkContact-us', function ($trail){
    $trail->parent('clerkHome');
    $trail->push('Contact Us', route('clerk.contact'));
});

//Home > [Statements]
Breadcrumbs::for('clerkStatements', function ($trail){
    $trail->parent('clerkHome');
    $trail->push('Statements', route('clerk.statements'));
});