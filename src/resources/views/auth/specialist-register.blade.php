@extends('layouts.app')

@section('content')


    <div class="site-section bg-light">
        <div class="container">
        <br><br>
        <h1>Specialist Registration</h1>
            <div class="row">
                
        <div class="col-md-12 col-lg-8 mb-5">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
            <form method="POST" action="{{ route('specialist.register') }}">
                @csrf
                <input type="hidden" value="specialist" name="user_type">

                        <div class="form-group row">
                            <div class="col-md-12">Name</div>
                                 <div class="col-md-12">
                                     <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
     
                                     @if ($errors->has('name'))
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                        
                        <div class="form-group row">
                        <div class="col-md-12">E-Mail Address</div>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-12">Password</div>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">Confirm Password</div>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-12">
                                <input type="submit" value="Register as Specialist" class="btn btn-primary" py-2 px-5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
