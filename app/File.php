<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $primaryKey = 'fileId';

    protected $table = 'files';
    protected $fillable = [
        'name',
        'size'
    ];

    public function booking() 
    {
        return $this->belongsTo(Booking::class);
    }
}
