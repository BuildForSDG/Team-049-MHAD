<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mhad_specialist;
use Hash;
use Auth;
use DB;
use Mail;
use App\utils\libUtils;

class SpecialistController extends Controller
{   
    public function specialistRegister(Request $request)
    {
        $this->validate($request, [ 
            'fullName'=>'required',
            'emailAddress'=>'required|string|email|max:255|unique:mhad_specialists',
            'password'=>'required',
            'phoneNumber' => 'required',
            'occupation' => 'required',
            'specialty' => 'required',
            'age' => 'required',
            'gender' => 'required'
        ]);

        $doc = new mhad_specialist;
        $doc->docRegNo = @date('ymhis');
        $doc->fullName = $request->fullName;
        $doc->emailAddress = $request->emailAddress;
        $doc->password = bcrypt($request->password);
        $doc->occupation = $request->occupation;
        $doc->specialty = $request->specialty;
        $doc->gender = $request->gender;
        $doc->phoneNumber = $request->phoneNumber;
        $doc->age = $request->age;
        $doc->activationStatus = '0';
        $doc->status = '0';
        $doc->save();
        return redirect()->back()->with('success', 'Congratulations! Your registration was successful and your account will be activated within 24hrs.<br> Kindly check your mail for confirmation. Thanks');
        
    }

    public function specialistSign(Request $request)
    {
        $this->validate($request, [
            'emailAddress' => 'required',
            'password' => 'required'
        ]);
        $email = $request->emailAddress;
        $result = DB::select('SELECT `password`, `docRegNo`, `fullName`, `emailAddress`, `occupation`, `specialty`, `gender`, `phoneNumber` FROM `mhad_specialists` WHERE `emailAddress` = "'.$email.'" AND `status` = "1"', []);
        if(count($result) > 0) {
            $hashedPassword = $result[0]->password;
            if (Hash::check($request->password, $hashedPassword)) {
                //$seRquest = new Request;
                $request->session()->flush();
                $request->session()->push('docRegNo', $result[0]->docRegNo);
                $request->session()->push('userType', 'Specialist');
                $request->session()->push('userDesc', 'Medical Specialist');
                $request->session()->push('fullName', $result[0]->fullName);
                $request->session()->push('emailAddress', $result[0]->emailAddress);
                $request->session()->push('phoneNumber', $result[0]->phoneNumber);
                $request->session()->push('specialty', $result[0]->specialty);
                $request->session()->push('occupation', $result[0]->occupation);
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
        return view('frontend.doctorReset');
    }

    public function specialistReset(Request $request)
    {
        $this->validate($request, ['emailAddress'=>'required']);
        $data = DB::select('select emailAddress, fullName from mhad_specialists where status = 1 AND emailAddress = ?', [$request->emailAddress]);
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
            DB::update('update mhad_specialists set password = "'.$pwd.'" where emailAddress = ?', [$request->emailAddress]);
            return back()->with('success', 'Your Password has been reset successfully. Pls check your mail box for the new password');
        }else{
            return back()->with('error', 'Error resetting your password, pls try again');
        }
    }

    public function changePassword(Request $request) 
    {
        if(!(Hash::check($request->get('current_password'), Auth::user()->password))) 
        {
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
        return view('backend.specialist.reset');
    }

    public function resetUpdate(Request $request)
    {
        libUtils::checkSession($request);
        $this->validate($request, [
            'new_password' => 'required'
        ]);
        $password = bcrypt($request->new_password);
        $result = DB::update('update mhad_specialists set `password` = "'.$password.'" where docRegNo = ?', [session('docRegNo')[0]]);
        
        if($result){
            return back()->with('success', 'Password changed successfully');
        } else {
            return back()->with('error', 'Error changing password, pls try again');
        }
    }
}
