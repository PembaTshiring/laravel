<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=[
        'path'
    ];

    //setting main relationship
    public function imageable(){
       
        return $this->morphTo();
    
    }
}
