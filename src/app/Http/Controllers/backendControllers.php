<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\libUtils;

class backendControllers extends Controller
{    
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('success', 'You have logout successfully');
    }
    
    public function dashboad(Request $request)
    {
        libUtils::checkSession($request);
        return view('backend.index');
    }

}
