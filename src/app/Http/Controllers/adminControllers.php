<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
use Mail;
use App\utils\libUtils;

class adminControllers extends Controller
{
    public function profile(Request $request)
    {
        echo "Patient".session('fullName')[0];
    }
    public function adminSignIn(Request $request)
    {
        $this->validate($request, [
            'emailAddress' => 'required',
            'password' => 'required'
        ]);
        $email = $request->emailAddress;
        $result = DB::select('SELECT `id`, `fullName`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at` FROM `mhad_admin` WHERE `email` = "'.$email.'"', []);
        if(count($result) > 0) {
            $hashedPassword = $result[0]->password;
            if (Hash::check($request->password, $hashedPassword)) {
                //$seRquest = new Request;
                $request->session()->flush();
                $request->session()->push('adminID', $result[0]->id);
                $request->session()->push('userType', 'Admin');
                $request->session()->push('userDesc', 'System Admin');
                $request->session()->push('fullName', $result[0]->fullName);
                $request->session()->push('emailAddress', $result[0]->email);
                $request->session()->push('role', $result[0]->role);
                //return view('backend.index')->with('data', $result[0]);
                return redirect('/Admin');
            } else {
                return back()->with('error', 'Error!!! Invalid email address or password');
            }
        } else {
            return back()->with('error', 'Error!!! Invalid email address or password');
        }
    }

    public function ResetRequest()
    {
        return view('frontend.adminReset');
    }

    public function adminReset(Request $request)
    {
        $this->validate($request, ['emailAddress'=>'required']);
        $data = DB::select('SELECT `fullName`, `email` FROM `mhad_admin` WHERE `email` = ?', [$request->emailAddress]);
        if($data[0]->emailAddress != ''){
            $email = $data[0]->emailAddress;
            $fullName = $data[0]->fullName;
            $newPwd = @date('yhmis');
            $pwd = bcrypt($newPwd);
            $dataT = array('pwd'=>$newPwd, 'name' => $data[0]->fullName, 'email'=>$email);
            try{
                Mail::send('html.SPreset', $dataT, function ($message) use ($dataT) {
                    $message->from('inf@buildforsdg.com', 'MHAD');
                    $message->sender('inf@buildforsdg.com', 'MHAD');
                    $message->to($dataT['email'], $dataT['name']);
                    $message->cc('inf@buildforsdg.com', 'MHAD');
                    $message->bcc('inf@buildforsdg.com', 'MHAD');
                    $message->replyTo('inf@buildforsdg.com', 'MHAD');
                    $message->subject('Password Reset');
                    $message->priority(3);
                });
            } catch (\Exception $e) {
                //return false;
            }
            //echo $newPwd;
            DB::update('update mhad_admin set password = "'.$pwd.'" where email = ?', [$request->emailAddress]);
            return back()->with('success', 'Your Password has been reset successfully. Pls check your mail box for the new password');
        }else{
            return back()->with('error', 'Error resetting your password, pls try again');
        }
    }
    public function reset(Request $request)
    {
        libUtils::checkSession($request);
        return view('backend.admin.reset');
    }

    public function resetUpdate(Request $request)
    {
        libUtils::checkSession($request);
        $this->validate($request, [
            'new_password' => 'required'
        ]);
        $password = bcrypt($request->new_password);
        $result = DB::update('update mhad_admin set `password` = "'.$password.'" where id = ?', [session('adminID')[0]]);
        
        if($result){
            return back()->with('success', 'Password changed successfully');
        } else {
            return back()->with('error', 'Error changing password, pls try again');
        }
    }
}
