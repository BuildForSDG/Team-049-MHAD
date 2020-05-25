<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mhad_specialist;

class SpecialistRegisterController extends Controller
{
    public function specialistRegister(Request $request)
    {
        $this->validate($request, [ 
            'fullName'=>'required',
            'emailAddress'=>'required|string|email|max:255|unique:mhad_specialists',
            'password'=>'required',
            'phoneNumber' => 'required',
            'occupation' => 'required',
            'specialty' => 'required',
            'age' => 'required',
            'gender' => 'required'
        ]);

        $doc = new mhad_specialist;
        $doc->docRegNo = @date('ymhis');
        $doc->fullName = $request->fullName;
        $doc->emailAddress = $request->emailAddress;
        $doc->password = bcrypt($request->password);
        $doc->occupation = $request->occupation;
        $doc->specialty = $request->specialty;
        $doc->gender = $request->gender;
        $doc->phoneNumber = $request->phoneNumber;
        $doc->age = $request->age;
        $doc->activationStatus = '0';
        $doc->status = '0';
        $doc->save();
        return redirect()->back()->with('success', 'Congratulations! Your registration was successful and your account will be activated within 24hrs.<br> Kindly check your mail for confirmation. Thanks');
        
    }
}
