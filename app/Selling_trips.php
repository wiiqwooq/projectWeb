<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selling_trips extends Model
{
    protected $table= 'selling_trips';
    protected $primaryKey= 'selling_id';
    public $timestamps = false;

    protected $fillable = [
        'c_date',
        'admin_id',
        'confirm_id',
    ];
}
