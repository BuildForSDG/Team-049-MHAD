<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\libUtils;
use DB;

class complaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        libUtils::checkSession($request);
        
        $pregNo = session('pregNo')[0];
        $data = DB::table('mhad_patient_complaints')
        ->join('mhad_patients', 'mhad_patient_complaints.pregNo', '=', 'mhad_patients.pregNo')
        ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_complaints.*')
        ->where('mhad_patients.pregNo', '=', $pregNo)
        ->orderByRaw('mhad_patient_complaints.id DESC')
        ->paginate(10);
       
        if($data) {
            return view('backend.patient.complaints')->with('data', $data);
        } else {
            return view('backend.patient.complaints')->with('error', 'No record');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        libUtils::checkSession($request);
        return view('backend.patient.addcomplaint');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        libUtils::checkSession($request);
        $this->validate($request, [
            'complainTitle' => 'required',
            'complainBody' => 'required'
        ]);
        $result = DB::table('mhad_patient_complaints')->insert([
            ['pregNo' => session('pregNo')[0], 'complainTitle' => $request->complainTitle, 'complainBody' => $request->complainBody]
        ]);

        if($result){
            return back()->with('success', 'Complaint saved successfully');
        } else {
            return back()->with('error', 'Error savings complaint, pls try again');
        }
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
