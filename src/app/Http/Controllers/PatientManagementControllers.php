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
        
        $docRegNo = session('docRegNo')[0];
        $data = DB::table('mhad_patients')
        ->join('mhad_patient_diagnoses', 'mhad_patients.pregNo', '=', 'mhad_patient_diagnoses.pregNo')
        ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patients.age', 'mhad_patients.gender', 'mhad_patients.dateRegistered_at', 'mhad_patients.treatmentStatus', 'mhad_patient_diagnoses.phqResult', 'mhad_patient_diagnoses.diagnosisLevel', 'mhad_patient_diagnoses.diagnoseSuggest')
        ->where('mhad_patients.assignedDoctorID', '=', $docRegNo)
        ->orderByRaw('mhad_patients.id DESC')
        ->paginate(2);
        
        if($data) {
            return view('backend.specialist.record')->with('data', $data);
        } else {
            return view('backend.specialist.record')->with('error', 'No record');
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
