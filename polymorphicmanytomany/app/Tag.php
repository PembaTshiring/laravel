<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //share tag between posts and videos
    protected $fillable=['name'];
}
