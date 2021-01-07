<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }
}
