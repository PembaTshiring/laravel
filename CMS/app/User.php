<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){
        return $this->hasOne('App\Post');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function roles(){
        //withPivot letting model know we want to pull out intermedite column data 
        return $this->belongsToMany('App\Role')->withPivot('created_at');

        //to customize table names and columns follow below format
        // return $this->belongsToMany('App\Role','user_roles','user_id','role_id');

    }
    public function photos(){
        //App\photo morphed into App\User
        return $this->morphMany('App\Photo','imageable');
    }

    //Accessor: pulls data from database and manipulates it 
    public function getNameAttribute($value){
        return strtoupper($value);
    }

    //Mutator: sets data to database after manipulating
    public function setNameAttribute($value){
        $this->attributes['name']= strtoupper($value);
    }

}
