<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $fillable = [
        'bill_number', 'bill_fee', 'bill_category', 'bill_status'
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
