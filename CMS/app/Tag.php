<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Ayee the post.php wants you, this is gonna be shared by many models 
    //second parameter is singular name of table i.e 'taggable'
    public function posts(){
        return $this->morphedByMany('App\Post','taggable'); 
    }
    public function video(){
        return $this->morphedByMany('App\Video','taggable');
    }
}
