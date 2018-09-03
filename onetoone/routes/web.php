<?php


use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    
    $user=User::findOrFail(1);
    //instantiate an object, dealing with instances no need to deal with static, associative data
    $address= new Address(['name'=>'Kapan Akashe dhara']);
    //save uses an instance when saving like this
    $user->address()->save($address);

});

Route::get('/update', function () {

    $address=Address::where('user_id',1)->first();
    //also whereUserId(1);, first will return object
    $address->name="New York new address";
    $address->save();

});

Route::get('/read', function () {
    
    $user=User::findOrFail(1);
    echo $user->address->name;

});

Route::get('delete', function () {
    
    $user=User::findOrFail(1);
    $user->address()->delete();

});