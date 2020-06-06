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
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                  <h2><i class="fa fa-file"></i>Add Treatment Details</h2>
            </div>
            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="pregNo">Patient Registration Number</label>
                        <select name="pregNo" class="form-control" required>
                            <option></option>
                            @foreach ($data as $patients)
                            <option value="{{$patients->pregNo}}">{{$patients->fullName}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                            <label for="schDate">Schedule Date</label>
                            <input type="date" name="schDate" id="schDate" class="form-control" required>
                      </div>
                  </div>
            </div>
            
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="schVenue">Schedule Venue</label>
                                <input type="text" name="schVenue" id="schVenue" class="form-control" required>
                        </div>
                    </div>
              </div>

            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                            <label for="schPurpose">Schedule Purpose</label>
                            <textarea name="schPurpose" id="schPurpose"  class="form-control"></textarea>
                      </div>
                  </div>
            </div>
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="docComment">Doctor's Comment</label>
                                <textarea name="docComment" id="docComment" class="form-control" required></textarea>
                        </div>
                    </div>
              </div>
              <!-- /row-->
          </div>
          <!-- /box_general-->
          <p><input type="submit" name="submit" value="Submit" class="btn_1 medium" /></p>
          {!! Form::close() !!}
    </div>
@endsection        