@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{config('app.url')}}/Admin">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Add Treatment Feedback</li>
    </ol>
    {!! Form::open(['url' => '/feedback', 'method'=>'POST']) !!}
    <div class="box_general padding_bottom">
        <input type="hidden" name="id" value="{{$data[0]->id}}">
        <div class="header_box version_2">
              <h2><i class="fa fa-file"></i>Feedback</h2>
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
                      <label>Treatment</label>
                      <h4>{{$data[0]->targetSymptom }} / {{$data[0]->prescDesc}}</h4>
                  </div>
              </div>
        </div>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Patient Feedback</label>
                  <textarea name="patientFeedback" class="form-control">{{$data[0]->patientFeedback}}</textarea>
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