@extends('layouts.frontapp')
@section('content')
    <div id="form_container">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div id="left_form">
                    <figure>
                        <img src="frontend/img/info_graphic_1.png" alt="" width="140" height="100">
                    </figure>
                    <h2>MHAD - PHQ-9 <span>Patient Health Questionnaire-9</span></h2>
                    <p>Help yourself in decision-making whether to seek professional medical advice or not.</p>
                    <a href="{{route('patientSignin')}}" class="btn_1 rounded yellow">Patient Login</a>
                    <a href="#wizard_container" class="btn_1 rounded mobile_btn yellow">Start Now!</a>
                    <a href="#0" id="more_info" data-toggle="modal" data-target="#more-info"><i class="pe-7s-info"></i></a>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                        <span id="location"></span>
                    </div> 
                    <!-- /top-wizard -->
                    <!--form id="wrapped" method="post"-->
                    {!! Form::open(['url' => '/phq9', 'method'=>'POST', 'id' => 'wrapped']) !!}
                        <h3>Objectifies degree of depression severity</h3>
                        <small><b>MHAD Advice</b><br>Final diagnosis should be made with clinical interview and mental status examination including assessment of patient’s level of distress and functional impairment by medical professional.</small>
                        <hr>
                        <div id="middle-wizard">
                            <div class="step">
                                <h3 class="main_question"><i class="arrow_right"></i>Little interest or pleasure in doing things?</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="container_radio version_2">Not at all
                                                <input type="radio" name="question_1" value="0" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Several Days
                                                <input type="radio" name="question_1" value="1" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="container_radio version_2">More than Half the days
                                                <input type="radio" name="question_1" value="2" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Nearly every day
                                                <input type="radio" name="question_1" value="3" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="step">
                                <h3 class="main_question"><i class="arrow_right"></i>Feeling down, depressed, or hopeless?</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="container_radio version_2">Not at all
                                                <input type="radio" name="question_2" value="0" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Several Days
                                                <input type="radio" name="question_2" value="1" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="container_radio version_2">More than Half the days
                                                <input type="radio" name="question_2" value="2" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Nearly every day
                                                <input type="radio" name="question_2" value="3" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="step" >
                                <h3 class="main_question"><i class="arrow_right"></i>Trouble falling or staying asleep, or sleeping too much?</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="container_radio version_2">Not at all
                                                <input type="radio" name="question_3" value="0" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Several Days
                                                <input type="radio" name="question_3" value="1" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="container_radio version_2">More than Half the days
                                                <input type="radio" name="question_3" value="2" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Nearly every day
                                                <input type="radio" name="question_3" value="3" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="step" >
                                <h3 class="main_question"><i class="arrow_right"></i>Feeling tired or having little energy?</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="container_radio version_2">Not at all
                                                <input type="radio" name="question_4" value="0" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Several Days
                                                <input type="radio" name="question_4" value="1" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="container_radio version_2">More than Half the days
                                                <input type="radio" name="question_4" value="2" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Nearly every day
                                                <input type="radio" name="question_4" value="3" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="step">
                                <h3 class="main_question"><i class="arrow_right"></i>Poor appetite or overeating?</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="container_radio version_2">Not at all
                                                <input type="radio" name="question_5" value="0" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Several Days
                                                <input type="radio" name="question_5" value="1" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="container_radio version_2">More than Half the days
                                                <input type="radio" name="question_5" value="2" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Nearly every day
                                                <input type="radio" name="question_5" value="3" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="step">
                                <h3 class="main_question"><i class="arrow_right"></i>Feeling bad about yourself — or that you are a failure or have let yourself or your family down?</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="container_radio version_2">Not at all
                                                <input type="radio" name="question_6" value="0" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Several Days
                                                <input type="radio" name="question_6" value="1" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="container_radio version_2">More than Half the days
                                                <input type="radio" name="question_6" value="2" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Nearly every day
                                                <input type="radio" name="question_6" value="3" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="step">
                                <h3 class="main_question"><i class="arrow_right"></i>Trouble concentrating on things, such as reading the newspaper or watching television?</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="container_radio version_2">Not at all
                                                <input type="radio" name="question_7" value="0" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Several Days
                                                <input type="radio" name="question_7" value="1" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="container_radio version_2">More than Half the days
                                                <input type="radio" name="question_7" value="2" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Nearly every day
                                                <input type="radio" name="question_7" value="3" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <h3 class="main_question"><i class="arrow_right"></i>Moving or speaking so slowly that other people could have noticed? Or so fidgety or restless that you have been moving a lot more than usual?</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="container_radio version_2">Not at all
                                                <input type="radio" name="question_8" value="0" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Several Days
                                                <input type="radio" name="question_8" value="1" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="container_radio version_2">More than Half the days
                                                <input type="radio" name="question_8" value="2" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Nearly every day
                                                <input type="radio" name="question_8" value="3" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <h3 class="main_question"><i class="arrow_right"></i>Thoughts that you would be better off dead, or thoughts of hurting yourself in some way?</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="container_radio version_2">Not at all
                                                <input type="radio" name="question_9" value="0" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Several Days
                                                <input type="radio" name="question_9" value="1" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="container_radio version_2">More than Half the days
                                                <input type="radio" name="question_9" value="2" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio version_2">Nearly every day
                                                <input type="radio" name="question_9" value="3" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /step-->
                            <div class="step">
                                <h3 class="main_question"><i class="arrow_right"></i>Please fill with your personal data</h3>
                                <div class="form-group add_top_30">
                                    <label for="name">First and Last Name</label>
                                    <input type="text" name="name" id="name" class="form-control required" onchange="getVals(this, 'name_field');">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control required" onchange="getVals(this, 'email_field');">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control required">
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-4">
                                        <label for="age">Age</label>
                                        <div class="form-group radio_input">
                                            <input type="text" name="age" id="age" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-8">
                                        <div class="form-group radio_input">
                                            <label class="container_radio mr-3">Male
                                                <input type="radio" name="gender" value="Male" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">Female
                                                <input type="radio" name="gender" value="Female" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row-->
                            </div>
                            <!-- /step-->
                            <div class="submit step" id="end">
                                <div class="summary">
                                    <div class="wrapper">
                                        <h3>Thank your for your time<br><span id="name_field"></span>!</h3>
                                        <p>We will contat you shorly at the following email address <strong id="email_field"></strong> and if necessary take measures.</p>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group terms">
                                            <label class="container_check">Please accept our <a href="#" data-toggle="modal" data-target="#terms-txt">Terms and conditions</a> before Submit
                                                <input type="checkbox" name="terms" value="Yes" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step last-->
                        </div>
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward">Prev</button>
                            <button type="button" name="forward" class="forward">Next</button>
                            <button type="submit" name="process" class="submit">Submit</button>
                        </div>
                        <!-- /bottom-wizard -->
                    {!! Form::close() !!}
                    <!--/form -->
                </div>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->
@endsection    