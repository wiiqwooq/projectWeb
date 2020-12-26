<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourist_Attraction extends Model
{
    protected $table= 'tourist_attractions';
    protected $primaryKey= 'tourist_id';

    protected $fillable = [
        'tourist_name',
        'position',
        'tourist_status',
    ];
    public function Imageatts()
    {
        return $this->hasMany('App\Image_Tourist_Attraction', 'tourist_id', 'tourist_id');
    }
}
