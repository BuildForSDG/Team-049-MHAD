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
        //
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
    public function show(Request $request)
    {
        libUtils::checkSession($request);
        
        $docRegNo = session('docRegNo')[0];
    $data = DB::table('mhad_patient_complaints')
    ->join('mhad_patients', 'mhad_patient_complaints.pregNo', '=', 'mhad_patients.pregNo')
    ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_complaints.*')
    ->where('mhad_patients.assignedDoctorID', '=', $docRegNo)
    ->orderByRaw('mhad_patients.id DESC')
    ->paginate(2);
       
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
