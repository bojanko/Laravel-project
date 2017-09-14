<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use Session;
use App\User;
use App\Post;
use App\AdminRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login_page(){
        Session::keep(['back_page']);
        return view('login.login');
    }

    public function login(LoginRequest $request){
        $user = User::where('email', '=', $request->input('email'))->get();
        Auth::login($user[0], false);
        /////
        Session::keep(['back_page']);
        return redirect(Session::get('back_page'));
    }

    public function logout(){
        Auth::logout();
        /////
        Session::keep(['back_page']);
        return redirect(Session::get('back_page'));
    }

    public function register_page(){
        Session::keep(['back_page']);
        return view('login.register');
    }

    public function register(RegisterRequest $request){
        $content = new User();
        $content->name = $request->input("username");
        $content->email = $request->input("email");
        $content->password = Hash::make($request->input("password"));
        $content->manager = 0;
        $content->save();

        Session::flash('flash_message','Succesfully registered! Please log in now.');
        Session::keep(['back_page']);
        return redirect('/login');
    }

    public function profile(){
        Session::keep(['back_page']);
        return view('login.profile')->with("user", Auth::user());
    }

    public function profile_update(ProfileRequest $request){
        $user = Auth::user();
        $user->password = Hash::make($request->input("password"));
        $user->save();

        Session::flash('password_change','Password changed succesfully!');
        Session::keep(['back_page']);
        return redirect('/profile')->with("user", Auth::user());
    }

    public function request_admin(){
        Session::keep(['back_page']);

        $user = Auth::user();

        $req = new AdminRequest();
        $req->name = $user->name;
        $req->email = $user->email;
        $req->user_id = $user->id;
        $req->save();

        Session::flash('request_message','Request received! Your role will update if admin accept your request.');
        return redirect('/profile')->with("user", Auth::user());
    }
}
