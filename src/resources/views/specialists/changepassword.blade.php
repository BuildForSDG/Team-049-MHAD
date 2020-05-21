@extends('layouts.app')

@section('content')


    <div class="site-section bg-light">
        <div class="container">
        <br><br>
        <h1>Change Password</h1>
            <div class="row">
                
        <div class="col-md-12 col-lg-8 mb-5">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif

                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
                @endif
            <form method="POST" action="{{ route('changepassword') }}">
                @csrf
                <input type="hidden" value="specialist" name="user_type">

                        <div class="form-group row">
                            <div class="col-md-12">Current Password</div>
                                 <div class="col-md-12">
                                     <input id="current_password" type="text" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" value="{{ old('current_password') }}" required autofocus>
     
                                     @if ($errors->has('current_password'))
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('current_password') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>

                        <div class="form-group row">
                        <div class="col-md-12">New Password</div>
                            <div class="col-md-12">
                                <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" required>

                                @if ($errors->has('new_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">Confirm Password</div>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="new_password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-12">
                                <input type="submit" value="Change Password" class="btn btn-primary" py-2 px-5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
