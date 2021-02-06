<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmations extends Model
{
    protected $table= 'confirmations';
    protected $primaryKey= 'confirm_id';

    protected $fillable = [
        'c_date',
        'admin_id',
        'tourist_status',
    ];
}
