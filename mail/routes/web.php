<?php

use Illuminate\Support\Facades\Mail;

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

    // return view('welcome');
    $data=[
        'title'=>'Hello there',
        'content'=>'Hi there hello to you too.'
    ];

    Mail::send('emails.test', $data, function ($message) {
        $message->to('pemba.tshiring@gmail.com', 'John Doe')->subject('This is subject');
    });


});
