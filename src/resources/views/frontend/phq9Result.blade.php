@extends('layouts.frontapp')
@section('content')
    <div id="form_container">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div id="left_form">
                    <figure>
                        <img src="frontend/img/info_graphic_1.png" alt="" width="140" height="100">
                    </figure>
                    <h2>MHAD <br><br><span>Patient PHQ-9 Test Result</span></h2>
                    <a href="{{config('app.url')}}/" class="btn_1 rounded yellow">Home</a>
                    <a href="#0" id="more_info" data-toggle="modal" data-target="#more-info"><i class="pe-7s-info"></i></a>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="wizard_container2">
                    <div class="submit step" id="end">
                        <div class="summary">
                            <div class="wrapper">
                                <div class="alert alert-success">
                                    Congratulations! You have successully completed your PHQ-9 assessment
                                </div>
                            <h3>Welcome <span>{{$data['name']}}</span>!</h3>
                                <p>After successully passthrough Mental Health Assisted Diagnosis(MHAD), below are your test result and suggestion.</p>
                            </div>
                            <div>
                                <h3 class="main_question"><i class="arrow_right"></i>Score Level :  
                                    <br><span style="color:blue; font-weight:bold; font-size:24px">{{$data['phqScore']}}</span></h3>
                                <h3 class="main_question"><i class="arrow_right"></i>Percentage Score :
                                    <br><span style="color:blue; font-weight:bold; font-size:24px">{{$data['percScore']}}%</h3>
                                <h3 class="main_question"><i class="arrow_right"></i>Diagnosis Level :
                                    <br><span style="color:blue; font-weight:bold; font-size:24px">{{$data['diagnosisLevel']}}</h3>
                                <h3 class="main_question"><i class="arrow_right"></i>Suggestions :
                                    <br><span style="color:blue; font-weight:bold; font-size:24px">{{$data['diagnoseSuggest']}}</h3>
                                @if($data['setTreatment'] == '1')
                                <div class="form-group add_top_10">
                                    <label>
                                        Based on your level of PHQ-9 test which shows that you have {{$data['diagnosisLevel']}}. <br>We have provided and connected you to a specialist which be available in the next 24hr to assist your further and probably help in your treatment.
                                        <br>
                                        Click on the button below to SignIn into account created for you with the following details:
                                        <ul>
                                        <li>UserName : <b>{{$data['email']}}</b></li>
                                        <li>Password : <b>{{$data['password']}}</b></li>
                                        </ul>
                                        <small>A copy of this confirmation has been sent to your email box for future reference.</small>
                                    </label>
                                </div>
                                @endif
                                @if($data['setTreatment'] == '1')
                                    <a href="{{config('app.url')}}/patientSignIn" class="btn_1">SignIn</a>
                                @else
                                    <a href="{{config('app.url')}}/" class="btn_1">Exit</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->
@endsection    