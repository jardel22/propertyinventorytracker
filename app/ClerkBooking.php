<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClerkBooking extends Model
{
    protected $primaryKey = 'bookingId';
    protected $guard = 'web';

    protected $table = 'bookings';
    protected $fillable = [
        'startTime',
        'endTime',
        'client_id',
        'property_id',
        'clerk_id', //NEW FIELD
        'approved',
        'agent',
        'jobType', //ADD TO CREATE FUNCTION
        'status',
        'file_id',//NEW FIELD

    ];


    public function client() 
    {
        return $this->belongsTo('App\Client', 'client_id', 'clientId');
    }

    public function property() 
    {
        return $this->belongsTo('App\Property', 'property_id', 'propertyId');
    }

    public function clerk()
    {
        return $this->belongsTo('App\Clerk', 'clerk_id', 'clerkId');
    }
}
