@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{config('app.url')}}/Admin">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Change Password</li>
    </ol>
    {!! Form::open(['url' => '/preset', 'method'=>'POST']) !!}
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
              <h2><i class="fa fa-file"></i>Basic info</h2>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Registration Number</label>
                      <input type="text" name="pregNo" value="{{session('adminID')[0]}}" class="form-control" readonly>
                  </div>
              </div>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Username</label>
                      <input type="email" name="emailAddress" class="form-control" value="{{session('emailAddress')[0]}}" readonly>
                  </div>
              </div>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>New Password</label>
                      <input type="password" name="new_password" class="form-control" value="" required>
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