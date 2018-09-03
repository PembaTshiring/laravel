<?php

use App\Post;
use App\Video;
use App\Tag;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    
    $post=Post::create(['name'=>'my first post']);
    $tag1=Tag::find(1);
    $post->tags()->save($tag1);

    $video=Video::create(['name'=>'Video.mov']);
    $tag2=Tag::find(2);
    $video->tags()->save($tag2);

});

Route::get('/read', function () {
    
    $post=Post::findOrFail(1);
    foreach ($post->tags as $tag) {
        echo $tag;
    }

});

Route::get('/update', function () {
    
    $post=Post::findOrFail(1);
    foreach ($post->tags as $tag) {
        return $tag->whereName('PHP')->update(["name"=>"updated PHP"]);
    }

    $post=Post::findOrFail(1);
    $tag=Tag::find(3);
    $post->tags()->save($tag);
    $post->tags()->attach($tag);
    $post->tags()->sync([1,2]);


});

Route::get('/delete', function () {
    
    $post=Post::find(1);
    foreach ($post->tags as $tag) {
        $tag->whereId(2)->delete();
    }

});