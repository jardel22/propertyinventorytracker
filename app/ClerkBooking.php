<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClerkBooking extends Model
{
    protected $guard = 'clerk';

    protected $table = 'bookings';
    protected $fillable = [
        'date',
        'startTime',
        'endTime',
        'user_id',
        'property_id',
        'approved',
        'status'

    ];


    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function property() 
    {
        return $this->belongsTo(Property::class);
    }
}
