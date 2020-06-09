@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{config('app.url')}}/Admin">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Admin Profile</li>
    </ol>
    {!! Form::open(['url' => '/addprofile', 'method'=>'POST']) !!}
      <div class="box_general padding_bottom">
          <div class="header_box version_2">
              <h2><i class="fa fa-file"></i>Basic info</h2>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Registration ID</label>
                      <input type="text" name="admRegNo" value="<?=@date('ymhiss');?>" class="form-control" readonly>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Name (Full Name)</label>
                      <input type="text" name="fullName" class="form-control" value="" required>
                  </div>
              </div>
          </div>
          <!-- /row-->
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" name="phoneNumber" value="" class="form-control" required>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" value="" class="form-control">
                  </div>
              </div>
          </div>
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
                        <input type="text" name="address" value="" class="form-control" required>
                    </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>State</label>
                      <input type="text" class="form-control" name="state" value="" required>
                  </div>
              </div>
          </div>
          <!-- /row-->
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Country</label>
                      <input type="text" class="form-control" name="country" value="" required>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Zip code</label>
                      <input type="text" class="form-control" name="zip_code" value="" required>
                  </div>
              </div>
          </div>
          <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required>
                            <option></option>
                            @if(count($data) > 0)
                            @foreach ($data as $role)
                                <option value="{{$role->roleName}}">{{$role->roleName}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" value="" required>
                        </div>
                    </div>
            </div>
          <!-- /row-->
      </div>
      <!-- /box_general-->
      <p><button class="btn_1 medium">Create</button></p>
      {!! Form::close() !!}
    </div>
@endsection        