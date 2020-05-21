<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;
use App\User;
use App\Specialist;
use Hash;

class SpecialistRegisterController extends Controller
{


  
    protected $redirectTo = RouteServiceProvider::HOME;


    public function specialistRegister(Request $request){

        $this->validate($request,[ 
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:4|confirmed',

        ]);

        $user = User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type')
        ]);
        Specialist::create([
            'user_id' => $user->id,
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
        ]);
        
        return redirect()->back()->with('message','Please check your email to activate your account');
    }
}
