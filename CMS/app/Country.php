<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts(){

        //Parameters are Two table , 2nd is intermediate table we want data from
        return $this->hasManyThrough('App\Post','App\User','country_id');
    }
}
