<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nis', 'spp'];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
