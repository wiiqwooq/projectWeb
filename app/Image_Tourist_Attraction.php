<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Tourist_Attraction extends Model
{
    protected $table= 'image_tourist_attractions';
    protected $primaryKey= 'image_id';

    protected $fillable = [
        'image_name',
        'tourist_id',
    ];
    public function attraction()
    {
        return $this->belongsTo('App\Tourist_Attraction', 'tourist_id');
    }
}

