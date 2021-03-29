<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourist_Attraction extends Model
{
    public $timestamps = false;
    protected $table= 'tourist_attractions';
    protected $primaryKey= 'tourist_id';

    protected $fillable = [
        'tourist_name',
        'province_id',
        'tourist_status',
    ];
    public function Trips_Detail()
    {
        return $this->hasMany(App\Trips_Detail::class);
    }
    public function Imageatts()
    {
        return $this->hasMany(App\Image_Tourist_Attraction::class);
    }
    public function Province_Tourist()
    {
        return $this->belongsTo(App\Province::class);
    }
}
