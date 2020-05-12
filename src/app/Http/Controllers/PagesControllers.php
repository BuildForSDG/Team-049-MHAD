<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesControllers extends Controller
{
    public function index(){
        //load app front page
        return view('frontend.index');
    }
}
