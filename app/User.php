<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public $fillable = ['name','surname', 'email', 'password'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}