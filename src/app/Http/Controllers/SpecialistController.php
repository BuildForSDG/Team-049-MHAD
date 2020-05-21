<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialist;
use Hash;
use Auth;

class SpecialistController extends Controller
{   
    public function __construct(){
        $this->middleware(['specialist']);
    }

        public function index(Specialist $specialist){
            return view('specialists.index',compact('specialist')); 
        }

    public function create(){
        return view('specialists.create');
    }

    public function store(){

        $user_id = auth()->user()->id;
        Specialist::where('user_id',$user_id)->update([
            'gender'=> request('gender'),
            'occupation'=> request('occupation'),
            'specialty'=> request('specialty'),
            'country'=> request('country'),
            'phone'=> request('phone')
        ]);
        return redirect()->back()->with('message','Profile Successfully Updated!');
    }
    

    public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=>'mimes:png,jpeg,jpg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar/',$filename);
            Specialist::where('user_id',$user_id)->update([
                'avatar'=>$filename,
            ]);
        return redirect()->back()->with('message','Profile picture Successfully Updated!');

        }
    }

    public function patients(){
        return view('specialists.mypatients'); 
    }

    public function changePasswordForm(){
        return view('specialists.changepassword');
    }

    public function changePassword(Request $request) {
        if(!(Hash::check($request->get('current_password'),Auth::user()->password))) {
            return back()->with('error', 'Your current password does not match with what you provided');
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('error', 'Your current password cannot be the same as the new password');   
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:4|confirmed',
        ]);


        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return back()->with('message', 'Your password has been changed successfully');
    }
}
