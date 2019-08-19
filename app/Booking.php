<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
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
        'file_id',

    ];


    public function client() 
    {
        return $this->belongsTo(Client::class);
    }

    public function property() 
    {
        return $this->belongsTo(Property::class);
    }

    public function clerk()
    {
        return $this->belongsTo(Clerk::class);
    }

    public function file()
    {
        return $this->hasMany(File::class);
    }
}
