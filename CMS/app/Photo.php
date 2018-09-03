<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function imageable(){
        //morphto function to combine it into other class
        return $this->morphTo();
    }
}
