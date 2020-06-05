@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{config('app.url')}}/Admin">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Add Schedules</li>
    </ol>
    {!! Form::open(['url' => '/newschedule', 'method'=>'POST']) !!}
    <div class="step">
        <h3 class="main_question"><i class="arrow_right"></i>Add Patient Schedule</h3>
        <div class="form-group add_top_30">
            <label for="pregNo">Patient Registration Number</label>
            <select name="pregNo" class="form-control" required>
                @foreach ($data as $patients)
                <option></option>
                <option value="{{$patients->pregNo}}">{{$patients->fullName}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label for="schDate">Schedule Date</label>
                <input type="date" name="schDate" id="schDate" class="form-control" required>
            </div>
        <div class="form-group">
            <label for="schVenue">Schedule Venue</label>
            <input type="text" name="schVenue" id="schVenue" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="schPurpose">Schedule Purpose</label>
            <input type="text" name="schPurpose" id="schPurpose" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="docComment">Doctor's Comment</label>
            <input type="text" name="docComment" id="docComment" class="form-control" required>
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
    </div>
@endsection        