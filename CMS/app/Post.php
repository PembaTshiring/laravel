<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public $directory="images/";

    use softDeletes;
    //protected $table='posts';
    // protected $primaryKey='post_id'; 
    
    protected $dates=['deleted_at'];



    protected $fillable=[ 
        'title',
        'content',
        'path'
    ];

    public function user(){
        return $this->belongsTo('\App\User');   
    }
    
    public function photos(){
        // App\Photo morphed into App\Post 
        return $this->morphMany('App\Photo','imageable');
    }

    //this tags method is used in web.php
    public function tags(){
        
        //this means add this to many models
        return $this->morphToMany('App\Tag','taggable');

    }

    //Query scope definition
    public static function scopeLatest($query){

        return $query->orderBy('id','asc')->get(); 

    }
    //get column name, setting an accessor
    public function getPathAttribute($value){
        return $this->directory.$value;
    }
}
