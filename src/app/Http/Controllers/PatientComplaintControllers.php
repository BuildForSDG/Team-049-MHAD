<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mhad_patientSchedule;
use App\mhad_patient;
use Auth;
use DB;
use Mail;
use App\utils\libUtils;

class PatientComplaintControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        libUtils::checkSession($request);
        
        $docRegNo = session('docRegNo')[0];
        $data = DB::table('mhad_patient_complaints')
        ->join('mhad_patients', 'mhad_patient_complaints.pregNo', '=', 'mhad_patients.pregNo')
        ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_complaints.*')
        ->where('mhad_patients.assignedDoctorID', '=', $docRegNo)
        ->orderByRaw('mhad_patients.id DESC')
        ->paginate(10);
       
        if($data) {
            return view('backend.specialist.complaints')->with('data', $data);
        } else {
            return view('backend.specialist.complaints')->with('error', 'No record');
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

    public function search(Request $request)
    {
        libUtils::checkSession($request);
        if(session('userType')[0] == 'Specialist'){
            $data = DB::select('select * from mhad_patients  where assignedDoctorID = ?', [session('docRegNo')[0]]);
        } else {
            $data = DB::select('select * from mhad_patients ', []);
        }
        return view('backend.specialist.complaintsearch')->with('data', $data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        libUtils::checkSession($request);
                
        if($request->pregNo != '') {
            $search[] = ['mhad_patients.pregNo', '=', $request->pregNo];
        }
        if($request->complainDate != '') {
            $search[] = ['mhad_patients.assignedDoctorID', '=', $docRegNo];
        }
        if(session('userType')[0] == 'Specialist'){
            $docRegNo = session('docRegNo')[0];
            $search[] = ['mhad_patients.assignedDoctorID', '=', $docRegNo];
            $data = DB::table('mhad_patient_complaints')
            ->join('mhad_patients', 'mhad_patient_complaints.pregNo', '=', 'mhad_patients.pregNo')
            ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_complaints.*')
            ->where($search)
            ->orderByRaw('mhad_patients.id DESC')
            ->paginate(10);
        } else {
            $data = DB::table('mhad_patient_complaints')
            ->join('mhad_patients', 'mhad_patient_complaints.pregNo', '=', 'mhad_patients.pregNo')
            ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_complaints.*')
            ->orderByRaw('mhad_patients.id DESC')
            ->paginate(10);
        }
       
        if($data) {
            return view('backend.specialist.complaints')->with('data', $data);
        } else {
            return view('backend.specialist.complaints')->with('error', 'No record');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
