<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Contact;
use App\About;
use App\Comment;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\CommentRequest;

use Illuminate\Support\Facades\Auth;

use Mail;
use Session;

class PageController extends Controller
{
    public function home(){
      $data = Post::paginate(5);

      Session::flash('back_page', '/');
      return view("home")->with("content", $data);
    }

    public function showpost($id){
      $data = Post::findOrFail($id);

      Session::flash('back_page', '/post/'.$id);
      return view("showpost")->with("content", $data)->with("comments",
      $data->comments->where("odobren", 1));
    }

    public function comment_post($id, CommentRequest $request){
      $content = new Comment();
      $content->post_id = $id;
      $content->ime = $request->input("title");
      $content->sadrzaj = $request->input("text");
      if(Auth::user()->manager === 1){
          $content->odobren = 1;
      }
      else{
          Session::flash('flash_message','Comment sent! It will be visible after moderation.');
          $content->odobren = 0;
      }
      $content->save();

      $data = Post::findOrFail($id);

      Session::flash('back_page', '/post/'.$id);
      return redirect('/post/'.$id);
    }

    public function about(){
      $data = About::all();

      Session::flash('back_page', '/about');
      return view("about")->with("content", $data[0]);
    }

    public function contact(){
      $data = Contact::all();

      Session::flash('back_page', '/contact');
      return view("contact")->with("content", $data[0]);
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
      Session::flash('flash_message','Message sent!');

      Session::flash('back_page', '/contact');
      return redirect('/contact');
    }
}
