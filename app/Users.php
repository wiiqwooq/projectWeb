<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table= 'users';
    protected $primaryKey= 'user_id';

    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'addreess',
        'username',
        'password',
        'user_status'
    ];
}
