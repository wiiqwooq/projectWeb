<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips_Detail extends Model
{
    protected $table= 'trips_details';
    protected $primaryKey= 'detail_id';
    public $timestamps = false;

    protected $fillable = [
        'date',
        'time',
        'trips_id',
        'tourist_id',
    ];
    public function Trips()
    {
        return $this->belongsTo('App\Trips', 'trips_id', 'trips_id');
    }
    public function Tourist()
    {
        return $this->belongsTo('App\Tourist_Attraction', 'tourist_id', 'tourist_id');
    }
}
