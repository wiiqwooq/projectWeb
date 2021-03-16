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
}
