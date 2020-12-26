<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips_Detail extends Model
{
    protected $table= 'trips_detail';
    protected $primaryKey= 'detail_id';

    protected $fillable = [
        'date',
        'time',
        'trips_id',
        'tourist_id',
    ];
    public function Trips()
    {
        return $this->belongsTo('App\Trips', 'trips_id');
    }
    public function Tourist()
    {
        return $this->hasOne('App\Tourist_Attraction', 'tourist_id', 'tourist_id');
    }
}
