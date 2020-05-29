@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{config('app.url')}}/Admin">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">My Profile</li>
    </ol>
    {!! Form::open(['url' => '/profile', 'method'=>'POST']) !!}
      <div class="box_general padding_bottom">
          <div class="header_box version_2">
              <h2><i class="fa fa-file"></i>Basic info</h2>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Registration Number</label>
                      <input type="text" name="docRegNo" value="{{$data->docRegNo}}" class="form-control" readonly>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Name (Full Name)</label>
                      <input type="text" name="fullName" class="form-control" value="{{$data->fullName}}" readonly>
                  </div>
              </div>
          </div>
          <!-- /row-->
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" name="phoneNumber" value="{{$data->phoneNumber}}" class="form-control" required>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="emailAddress" value="{{$data->emailAddress}}" class="form-control" readonly>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Age</label>
                    <input type="text" name="age" value="{{$data->age}}" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="gender" value="{{$data->gender}}" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Occupation</label>
                    <input type="text" name="occupation" value="{{$data->occupation}}" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Specialty</label>
                    <input type="text" name="specialty" value="{{$data->specialty}}" class="form-control" readonly>
                </div>
            </div>
        </div>
          <!-- /row-->
      </div>
      <!-- /box_general-->
      <div class="box_general padding_bottom">
          <div class="header_box version_2">
              <h2><i class="fa fa-map-marker"></i>Address</h2>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="{{$data->address}}" class="form-control" required>
                    </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>State</label>
                      <input type="text" class="form-control" name="state" value="{{$data->state}}" required>
                  </div>
              </div>
          </div>
          <!-- /row-->
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Country</label>
                      <input type="text" class="form-control" name="country" value="{{$data->country}}" required>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Zip code</label>
                      <input type="text" class="form-control" name="zip_code" value="{{$data->zip_code}}" required>
                  </div>
              </div>
          </div>
          <!-- /row-->
      </div>
      <!-- /box_general-->
      <p><button class="btn_1 medium">Update</button></p>
      {!! Form::close() !!}
    </div>
@endsection        