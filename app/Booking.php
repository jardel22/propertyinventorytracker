<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guard = 'web';

    protected $table = 'bookings';
    protected $fillable = [
        'startTime',
        'endTime',
        'user_id',
        'property_id',
        'approved',
        'agent',
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
