<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
      $data = array(
          ["naslov" => "nas1", "tekst" => "tekst1"],
          ["naslov" => "nas2", "tekst" => "tekst2"],
          ["naslov" => "nas3", "tekst" => "tekst3"],
          ["naslov" => "nas4", "tekst" => "tekst4"]
      );

      return view("home")->with("content", $data);
    }

    public function about(){
      return view("about")->with("content", "About page");
    }

    public function contact(){
      return view("contact")->with("content", "Contact page");
    }
}
