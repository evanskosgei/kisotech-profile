<?php

namespace App\Http\Controllers;

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
