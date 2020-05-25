@extends('layouts.frontapp')
@section('content')
    <div id="form_container">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div id="left_form">
                    <figure>
                        <img src="frontend/img/info_graphic_1.png" alt="" width="140" height="100">
                    </figure>
                    <h2>MHAD <span>Specialist Register</span></h2>
                    <p>Complete the form to register on MHAD as Specialist Doctor.</p>
                    <a href="{{config('app.url')}}/" class="btn_1 rounded yellow">Home</a>
                    <a href="#0" id="more_info" data-toggle="modal" data-target="#more-info"><i class="pe-7s-info"></i></a>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="wizard_container2">
                    {!! Form::open(['url' => '/specialist', 'method'=>'POST']) !!}
                        <h3>Specialist Register</h3>
                        <div class="step">
                            <h3 class="main_question"><i class="arrow_right"></i>Please fill with your personal data</h3>
                            <div class="form-group add_top_30">
                                <label for="fullName">First and Last Name</label>
                                <input type="text" name="fullName" id="fullName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="emailAddress">Email Address</label>
                                <input type="email" name="emailAddress" id="emailAddress" class="form-control" required>
                            </div>
                            <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone</label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" name="occupation" id="occupation" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="specialty">Specialty</label>
                                <select name="specialty" class="form-control" required>
                                    <option></option>
                                    <option value="Critical Care">Critical Care</option>
                                    <option value="Family Practice">Family Practice</option>
                                    <option value="Neurology">Neurology</option>
                                    <option value="Orthopedics">Orthopedics</option>
                                    <option value="Pathology">Pathology</option>
                                    <option value="Pharmacy">Pharmacy</option>
                                    <option value="Psychiatry">Psychiatry</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-4">
                                    <label for="age">Age</label>
                                    <div class="form-group radio_input">
                                        <input type="text" name="age" id="age" class="form-control" required>
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
                            
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-4">
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Submit" class="btn_1" />
                                    </div>
                                </div>
                            </div>
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