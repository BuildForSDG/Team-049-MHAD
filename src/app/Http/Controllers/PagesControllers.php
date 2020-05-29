<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\libUtils;

class PagesControllers extends Controller
{
    public function index(Request $request)
    {
        //load app front page
        libUtils::checklogin($request);
        return view('frontend.index');
    }
    public function adminSignIn(Request $request)
    {
        //load app front page
        libUtils::checklogin($request);
        return view('frontend.adminSignIn');
    }
    public function doctorRegister(Request $request)
    {
        //load app front page
        libUtils::checklogin($request);
        return view('frontend.doctorRegister');
    }
    public function doctorSignIn(Request $request)
    {
        //load app front page
        libUtils::checklogin($request);
        return view('frontend.doctorSignIn');
    }
    public function patientSignIn(Request $request)
    {
        //load app front page
        libUtils::checklogin($request);
        return view('frontend.patientSignIn');
    }
}
