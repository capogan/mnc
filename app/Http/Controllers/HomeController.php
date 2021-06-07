<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function pendanaan()
    {
        return view('pendanaan');
    }

    public function send_email(){

        Mail::send([], [], function ($message) {
            $message->to('ogan_mi@yahoo.com')->subject('test email')->setBody('<h1>Hi, welcome user!</h1>', 'text/html'); // for HTML rich messages
        });
    }
}
