<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Contact;
use App\About;

class PageController extends Controller
{
    public function home(){
      $data = Post::paginate(5);

      return view("home")->with("content", $data);
    }

    public function about(){
      $data = About::all();

      return view("about")->with("content", $data);
    }

    public function contact(){
      $data = Contact::all();

      return view("contact")->with("content", $data);
    }
}
