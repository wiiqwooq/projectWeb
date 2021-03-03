<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_trips extends Model
{
    protected $table= 'booking_trips';
    protected $primaryKey= 'booking_id';
    public $timestamps = false;

    protected $fillable = [
        'booking_date',
        'total',
        'total_price',
        'Payment_status',
        'user_id',
        'trips_id'
    ];
}
