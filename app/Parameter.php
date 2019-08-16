<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $primaryKey = 'parameterId';

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
        'property_id',
        'comments', //NEW FIELD (FOR LATER STAGE)
    ];
    
    public function property() 
    {
        return $this->belongsTo(Property::class);
    }
}
