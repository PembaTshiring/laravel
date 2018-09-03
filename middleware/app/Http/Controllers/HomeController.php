<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Create/setting session
        // $request->session()->put(['edwin'=>'laravel instructor']);
        
        //read/getting session value
        // echo $request->session()->get('edwin');
        
        //creating using global function
        // session(['edwin2'=>'teacher']);
        // return session('edwin2');

        //deleting session
        // $request->session()->forget('edwin2');
        // $request->session()->flush();
        // return $request->session()->all();

        //flashing data
        // $request->session()->flash('message', 'post has been created');
        // return $request->session()->get('message');

        $request->session()->reflash();
        $request->session()->keep(['message']);

        //return view('home');
    }
}
