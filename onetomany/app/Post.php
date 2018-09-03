<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //mass assignment, its ok to receive request to create data
    protected $fillable =[
        'title',
        'body'
    ];

}
