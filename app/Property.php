<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $primaryKey = 'propertyId';
    protected $table = 'properties';
    protected $fillable = [
        'addressLine1',
        'city',
        'county',//NEW FIELD
        'postcode',
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
