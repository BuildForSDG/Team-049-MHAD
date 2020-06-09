@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{config('app.url')}}/Admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Quick Search</li>
        </ol>
        {!! Form::open(['url' => '/searchmyschedule', 'method'=>'POST']) !!}
        <div class="box_general padding_bottom">
            
            <div class="header_box version_2">
                  <h2><i class="fa fa-file"></i>Schedule Quick Searc</h2>
            </div>
            
            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                            <label for="schDate">Schedule Date</label>
                            <input type="date" name="schDate" id="schDate" class="form-control" >
                      </div>
                  </div>
            </div>
          </div>
          <!-- /box_general-->
          <p><input type="submit" name="submit" value="Search" class="btn_1 medium" /></p>
          {!! Form::close() !!}
    </div>
@endsection        