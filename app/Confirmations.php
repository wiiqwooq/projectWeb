<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmations extends Model
{
    protected $table= 'confirmations';
    protected $primaryKey= 'confirm_id';
    public $timestamps = false;

    protected $fillable = [
        'account_number',
        'reciept',
        'date',
        'booking_id'
    ];
}
