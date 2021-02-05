<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\Admins as Model;
//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Admins extends Authenticatable
{
    use Notifiable;

    //protected $guarded = 'admin_id';
    protected $table= 'admins';

    protected $primaryKey= 'admin_id';

    protected $hidden =[
        'password',
    ];

    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'address',
        'username',
        'password',
        'admin_status'
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
