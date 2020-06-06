<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mhad_patient;
use Hash;
use Auth;
use DB;
use Mail;
use App\utils\libUtils;

class PatientController extends Controller
{       
    public function patientSignIn(Request $request)
    {
        $this->validate($request, [
            'emailAddress' => 'required',
            'password' => 'required'
        ]);
        $email = $request->emailAddress;
        $result = DB::select('SELECT `pregNo`, `fullName`, `emailAddress`, `phoneNumber`, `age`, `gender`, `username`, `password`, `dateRegistered_at`, `require_treatment`, `treatmentStatus`, `assignedDoctorID`, `created_at`, `updated_at` FROM `mhad_patients` WHERE  `emailAddress` = "'.$email.'" AND `require_treatment` = "1"', []);
        if(count($result) > 0) {
            $hashedPassword = $result[0]->password;
            if (Hash::check($request->password, $hashedPassword)) {
                //$seRquest = new Request;
                $request->session()->flush();
                $request->session()->push('pregNo', $result[0]->pregNo);
                $request->session()->push('userType', 'Patient');
                $request->session()->push('userDesc', 'MHAD Patient');
                $request->session()->push('fullName', $result[0]->fullName);
                $request->session()->push('emailAddress', $result[0]->emailAddress);
                $request->session()->push('phoneNumber', $result[0]->phoneNumber);
                $request->session()->push('age', $result[0]->age);
                $request->session()->push('gender', $result[0]->gender);
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
        return view('frontend.patientReset');
    }

    public function patientReset(Request $request)
    {
        $this->validate($request, ['emailAddress'=>'required']);
        $data = DB::select('SELECT `fullName`, `emailAddress` FROM `mhad_patients` WHERE `require_treatment` = 1 AND `emailAddress` = ?', [$request->emailAddress]);
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
            DB::update('update mhad_patients set password = "'.$pwd.'" where emailAddress = ?', [$request->emailAddress]);
            return back()->with('success', 'Your Password has been reset successfully. Pls check your mail box for the new password');
        }else{
            return back()->with('error', 'Error resetting your password, pls try again');
        }
    }

    public function profile(Request $request)
    {
        libUtils::checkSession($request); 
        //echo session('fullName')[0];
        $data = DB::select('select * from mhad_specialists where status = 1 AND docRegNo = ?', [session('docRegNo')[0]]);
        return view('backend.specialist.profile')->with('data', $data[0]);
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
        $result = DB::update('update mhad_specialists set `phoneNumber` = "'.$phoneNumber.'", `address` = "'.$address.'", `state` = "'.$state.'", `country` = "'.$country.'", `zip_code` = "'.$zip_code.'" where docRegNo = ?', [session('docRegNo')[0]]);
        
        if($result){
            return back()->with('success', 'Profile updated successfully');
        } else {
            return back()->with('error', 'Error updating your profile, pls try again');
        }
        //
    }

    public function reset(Request $request)
    {
        libUtils::checkSession($request);
        return view('backend.patient.reset');
    }

    public function resetUpdate(Request $request)
    {
        libUtils::checkSession($request);
        $this->validate($request, [
            'new_password' => 'required'
        ]);
        $password = bcrypt($request->new_password);
        $result = DB::update('update mhad_patients set `password` = "'.$password.'" where pregNo = ?', [session('pregNo')[0]]);
        
        if($result){
            return back()->with('success', 'Password changed successfully');
        } else {
            return back()->with('error', 'Error changing password, pls try again');
        }
    }
}
