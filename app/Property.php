<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    protected $fillable = [
        'addressLine1',
        'city',
        'postcode'
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function parameter()
    {
        return $this->hasMany(Parameter::class);
    }
}
