@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>
{{-- use action('controllername@method') for routing problem --}}
{{-- <form method="post" action="{{ action('PostsController@update',$post->id) }}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" placeholder="Enter Title" value="{{$post->title}}">
    <input type="submit" name="submit" value="UPDATE">
</form>

<form method="POST" action="{{ action('PostsController@destroy',$post->id) }}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="DELETE ">
</form> --}}

{!! Form::model($post,['method'=>'PATCH','action'=>['PostsController@update',$post->id]]) !!}
    {{csrf_field()}}
    {!! Form::label('title','Title:')!!}
    {!! Form::text('title',null,['class'=>'form-control'])!!}    
    
    {!!Form::submit('Update Post',['class'=>'btn btn-info']) !!}

{!!Form::close()!!}

{!! Form::open(['method'=>'DELETE','action'=>['PostsController@destroy',$post->id]]) !!}
{!!Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}
{!!Form::close()!!}

@endsection
