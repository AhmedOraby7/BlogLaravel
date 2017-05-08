<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at' , 'desc')->limit(10)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){

        return view('pages.about');
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(Request $request){
        $this->validate($request , array(
            'email' => 'required|email',
            'message'=>'required|min:10',
            'subject' => 'min:3'
        ));
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );
        //In This Function you can Access the variable $data in
        //('contacts) by their keys as {{ $bodyMessage }} {{ $email }} {{ $subject }}
        Mail::send('emails.contact' , $data , function($message) use ($data){
            $message->from($data['email']);
            $message->subject($data['subject']);
            $message->to('ahmedoraby041@gmail.com');
        });

        Session::flash('success' , 'Your Email Successfully Sent');
        return redirect('/');
    }
}
