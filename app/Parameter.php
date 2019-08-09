<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parameters';
    protected $fillable = [
        'bedrooms',
        'garage',
        'furnished',
        'gasMeterLocation',
        'electricityMeterLocation',
        'waterMeterLocation',
        'purchaseOrderNumber',
        'specialInstructions',
        'property_id'
    ];
    
    public function property() 
    {
        return $this->belongsTo(Property::class);
    }
}
