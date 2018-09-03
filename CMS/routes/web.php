<?php

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;
use Carbon\Carbon;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     // return view('welcome');
//     return "about";
// });

// Route::get('/contact', function () {
//     // return view('welcome');
//     return "contact";
// });

// Route::get('/post/{id}/{name}',function($id, $name){

//     return "this is post no.". $id . " " .$name;
// });

// Route::get('/admin/post/example', array('as'=>'admin.home',function(){
//     $url= route('admin.home');
//     return "this is url ".$url; 
// }));

// Route::get('/post/{id}','PostsController@index');

// Route::resource('posts','PostsController');

// Route::get('/contact','PostsController@contact');

// Route::get('/post/{id}/{name}','PostsController@show_post');


/*---------- RAW SQL QUERIES ------------ */
// Route::get('/insert',function(){

//     DB::insert('insert into posts(title,content) values(?,?)',['PHP with laravel', 'Larvel is pretty good']);
// });

// Route::get('/read',function(){

//     $results=DB::select('select * from posts where id= ?',[1]);
    
//     return $results;
//     // foreach ($results as $post)
//     // {
//     //    return $post->title;
//     // }

// });

// Route::get('/update',function(){

//     $updated=DB::update('update posts set title="updated title" where id=?',[1]);
//     return $updated;

// });

// Route::get('/delete',function(){

//     $deleted=DB::delete('delete from posts where id=?', [1]);
//     return $deleted;

// });

/*------------ ELOQUENT -----------*/

// Route::get('/read', function () {
//     $posts = Post::all();
//     foreach ($posts as $post) {
//         return $post->title;
//     }    
// });

// Route::get('/find', function () {

//     $post = Post::find(2);
//     // foreach ($posts as $post) {
//     //     return $post->title;
//     // }
//     return $post->title; 
// });

// Route::get('/findwhere', function () {
    
//     $posts =Post::where('id',3)->orderBy('id','desc')->take(1)->get();
//     return $posts;

// });


// Route::get('/findmore', function () {

//     // $posts =Post::findOrFail(1);
//     // return $posts;

//     $posts=Post::where('users_count','<',50)->firstOrFail();

    
// });

// Route::get('/basicinsert', function () {
    
//     $post =new Post;
    
//     $post->title = 'new ORM Title';
//     $post->content= 'WOW ELOQUENT IS COOL';

//     $post->save();

// });

// Route::get('/basicinsert2', function () {
    
//     $post =Post::find(2);
    
//     $post->title = 'NEW ELOQUENT No. 2';
//     $post->content= 'WOW ELOQUENT IS COOL CONTENT 2';

//     $post->save();

// });

/*--------- MASS ASSIGNMENT WITH $fillable in model--------*/

// Route::get('/create', function () {
    
//     Post::create(['title'=>'the create method', 'content'=>'WOW WOW WOW']);

// });

// Route::get('update', function () {
    
//     Post::where('id',2)->where('is_admin',0)->update(['title'=>'new title', 'content'=>'This is ew content']);  

 
// });

// Route::get('/delete', function () {
    
//     $post= Post::find(13);
    
//     $post->delete();


// });

// Route::get('/delete2', function () {
    
//     Post::destroy([4,5]);

//     Post::where('is_admin', 0)->delete();

// });

/*------------ Soft DELETE ----------------- */

// Route::get('/softdelete', function () {
    
//     Post::find(11)->delete();

// });

// Route::get('/readsoftdelete', function () {
    
//     // $post=Post::find(10);
//     // return $post; 
//     // $post=Post::withTrashed()->where('id', 10)->get();
//     // return $post;
//     $post=Post::onlyTrashed()->where('id', 10)->get();
//     return $post;
// });

// Route::get('/restore', function () {
    
//     Post::withTrashed()->where('is_admin',0)->restore();

// });

// Route::get('/forcedelete', function () {
    
//     Post::onlyTrashed()->where('is_admin',0)->forceDelete();


// });

/*------------ Eloquent Relationships---------------*/

//one to one relationship
// Route::get('/user/{id}/post', function ($id) {

//     return User::find($id)->post->title;

// });

//inverse of above
// Route::get('/post/{id}/user', function ($id) {
    
//     return Post::find($id)->user->name;

// });

//one to many
// Route::get('/posts', function () {
    
//     $user = User::find(1);

//     foreach ($user->posts as $post) {
//         echo $post->title."<br>";
//     }

// });

//------------MANY TO MANY RELATIONSHIP--------//
// Route::get('/user/{id}/role', function ($id) {
    
//     $user=User::find($id)->roles()->orderBy('id','desc')->get();
//     return $user;

    // foreach ($user->roles as $role) {
    //     return $role->name;
    // }

// });


//Accessing the intermediate table / PIVOT

// Route::get('/userpivot', function () {
    
//     $user=User::find(1);

//     foreach ($user->roles as $role) {
//         echo $role->pivot->created_at;
//     }

// });

// Route::get('/user/country', function () {
//     //posts is function in cocuntry.php
//         $country = Country::find(4);
//     foreach ($country->posts as $post) {
//         return $post->title;
//     }
// });

//Ploymorphic relation

// Route::get('user/photos', function () {
//     $user= User::find(1);
//     foreach ($user->photos as $photo) {
//         echo $photo->path."<br>";
//     }
// });

// Route::get('post/photos', function () {
//     $post= Post::find(1);
//     //photos is the method name under post.php
//     foreach ($post->photos as $photo) {
//         echo $photo->path."<br>";
//     }
// });

// Route::get('photo/{id}/post', function ($id) {
    
//     $photo = Photo::findOrFail($id);

//     return $photo->imageable;

// });

//Polymorphic Many to many relationship, share a single list of unique records

// Route::get('post/tag', function () {
    
//     $post=Post::find(1);
//     //tags is the method name under Post.php
//     foreach ($post->tags as $tag) {
//         echo $tag->name;
//     }

// });

// Route::get('/tag/post', function () {
    
//     $tag=Tag::find(2);

//     foreach ($tag->posts as $post) {
        
//         echo $post->title;

//     }

// });


/*------TINKER----------*/
//helps to play with database without havin gto create routes and stuffs
/*creating post from tinker 
$post = App\Post::create(['title'=>'PHP post from tinker','content'=>'PHP content from tinker']); 
save garna, $post->save();
to find post, $post=App\Post::find(1);
$post->title="this is how we update"; and save like above
delete garna $post->delete();
$post->forceDelete();

*/

//-------------CRUD--------------//

Route::group(['middleware' => 'web'], function () {

    Route::resource('/posts', 'PostsController');

    Route::get('/dates', function () {
        
        $date=new DateTime('+1 week');
        echo $date->format('m-d-Y');
        echo '<br>';
        echo '<br>';
        echo Carbon::now()->addDays(10)->diffForHumans();
        echo '<br>';
        echo '<br>';
        echo Carbon::now()->subMonths(5)->diffForHumans();
        echo '<br>';
        echo '<br>';
        echo Carbon::now()->yesterday()->diffForHumans();
    });


    //-------Accessor and mutators-------//
    Route::get('/getname', function () {
        
        $user=User::find(1);
        echo $user->name;

    });

    Route::get('/setname', function () {
        $user=User::find(1);
         $user->name="tshiring";
         $user->save();
    });
    
});