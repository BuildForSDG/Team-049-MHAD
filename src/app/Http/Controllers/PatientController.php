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
    public function index(Request $request)
    {
        libUtils::checkSession($request);
        
        $pregNo = session('pregNo')[0];
        $data = DB::table('mhad_patient_treatments')
        ->join('mhad_patients', 'mhad_patient_treatments.pregNo', '=', 'mhad_patients.pregNo')
        ->select('mhad_patients.id', 'mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_treatments.*')
        ->where('mhad_patients.pregNo', '=', $pregNo)
        ->orderByRaw('mhad_patients.id DESC')
        ->paginate(10);
       
        if(count($data) > 0) {
            return view('backend.patient.treatments')->with('data', $data);
        } else {
            return view('backend.patient.treatments')->with('error', 'No record');
        }
    }
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
        $data = DB::select('select * from mhad_patients where pregNo = ?', [session('pregNo')[0]]);
        return view('backend.patient.profile')->with('data', $data[0]);
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
        $result = DB::update('update mhad_patients set `phoneNumber` = "'.$phoneNumber.'", `address` = "'.$address.'", `state` = "'.$state.'", `country` = "'.$country.'", `zip_code` = "'.$zip_code.'" where pregNo = ?', [session('pregNo')[0]]);
        
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
    public function phq9Results(Request $request)
    {
        libUtils::checkSession($request);
        $pregNo = session('pregNo')[0];
        //var_dump($request->input());
        $search[] = ['mhad_patients.pregNo', '=', $pregNo];
        
        $data = DB::table('mhad_patients')
        ->join('mhad_patient_diagnoses', 'mhad_patients.pregNo', '=', 'mhad_patient_diagnoses.pregNo')
        ->join('mhad_specialists', 'mhad_patients.assignedDoctorID', '=', 'mhad_specialists.docRegNo')
        ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patients.age', 'mhad_patients.gender', 'mhad_patients.dateRegistered_at', 'mhad_patients.treatmentStatus', 'mhad_patient_diagnoses.phqResult', 'mhad_patient_diagnoses.diagnosisLevel', 'mhad_patient_diagnoses.diagnoseSuggest','mhad_specialists.fullName AS SPfullName','mhad_specialists.emailAddress AS SPemailAddress','mhad_specialists.phoneNumber AS SPphoneNumber','mhad_specialists.occupation AS SPoccupation','mhad_specialists.specialty AS SPspecialty')
        ->where($search)
        ->orderByRaw('mhad_patients.id DESC')
        ->paginate(10);
        
        if(count($data) > 0) {
            return view('backend.patient.record')->with('data', $data);
        } else {
            return view('backend.patient.record')->with('data', $data);
        }
    }

    public function mytreatment(Request $request)
    {
        libUtils::checkSession($request);
        
        $pregNo = session('pregNo')[0];
        $data = DB::table('mhad_patient_treatments')
        ->join('mhad_patients', 'mhad_patient_treatments.pregNo', '=', 'mhad_patients.pregNo')
        ->select('mhad_patients.id', 'mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_treatments.*')
        ->where('mhad_patients.pregNo', '=', $pregNo)
        ->orderByRaw('mhad_patients.id DESC')
        ->paginate(10);
       
        if(count($data) > 0) {
            return view('backend.patient.treatments')->with('data', $data);
        } else {
            return back()->with('error', 'No record found');
            //$data = array();
            //return view('backend.patient.treatments')->with('data', $data);
        }
    }

    public function myschedule(Request $request)
    {
        libUtils::checkSession($request);
        
        $pregNo = session('pregNo')[0];
        if($request->pregNo != '') {
            $search[] = ['mhad_patients.pregNo', '=', $request->pregNo];
        }
        if($request->schDate != '') {
            $search[] = ['mhad_patient_schedules.schDate', '=', $request->schDate];
        }
        $search[] = ['mhad_patients.pregNo', '=', $pregNo];
        $data = DB::table('mhad_patient_schedules')
        ->join('mhad_patients', 'mhad_patient_schedules.pregNo', '=', 'mhad_patients.pregNo')
        ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_schedules.*')
        ->where($search)
        ->orderByRaw('mhad_patients.id DESC')
        ->paginate(10);
       
        if(count($data) > 0) {
            return view('backend.patient.schedules')->with('data', $data);
        } else {
            return view('backend.patient.schedules')->with('data', $data);
        }
    }
    public function search(Request $request)
    {
        libUtils::checkSession($request);        
        return view('backend.patient.searchschedule');
    }

    public function show($id)
    {
        //libUtils::checkSession($request);
        $data = DB::table('mhad_patient_treatments')
        ->select('id', 'pregNo', 'targetSymptom', 'prescDesc', 'dateTreated', 'comment', 'patientFeedback', 'updated_at', 'created_at', 'status')
        ->where('id', '=', $id)
        ->get();
        if($data[0]) {
            return view('backend.patient.addfeedback')->with('data', $data);
        } else {
            return back()->with('error', 'No record found');
        }
    }

    public function store(Request $request)
    {
        libUtils::checkSession($request);
        $result = DB::update('update mhad_patient_treatments set patientFeedback = "'.$request->patientFeedback.'" where id = ?', [$request->id]);
        if($result) {
            return back()->with('success', 'Treatment Feedback updated successfully');
        } else {
            return back()->with('error', 'Error updating Treatment Feedback');
        }
    }
}
