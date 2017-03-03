<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    public $fillable = ['user_id','item_id'];

}