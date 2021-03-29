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

    public function Selling_Confirm()
    {
        return $this->belongsTo(App\Confirmations::class);
    }
    public function Admin_Confirm()
    {
        return $this->belongsTo(App\Admins::class);
    }
}
