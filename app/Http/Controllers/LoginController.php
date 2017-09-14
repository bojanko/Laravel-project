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

class LoginController extends Controller
{
    private function return_home(){
      $data = Post::paginate(5);

      return Redirect::to('/')->with("content", $data);
    }

    public function login_page(){
        return view('login.login');
    }

    public function login(LoginRequest $request){
        $user = User::where('email', '=', $request->input('email'))->get();

        if($user[0]->password == $request->input('password')){
            Auth::login($user[0], false);
            return $this->return_home();
        }
        else{
            Session::flash('password_error','Incorrect password!');
            return Redirect::to('/login')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return $this->return_home();
    }

    public function register_page(){
        return view('login.register');
    }

    public function register(RegisterRequest $request){
        $content = new User();
        $content->name = $request->input("username");
        $content->email = $request->input("email");
        $content->password = $request->input("password");
        $content->manager = 0;
        $content->save();

        Session::flash('flash_message','Succesfully registered! Please log in now.');
        return Redirect::to('/login');
    }

    public function profile(){
        return view('login.profile')->with("user", Auth::user());
    }

    public function profile_update(ProfileRequest $request){
        $user = Auth::user();
        $user->password = $request->input("password");
        $user->save();

        Session::flash('password_change','Password changed succesfully!');
        return view('login.profile')->with("user", Auth::user());
    }
}
