<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use Session;
use App\User;
use App\Post;
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

        if(Hash::check($request->input('password'), $user[0]->password)){
            Auth::login($user[0], false);
            /////
            Session::keep(['back_page']);
            return redirect(Session::get('back_page'));
        }
        else{
            Session::flash('password_error','Incorrect password!');
            Session::keep(['back_page']);
            return Redirect::to('/login')->withInput();
        }
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
        return Redirect::to('/login');
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
        return view('login.profile')->with("user", Auth::user());
    }
}
