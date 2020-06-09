<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\libUtils;
use App\mhad_patient;
use DB;

class PatientManagementControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        libUtils::checkSession($request);
        
        if($request->srch == '1') {
            if($request->fullName != '') {
                $search[] = ['mhad_patients.fullName', 'LIKE', '%'.$request->fullName.'%'];
            }
            if($request->emailAddress != '') {
                $search[] = ['mhad_patients.emailAddress', '=', $request->emailAddress];
            }
            if($request->gender != '') {
                $search[] = ['mhad_patients.gender', '=', $request->gender];
            }
            if($request->phoneNumber != '') {
                $search[] = ['mhad_patients.phoneNumber', '=', $request->phoneNumber];
            }
            if($request->treatmentStatus != '') {
                $search[] = ['mhad_patients.treatmentStatus', '=', $request->treatmentStatus];
            }
        } 
        if(session('userType')[0] == 'Specialist'){
            $docRegNo = session('docRegNo')[0];
            $search[] = ['mhad_patients.assignedDoctorID', '=', $docRegNo];        
            $data = DB::table('mhad_patients')
            ->join('mhad_patient_diagnoses', 'mhad_patients.pregNo', '=', 'mhad_patient_diagnoses.pregNo')
            ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patients.age', 'mhad_patients.gender', 'mhad_patients.dateRegistered_at', 'mhad_patients.treatmentStatus', 'mhad_patient_diagnoses.phqResult', 'mhad_patient_diagnoses.diagnosisLevel', 'mhad_patient_diagnoses.diagnoseSuggest')
            ->where($search)
            ->orderByRaw('mhad_patients.id DESC')
            ->paginate(10);
        } else {
            $data = DB::table('mhad_patients')
            ->join('mhad_patient_diagnoses', 'mhad_patients.pregNo', '=', 'mhad_patient_diagnoses.pregNo')
            ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patients.age', 'mhad_patients.gender', 'mhad_patients.dateRegistered_at', 'mhad_patients.treatmentStatus', 'mhad_patient_diagnoses.phqResult', 'mhad_patient_diagnoses.diagnosisLevel', 'mhad_patient_diagnoses.diagnoseSuggest')
            ->orderByRaw('mhad_patients.id DESC')
            ->paginate(10);
        }
        
        if(count($data) > 0) {
            return view('backend.specialist.record')->with('data', $data);
        } else {
            return view('backend.specialist.patient_search')->with('error', 'No record found');
        }
    }

    public function search(Request $request)
    {
        libUtils::checkSession($request);
        return view('backend.specialist.patient_search')->with('error', '');
    }

    public function phq9Results(Request $request)
    {
        libUtils::checkSession($request);
        if(session('userType')[0] == 'Specialist'){
            $docRegNo = session('docRegNo')[0];
            $data = DB::table('mhad_patients')
            ->join('mhad_patient_diagnoses', 'mhad_patients.pregNo', '=', 'mhad_patient_diagnoses.pregNo')
            ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patients.age', 'mhad_patients.gender', 'mhad_patients.dateRegistered_at', 'mhad_patients.treatmentStatus', 'mhad_patient_diagnoses.phqResult', 'mhad_patient_diagnoses.diagnosisLevel', 'mhad_patient_diagnoses.diagnoseSuggest','mhad_patient_diagnoses.dateDaignosed')
            ->where('mhad_patients.assignedDoctorID', '=', $docRegNo)
            ->orderByRaw('mhad_patients.id DESC')
            ->paginate(10);
        } else {
            $data = DB::table('mhad_patients')
            ->join('mhad_patient_diagnoses', 'mhad_patients.pregNo', '=', 'mhad_patient_diagnoses.pregNo')
            ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patients.age', 'mhad_patients.gender', 'mhad_patients.dateRegistered_at', 'mhad_patients.treatmentStatus', 'mhad_patient_diagnoses.phqResult', 'mhad_patient_diagnoses.diagnosisLevel', 'mhad_patient_diagnoses.diagnoseSuggest','mhad_patient_diagnoses.dateDaignosed')
            ->orderByRaw('mhad_patients.id DESC')
            ->paginate(10);
        }
        
        
        if(count($data) > 0) {
            return view('backend.specialist.phq9')->with('data', $data);
        } else {
            return view('backend.specialist.phq9')->with('error', 'No record found');
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editpatient(Request $request)
    {
        libUtils::checkSession($request); 
        $data = DB::select('select * from mhad_patients where pregNo = ?', [$request->ID]);
        $md = DB::select('select * from mhad_specialists ', []);
        $data[0]->{'medic'} = $md;
        return view('backend.admin.patientprofile')->with('data', $data[0]);
    }
    
    public function patientupdate(Request $request)
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
        $sql = 'update mhad_patients set `treatmentStatus` = "'.$request->treatmentStatus.'", `phoneNumber` = "'.$phoneNumber.'", `address` = "'.$address.'", `state` = "'.$state.'", `country` = "'.$country.'", `zip_code` = "'.$zip_code.'"';
        if($request->password != '') {
            $pwd = $request->password;//'123456';
            $password = $pwd = bcrypt($pwd);
            $sql .= ', `password` = "'.$password.'"';
        }
        if($request->assignedDoctorID != ''){
            $sql .= ', `assignedDoctorID` = "'.$request->assignedDoctorID.'"';
        }
        $sql .= ' where pregNo = ?';
        //echo $sql;
        //exit();
        $result = DB::update($sql, [$request->pregNo]);
        
        if($result){
            return back()->with('success', 'Profile updated successfully');
        } else {
            return back()->with('error', 'Error updating your profile, pls try again');
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
