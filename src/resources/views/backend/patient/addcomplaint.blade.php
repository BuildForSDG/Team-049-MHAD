@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{config('app.url')}}/Admin">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Add Complaint</li>
    </ol>
    {!! Form::open(['url' => '/savecomplaint', 'method'=>'POST']) !!}
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
              <h2><i class="fa fa-file"></i>Complaint</h2>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Registration Number</label>
                      <input type="text" name="pregNo" value="{{session('pregNo')[0]}}" class="form-control" readonly>
                  </div>
              </div>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Complaint Title</label>
                      <input type="text" name="complainTitle" value="" class="form-control" required>
                  </div>
              </div>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Complaint Details</label>
                    <textarea name="complainBody" class="form-control" required></textarea>
                  </div>
              </div>
        </div>
          <!-- /row-->
      </div>
      <!-- /box_general-->
      <p><button class="btn_1 medium">Save</button></p>
      {!! Form::close() !!}
    </div>
@endsection        