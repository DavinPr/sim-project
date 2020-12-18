<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $fillable = ['person_name', 'person_birthdate', 'person_birthplace', 'person_gender', 'person_avatar'];
    //

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }
}
