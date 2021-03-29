<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    protected $table= 'trips';
    protected $primaryKey= 'trips_id';
    public $timestamps = false;

    protected $fillable = [
        'trips_name',
        'province_id',
        'start_date',
        'end_date',
        'amount',
        'price',
        'trips_status'
    ];
    public function Detail()
    {
        return $this->hasMany(App\Trips_Detail::class);
    }
    public function Booking_Trips()
    {
        return $this->hasMany(App\Booking_Trips::class);
    }
    public function Province_Trips()
    {
        return $this->belongsTo(App\Province::class);
    }
}
