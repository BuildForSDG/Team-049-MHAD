<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mhad_patientSchedule;
use App\mhad_patient;
use Auth;
use DB;
use Mail;
use App\utils\libUtils;
 
class PatientFollowUpControllers extends Controller
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
        
        $data = DB::select('select * from mhad_patients  where assignedDoctorID = ?', [session('docRegNo')[0]]);

        return view('backend.specialist.addschedule')->with('data', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 
            'pregNo'=>'required',
            'schDate'=>'required',
            'schVenue' => 'required',
            'schPurpose' => 'required',
            'docComment' => 'required',
        ]);

       
        $schedule = new mhad_patientSchedule;
        $schedule->pregNo = $request->pregNo;
        $schedule->docRegNo = session('docRegNo')[0];
        $schedule->schDate = $request->schDate;
        $schedule->schVenue = $request->schVenue;
        $schedule->schPurpose = $request->schPurpose;
        $schedule->docComment = $request->docComment;
        $schedule->schStatus = '0';
        $schedule->save();
        return redirect()->back()->with('success', 'You have successfully added a schedule');
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
    $data = DB::table('mhad_patient_schedules')
    ->join('mhad_patients', 'mhad_patient_schedules.pregNo', '=', 'mhad_patients.pregNo')
    ->select('mhad_patients.pregNo', 'mhad_patients.fullName', 'mhad_patients.emailAddress', 'mhad_patients.phoneNumber', 'mhad_patient_schedules.*')
    ->where('mhad_patients.assignedDoctorID', '=', $docRegNo)
    ->orderByRaw('mhad_patients.id DESC')
    ->paginate(2);
       
        if($data) {
            return view('backend.specialist.schedules')->with('data', $data);
        } else {
            return view('backend.specialist.schedules')->with('error', 'No record');
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
