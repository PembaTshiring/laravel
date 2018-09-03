<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //MassAssignment problem fix , listen i need you to allow 'name'  field
    protected $fillable=[
        'name'
    ];
}
