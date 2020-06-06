@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{config('app.url')}}/Admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Treatments</li>
        </ol>
        {!! Form::open(['url' => '/tcreate', 'method'=>'POST']) !!}
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
                            <label for="targetSymptom">Target Symptom</label>
                            <input type="text" name="targetSymptom" id="targetSymptom" class="form-control" required>
                      </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                            <label for="prescDesc">Prescription</label>
                            <textarea name="prescDesc" id="prescDesc" class="form-control"></textarea>
                      </div>
                  </div>
            </div>
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea name="comment" id="comment" class="form-control" required></textarea>
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