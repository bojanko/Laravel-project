<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Contact;
use App\About;

use App\Http\Requests\ContactRequest;

use Mail;
use Session;

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
    public function contact_mail(ContactRequest $request){
      Mail::send('email.email', ['title' => $request->input('title'),
      'content' => $request->input('text')], function ($message) use ($request){
            if($request->input('email') !== null){
                $message->from($request->input('email'), 'Contact from blog');
            }
            else{
                $message->from("unknown@unknown.com", 'Contact from blog');
            }
            $message->to('hi@bojanko.com');
        });

      $data = Contact::all();
      Session::flash('flash_message','Message sent!.');
      return view("contact")->with("content", $data);
    }
}
