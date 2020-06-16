<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comments;
use App\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct(){

    }
    public function Index(){
      $posts=Post::orderBy('created_at', 'desc')->paginate(3);

        return view('welcome',compact('posts'));
    }
    public function Singlepost($id){
        $post=Post::find($id);
        return view('Singlepost',compact('post'));
    }
    public function About(){
        return view('About');
    }
    public function Contact(){
        return view('Contact');
    }
    public function ContactPost(){

    }



}
