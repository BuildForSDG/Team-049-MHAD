<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\libUtils;
use DB;
use Mail;

class backendControllers extends Controller
{    
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('success', 'You have logout successfully');
    }
    
    public function dashboad(Request $request)
    {
        libUtils::checkSession($request);
        $data = array();
        switch(session('userType')[0]){
            case 'Specialist':
                //total patient
                $tt_patient = DB::table('mhad_patients')->where('assignedDoctorID', session('docRegNo')[0])->count();
                //total phq test
                $tt_phq = DB::table('mhad_patients')->where('assignedDoctorID', session('docRegNo')[0])->where('treatmentStatus', '1')->count();
                //total specialist
                $tt_medic = DB::table('mhad_patient_schedules')->where('docRegNo', session('docRegNo')[0])->count();
                //total complaint
                $tt_compl = DB::select('SELECT COUNT(m.id) AS cnt FROM mhad_patient_complaints c, mhad_patients m WHERE c.pregNo = m.pregNo AND m.assignedDoctorID = '.session('docRegNo')[0], []);
                //monthly statistic
                $monthly = array();
                for($m = 1; $m<=12; $m++) {
                    $monthly[$m] = DB::select('select COUNT(*) AS cnt from mhad_patients where assignedDoctorID = '.session('docRegNo')[0].' AND YEAR(dateRegistered_at) = '.@date('Y').' AND MONTH(dateRegistered_at) = ?', [$m]);
                }
                $data = array(0 => $tt_patient, 1 => $tt_phq, 2 => $tt_medic, 3 => $tt_compl, 4 => $monthly);
                break;
            case 'Patient':
                //total patient
                $tt_patient = DB::table('mhad_patient_diagnoses')->where('pregNo', session('pregNo')[0])->count();
                //total phq test
                $tt_phq = DB::table('mhad_patient_treatments')->where('pregNo', session('pregNo')[0])->count();
                //total specialist
                $tt_medic = DB::table('mhad_patient_schedules')->where('pregNo', session('pregNo')[0])->count();
                //total complaint
                $tt_compl = DB::select('SELECT COUNT(m.id) AS cnt FROM mhad_patient_complaints c, mhad_patients m WHERE c.pregNo = m.pregNo AND m.pregNo = '.session('pregNo')[0], []);
                //monthly statistic
                $monthly = array();
                for($m = 1; $m<=12; $m++) {
                    $monthly[$m] = DB::select('select COUNT(*) AS cnt from mhad_patient_schedules where pregNo = '.session('pregNo')[0].' AND YEAR(created_at) = '.@date('Y').' AND MONTH(created_at) = ?', [$m]);
                }
                $data = array(0 => $tt_patient, 1 => $tt_phq, 2 => $tt_medic, 3 => $tt_compl, 4 => $monthly);
                break;
            case 'Admin':
                //total patient
                $tt_patient = DB::table('mhad_patients')->count();
                //total phq test
                $tt_phq = DB::table('mhad_patient_diagnoses')->count();
                //total specialist
                $tt_medic = DB::table('mhad_specialists')->count();
                //total complaint
                $tt_compl = DB::table('mhad_patient_complaints')->count();
                //monthly statistic
                $monthly = array();
                for($m = 1; $m<=12; $m++) {
                    $monthly[$m] = DB::select('select COUNT(*) AS cnt from mhad_patients where YEAR(dateRegistered_at) = '.@date('Y').' AND MONTH(dateRegistered_at) = ?', [$m]);
                }
                $data = array(0 => $tt_patient, 1 => $tt_phq, 2 => $tt_medic, 3 => $tt_compl, 4 => $monthly);
                break;        
        }
        return view('backend.index')->with('data', $data);
    }

}
