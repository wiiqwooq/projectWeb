<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    protected $table= 'trips';
    protected $primaryKey= 'trips_id';

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
        return $this->hasMany('App\Trips_Detail', 'trips_id', 'trips_id');
    }
}
