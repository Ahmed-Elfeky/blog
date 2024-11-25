<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    

public function index(){
    return view('website.index');
}
public function category(){
    return view('website.category');
}
public function contact(){
    return view('website.contact');
}
public function blog(){
    return view('website.blog');
}
public function register(){
    return view('website.register');
}
// public function Login(){
//     return view('website.login');
// }







}
