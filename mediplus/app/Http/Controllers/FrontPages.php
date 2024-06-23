<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPages extends Controller
{
    //
    public function home(){
        $title = "Mediplus Website";
        return view('home', compact('title'));
    }
    public function contact(){
        $title = "Mediplus contact";
        return view('contact',compact('title'));
    }
    public function doctors(){
        $title = "Mediplus doctors";
        return view('doctors',compact('title'));
    }
    public function services(){
        $title = "Mediplus services";
        return view('services',compact('title'));
    }
    public function pages(){
        $title = "Mediplus pages";
        return view('pages',compact('title'));
    }
    public function blog(){
        $title = "Mediplus blog";
        return view('blog',compact('title'));
    }
    public function error(){
        $title = "Mediplus error";
        return view('error',compact('title'));
    }
}
