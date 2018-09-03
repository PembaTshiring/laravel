<?php

use App\User;
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    
    $user=User::findOrFail(1);
    $post=new Post(['title'=>'Hello there post 1', 'body'=>'i love laravel']);  
    //user.php has method posts
    $user->posts()->save($post);  

});

Route::get('/read', function () {
    
    $user=User::findOrFail(1);
    foreach ($user->posts as $post) {
        echo $post->title."<br>";
    }

});

Route::get('/delete', function () {
    
    $user =User::find(1);
    $user->posts()->whereId(1)->delete();

});