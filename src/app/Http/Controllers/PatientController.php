<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PatientController extends Controller
{   
    public function profile(Request $request)
    {
        echo "Patient".session('fullName')[0];
    }
}
