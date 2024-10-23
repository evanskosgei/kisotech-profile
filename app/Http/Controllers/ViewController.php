<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about(){
        return view('about');
    }
    public function service(){
        return view('service');
    }
    public function mission(){
        return view('mission');
    }

    public function blogs(){
        $blogs = Blog::all();
        return view('blog' , compact('blogs'));
    }
    public function vision(){
        return view('vision');
    }
    public function projects(){
        return view('projects');
    }
    public function faq(){
        return view('faq');
    }
    public function contact(){
        return view('contact');
    }
}
