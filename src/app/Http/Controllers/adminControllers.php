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
        libUtils::checkSession($request); 
        //echo session('fullName')[0];
        $data = DB::select('select * from mhad_admin where admRegNo = ?', [session('adminID')[0]]);
        return view('backend.admin.profile')->with('data', $data[0]);
    }
    
    public function profileUpdate(Request $request)
    {
        libUtils::checkSession($request);
        $this->validate($request, [
            'phoneNumber' => 'required',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required'
        ]);
        $phoneNumber = $request->phoneNumber;
        $address = $request->address;
        $state = $request->state;
        $country = $request->country;
        $zip_code = $request->zip_code;
        //SELECT `id`, `admRegNo`, `fullName`, `email`, `email_verified_at`, `password`, `role`, `address`, `state`, `country`, `zip_code`, `remember_token`, `created_at`, `updated_at` FROM `mhad_admin` WHERE 1
        $result = DB::update('update mhad_admin set `phoneNumber` = "'.$phoneNumber.'", `address` = "'.$address.'", `state` = "'.$state.'", `country` = "'.$country.'", `zip_code` = "'.$zip_code.'" where admRegNo = ?', [session('adminID')[0]]);
        
        if($result){
            return back()->with('success', 'Profile updated successfully');
        } else {
            return back()->with('error', 'Error updating your profile, pls try again');
        }
        //
    }

    public function adminSignIn(Request $request)
    {
        $this->validate($request, [
            'emailAddress' => 'required',
            'password' => 'required'
        ]);
        $email = $request->emailAddress;
        $result = DB::select('SELECT `id`, `admRegNo`, `fullName`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at` FROM `mhad_admin` WHERE `status` = "1" AND `email` = "'.$email.'"', []);
        if(count($result) > 0) {
            $hashedPassword = $result[0]->password;
            if (Hash::check($request->password, $hashedPassword)) {
                //$seRquest = new Request;
                $request->session()->flush();
                $request->session()->push('adminID', $result[0]->admRegNo);
                $request->session()->push('userType', 'Admin');
                $request->session()->push('userDesc', 'System Admin');
                $request->session()->push('fullName', $result[0]->fullName);
                $request->session()->push('emailAddress', $result[0]->email);
                $request->session()->push('role', $result[0]->role);
                //return view('backend.index')->with('data', $result[0]);
                return redirect('/Admin');
            } else {
                return back()->with('error', 'Error!!! Invalid email address or password or account suspended');
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
        $result = DB::update('update mhad_admin set `password` = "'.$password.'" where admRegNo = ?', [session('adminID')[0]]);
        
        if($result){
            return back()->with('success', 'Password changed successfully');
        } else {
            return back()->with('error', 'Error changing password, pls try again');
        }
    }

    public function addprofile(Request $request)
    {
        libUtils::checkSession($request); 
        $data = DB::select('SELECT `roleID`, `roleName` FROM `mhad_role`');
        return view('backend.admin.addprofile')->with('data', $data);
    }

    public function create(Request $request)
    {
        libUtils::checkSession($request);
        $this->validate($request, [
            'phoneNumber' => 'required',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'role' => 'required',
            'email' => 'required',
            'fullName' => 'required',
            'password' => 'required'
        ]);
        $phoneNumber = $request->phoneNumber;
        $address = $request->address;
        $state = $request->state;
        $country = $request->country;
        $zip_code = $request->zip_code;
        $role = $request->role;
        $fullName = $request->fullName;
        $email = $request->email;
        $admRegNo = $request->admRegNo;//@date('ymhis');
        $pwd = $request->password;//'123456';
        $password = $pwd = bcrypt($pwd);
        
        $result = DB::table('mhad_admin')->insert(
            ['phoneNumber' => $phoneNumber, 'admRegNo' => $admRegNo, 'fullName' => $fullName, 'email' => $email, 'password' => $password, 'role' => $role, 'address' => $address, 'state' => $state, 'country' => $country, 'zip_code' => $zip_code]
        );
        
        if($result){
            return back()->with('success', 'Profile created successfully');
        } else {
            return back()->with('error', 'Error creating profile, pls try again');
        }
        //
    }

    public function adminrecord(Request $request)
    {
        libUtils::checkSession($request);
        if($request->srch == '1') {
            if($request->fullName != '') {
                $search[] = ['fullName', 'LIKE', '%'.$request->fullName.'%'];
            }
            if($request->emailAddress != '') {
                $search[] = ['email', '=', $request->emailAddress];
            }
            if($request->phoneNumber != '') {
                $search[] = ['phoneNumber', '=', $request->phoneNumber];
            }
        } 
        $data = DB::table('mhad_admin')
        ->select('admRegNo', 'fullName', 'email', 'phoneNumber', 'email_verified_at', 'password', 'role', 'address', 'state', 'country', 'zip_code', 'remember_token', 'created_at', 'updated_at', 'status')
        ->orderByRaw('fullName ASC')
        ->paginate(10);
        
        if(count($data) > 0) {
            return view('backend.admin.record')->with('data', $data);
        } else {
            return view('backend.admin.record')->with('error', 'No record found');
        }
    }

    public function editprofile(Request $request)
    {
        libUtils::checkSession($request); 
        //echo session('fullName')[0];
        $data = DB::select('select * from mhad_admin where admRegNo = ?', [$request->ID]);
        $role = DB::select('SELECT `roleID`, `roleName` FROM `mhad_role`');
        $rec[0] = $data[0];
        $rec[1] = $role;
        //var_dump($rec);
        //exit();
        return view('backend.admin.edit')->with('data', $rec);
    }

    public function deleteprofile (Request $request)
    {
        libUtils::checkSession($request); 
        $result = DB::table('mhad_admin')->where('admRegNo', '=', $request->ID)->delete();
        if($result){
            return back()->with('success', 'Profile deleted successfully');
        } else {
            return back()->with('error', 'Error deleting profile, pls try again');
        }
    }
    public function updateprofile(Request $request)
    {
        libUtils::checkSession($request);
        $this->validate($request, [
            'phoneNumber' => 'required',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'role' => 'required',
            'email' => 'required',
            'fullName' => 'required',
        ]);
        $phoneNumber = $request->phoneNumber;
        $address = $request->address;
        $state = $request->state;
        $country = $request->country;
        $zip_code = $request->zip_code;
        $role = $request->role;
        $fullName = $request->fullName;
        $email = $request->email;
        $status = $request->status;
        
        $sql = 'update mhad_admin set `status` = "'.$status.'", `fullName` = "'.$fullName.'", `role` = "'.$role.'", `phoneNumber` = "'.$phoneNumber.'", `address` = "'.$address.'", `state` = "'.$state.'", `country` = "'.$country.'", `zip_code` = "'.$zip_code.'"';
        if($request->password != '') {
            $pwd = $request->password;//'123456';
            $password = $pwd = bcrypt($pwd);
            $sql .= ', `password` = "'.$password.'"';
        }
        $sql .= 'where admRegNo = ?';
        $result = DB::update($sql, [$request->admRegNo]);
        
        if($result){
            return back()->with('success', 'Profile updated successfully');
        } else {
            return back()->with('error', 'Error updating profile, pls try again');
        }
        //
    }
    
    public function specialistrecord(Request $request)
    {
        libUtils::checkSession($request);
        if($request->srch == '1') {
            if($request->fullName != '') {
                $search[] = ['fullName', 'LIKE', '%'.$request->fullName.'%'];
            }
            if($request->emailAddress != '') {
                $search[] = ['email', '=', $request->emailAddress];
            }
            if($request->phoneNumber != '') {
                $search[] = ['phoneNumber', '=', $request->phoneNumber];
            }
        } 
        $data = DB::table('mhad_specialists')
        ->select('docRegNo', 'fullName', 'occupation', 'specialty', 'gender', 'emailAddress', 'phoneNumber', 'address', 'state', 'country', 'zip_code', 'dateRegistered', 'age', 'status')
        ->orderByRaw('fullName ASC')
        ->paginate(10);
        
        if(count($data) > 0) {
            return view('backend.admin.specialistrecord')->with('data', $data);
        } else {
            return view('backend.admin.specialistrecord')->with('error', 'No record found');
        }
    }
    public function editmedic(Request $request)
    {
        libUtils::checkSession($request); 
        
        $data = DB::select('select * from mhad_specialists where docRegNo = ?', [$request->ID]);
        //var_dump($data[0]);
        return view('backend.admin.editmedic')->with('data', $data[0]);
    }
    
    public function updatemedic(Request $request)
    {
        libUtils::checkSession($request);
        $this->validate($request, [
            'phoneNumber' => 'required',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required'
        ]);
        $phoneNumber = $request->phoneNumber;
        $address = $request->address;
        $state = $request->state;
        $country = $request->country;
        $zip_code = $request->zip_code;
        $sql = 'update mhad_specialists set `status` = "'.$request->status.'", `phoneNumber` = "'.$phoneNumber.'", `address` = "'.$address.'", `state` = "'.$state.'", `country` = "'.$country.'", `zip_code` = "'.$zip_code.'"';
        if($request->password != '') {
            $pwd = $request->password;//'123456';
            $password = $pwd = bcrypt($pwd);
            $sql .= ', `password` = "'.$password.'"';
        }
        $sql .= 'where docRegNo = ?';
        $result = DB::update($sql, [$request->docRegNo]);
        
        if($result){
            return back()->with('success', 'Profile updated successfully');
        } else {
            return back()->with('error', 'Error updating your profile, pls try again');
        }
        //
    }
}
