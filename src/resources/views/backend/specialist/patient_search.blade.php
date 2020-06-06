@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{config('app.url')}}/Admin">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Patient Quick Search</li>
    </ol>
    {!! Form::open(['url' => '/patient', 'method'=>'POST']) !!}
    <input type="hidden" name="srch" value="1">
    <div class="box_general padding_bottom">
        @if($error != '')
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endif
        <div class="header_box version_2">
              <h2><i class="fa fa-file"></i>Quick Search</h2>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="fullName" value="" class="form-control" >
                  </div>
              </div>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="emailAddress" class="form-control" value="" >
                  </div>
              </div>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Gender</label>
                      <input type="text" name="gender" class="form-control" value="">
                  </div>
              </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phoneNumber" class="form-control" value="">
                </div>
            </div>
      </div>
      <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Treatment Status</label>
                    <select name="treatmentStatus"class="form-control">
                        <option></option>
                        <option value="0">Ongoing</option>
                        <option value="1">Completed Treatment</option>
                    </select>
                </div>
            </div>
      </div>
          <!-- /row-->
      </div>
      <!-- /box_general-->
      <p><button class="btn_1 medium">Search</button></p>
      {!! Form::close() !!}
    </div>
@endsection        