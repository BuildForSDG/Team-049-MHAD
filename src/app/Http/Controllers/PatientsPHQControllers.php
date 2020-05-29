<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\mhad_patient;
use App\mhad_patientDiagnosis;
use App\utils\libUtils;

class PatientsPHQControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //load app front page
        libUtils::checklogin($request);
        return view('frontend.index');
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
        $this->validate($request, [
            'name'=>'required',
            'phone'=>'required|min:11',
            'email'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'terms'=>'required'

        ]);
        $phqScore = $request->question_1 + 
                    $request->question_2 + 
                    $request->question_3 + 
                    $request->question_4 + 
                    $request->question_5 + 
                    $request->question_6 + 
                    $request->question_7 + 
                    $request->question_8 + 
                    $request->question_9;
        if($phqScore > 5) {
            $diagnosisLevel = $phqScore;
            $dateDaignosed = '';
        } else {
            $diagnosisLevel = $phqScore;
            $dateDaignosed = '';
        }
        //save patient record before moving to phq result
        $defaultPassword = '12345678';
        $pregNo = @date('ymhis');
        $patient = new mhad_patient;
        $patient->pregNo = $pregNo;
        $patient->fullName = $request->name;
        $patient->emailAddress = $request->email;
        $patient->phoneNumber = $request->phone;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->username = $request->email;
        $patient->password = bcrypt($defaultPassword);
        $patient->treatmentStatus = '0';
        
        if($phqScore > 5) {
            $patient->require_treatment = '1';
            $setTreatment = 1;
        } else {
            $setTreatment = 0;
        }
        if($phqScore <= 14) {
            //suggest minimal depression which may not require treatment
            $diagnosisLevel = 'Minimal Depression';
            $diagnoseSuggest = 'Require no treatment';
        }
        if(($phqScore >= 5) && ($phqScore <= 9)) { 
            //suggest mild depression which may require only watchful waiting and repeated PHQ-9 at followup
            $diagnosisLevel = 'Mild Depression';
            $diagnoseSuggest = 'Require only watchful waiting and repeated PHQ-9 at followup';
        }
        if(($phqScore >= 10) && ($phqScore <= 14)) { 
            $diagnosisLevel = 'Moderate Depression Severity';
            $diagnoseSuggest = 'Patients should have a treatment plan ranging from counseling, followup, and/or pharmacotherapy.';
        }
        if(($phqScore >= 15) && ($phqScore <= 19)) { 
            $diagnosisLevel = 'Moderately Severe Depression';
            $diagnoseSuggest = 'Patients typically should have immediate initiation of pharmacotherapy and/or psychotherapy';
        }

        if(($phqScore >= 20)) { 
            $diagnosisLevel = 'Severe Depression';
            $diagnoseSuggest = 'Patients typically should have immediate initiation of pharmacotherapy and expedited referral to mental health specialist.';
        }

        $result = $patient->save();
        if($result > 0 && $phqScore > 5) {
            $diag = new mhad_patientDiagnosis;
            $diag->pregNo = $pregNo;
            $diag->phqResult = $phqScore;
            $diag->diagnosisLevel = $diagnosisLevel;
            $diag->diagnoseSuggest = $diagnoseSuggest;
            $diag->save();
        }
        $allScore = 27;
        $percScore = round(($phqScore/27) * 100);
        $to = $request->email;
        $subjt = 'Mental Health Assisted Diagnosis (MHAD) Result';
        $mssg = "
            <p>Hello ".$request->name."</p>
            <p>Thank you for using MHAD tools, below are your PHQ-9 result and suggestion:</p>
            <p>
                Score Level : <b>".$phqScore."</b><br>
                Percentage Score : <b>".$percScore."</b><br>
                Diagnosis Level : <b>".$diagnosisLevel."</b><br>
                Suggestions : <b>".$diagnoseSuggest."</b>
            </p>
            <p>
            <label>
                Based on your level of PHQ-9 test which shows that you have ".$diagnosisLevel.". 
                <br>We have provided and connected you to a specialist which will be available in the next 24hrs to assist your further and probably help in your treatment.
                <br>
                Click on the button below to SignIn into account created for you with the following details:
                <ul>
                <li>UserName : <b>".$request->email."</b></li>
                <li>Password : <b>".$defaultPassword."</b></li>
                </ul>
                <small>A copy of this confirmation has been sent to your email box for future reference.</small>
            </label>
            </p>";
        libUtils::sendEmail($to, $mssg, $subjt);
        
        $data = array('password' => $defaultPassword, 'email' => $request->email, 'phqScore'=>$phqScore, 'percScore' => $percScore,'name' => $request->name, 'diagnosisLevel' => $diagnosisLevel, 'diagnoseSuggest' => $diagnoseSuggest, 'setTreatment' => $setTreatment);
        return view('frontend.phq9Result')->with('data', $data);
        //return redirect()->back()->with('message', 'Profile Sucessfully Updated!');
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
