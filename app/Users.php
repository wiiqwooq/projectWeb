<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table= 'users';
    protected $primaryKey= 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'address',
        'username',
        'password',
        'user_status'
    ];

    public function Booking_Trips_User()
    {
        return $this->hasMany(App\Booking_Trips::class);
    }
}
