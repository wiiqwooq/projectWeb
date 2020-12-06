<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table= 'admins';
    protected $primaryKey= 'admin_id';

    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'address',
        'username',
        'password',
        'admin_status'
    ];
}
