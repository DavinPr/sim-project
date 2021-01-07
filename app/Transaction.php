<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = ['transaction_invoice', 'transaction_fee', 'transaction_proof', 'transaction_status'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
