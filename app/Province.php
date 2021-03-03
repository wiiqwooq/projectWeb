<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table= 'provinces';
    protected $primaryKey= 'province_id';
    public $timestamps = false;
    
    protected $fillable = [
        'province_name',
    ];
}
