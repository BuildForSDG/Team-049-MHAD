<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesControllers extends Controller
{
    public function index(){
        //load app front page
        return view('frontend.index');
    }
    public function adminSignIn(){
        //load app front page
        return view('frontend.adminSignIn');
    }
    public function doctorRegister(){
        //load app front page
        return view('frontend.doctorRegister');
    }
    public function doctorSignIn(){
        //load app front page
        return view('frontend.doctorSignIn');
    }
    public function patientSignIn(){
        //load app front page
        return view('frontend.patientSignIn');
    }
}
