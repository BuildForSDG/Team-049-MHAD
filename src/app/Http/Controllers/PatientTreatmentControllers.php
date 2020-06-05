<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mhad_patientTreatment;
use App\mhad_patient;
use Auth;
use DB;
use Mail;
use App\utils\libUtils;

class PatientTreatmentControllers extends Controller
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
    public function create(Request $request)
    {
        libUtils::checkSession($request);
        
        // $docRegNo = session('docRegNo')[0];
        // $patient = DB::table('mhad_patients')
        // ->join('mhad_patient_diagnoses', 'mhad_patients.pregNo', '=', 'mhad_patient_diagnoses.pregNo')
        // ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patients.age', 'mhad_patients.gender', 'mhad_patients.dateRegistered_at', 'mhad_patients.treatmentStatus', 'mhad_patient_diagnoses.phqResult', 'mhad_patient_diagnoses.diagnosisLevel', 'mhad_patient_diagnoses.diagnoseSuggest')
        // ->where('mhad_patients.assignedDoctorID', '=', $docRegNo)
        // ->orderByRaw('mhad_patients.id DESC');

        $data = DB::select('select * from mhad_patients  where assignedDoctorID = ?', [session('docRegNo')[0]]);

        return view('backend.specialist.addtreatment')->with('data', $data);
    }
 

    public function storeTreatment(Request $request)
    {
        $this->validate($request, [ 
            'pregNo'=>'required',
            'targetSymptom'=>'required',
            'prescDesc' => 'required',
            'comment' => 'required',
        ]);

       
        $treatment = new mhad_patientTreatment;
        $treatment->pregNo = $request->pregNo;
        $treatment->targetSymptom = $request->targetSymptom;
        $treatment->prescDesc = $request->prescDesc;
        $treatment->comment = $request->comment;
        $treatment->status = '0';
        $treatment->save();
        return redirect()->back()->with('success', 'You have successfully added a treatment');
        
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
    $data = DB::table('mhad_patient_treatments')
    ->join('mhad_patients', 'mhad_patient_treatments.pregNo', '=', 'mhad_patients.pregNo')
    ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_treatments.*')
    ->where('mhad_patients.assignedDoctorID', '=', $docRegNo)
    ->orderByRaw('mhad_patients.id DESC')
    ->paginate(2);
       
        if($data) {
            return view('backend.specialist.treatments')->with('data', $data);
        } else {
            return view('backend.specialist.treatments')->with('error', 'No record');
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
