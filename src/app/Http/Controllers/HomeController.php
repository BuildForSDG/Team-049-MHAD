<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    
    /**
     * Create a new controller instance.
     *
     * 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth::user()->user_type=='patient'){
            return redirect()->to('dashboard');
        }
        if(auth::user()->user_type=='specialist'){
            return redirect()->to('/profile/create');
        }
        $adminRole = Auth::user()->roles()->pluck('name');
        if($adminRole->contains('admin')){
            return redirect('admin');

        }

        return view('home');
    }
}
