@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        @if(empty(Auth::user()->specialist->avatar))
            <img src="{{asset('avatar/man.jpg')}}" width="100" style="width: 100%;"/>
        @else   
            <img src="{{asset('uploads/avatar')}}/{{Auth::user()->specialist->avatar}}" width="100" style="width: 100%;" />
            <!-- <img src="/uploads/avatar/{{ Auth::user()->specialist->avatar }}"  width="100" style="width: 100%;"> -->


        @endif
            <br><br>

            <form action="{{route('avatar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
            <div class="card-header">Update Profile picture</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="avatar">
                    <br><button type="submit" class="btn btn-success">Update</button>
                    @if($errors->has('avatar'))
                            <div class="error" style="color: red;">{{$errors->first('avatar')}}</div>
                    @endif
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-5">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
            <div class="card">
                <div class="card-header">Update Your Profile</div>
                <form action="{{route('profile.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Gender</label>
                        <select name="gender" class="form-control" value="{{Auth::user()->specialist->gender}}" placeholder="Select">
                                <option>Male</option>
                                <option>Female</option>
                        
                        </select>
                        @if($errors->has('gender'))
                            <div class="error" style="color: red;">{{$errors->first('gender')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Occupation</label>
                        <input type="text" name="occupation" class="form-control" value="{{Auth::user()->specialist->occupation}}"/>
                        @if($errors->has('occupation'))
                            <div class="error" style="color: red;">{{$errors->first('occupation')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Specialty</label>
                        <textarea type="text" name="specialty" class="form-control">{{Auth::user()->specialist->specialty}}</textarea>
                        @if($errors->has('specialty'))
                            <div class="error" style="color: red;">{{$errors->first('specialty')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Country</label>
                        <textarea type="text" name="country" class="form-control">{{Auth::user()->specialist->country}}</textarea>
                        @if($errors->has('country'))
                            <div class="error" style="color: red;">{{$errors->first('country')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <textarea type="text" name="phone" class="form-control">{{Auth::user()->specialist->phone}}</textarea>
                        @if($errors->has('phone'))
                            <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                
            </div>
        </div>
        </form>
        <div class="col-md-4">
            <div class="card">
            <div class="card-header">Your Information</div>
                <div class="card-body">
                    <p>Name : {{Auth::user()->specialist->name}}</p>
                    <p>Email : {{Auth::user()->email}}</p>
                    <p>Gender : {{Auth::user()->specialist->gender}}</p>
                    <p>Occupation : {{Auth::user()->specialist->occupation}}</p>
                    <p>Specialty : {{Auth::user()->specialist->specialty}}</p>
                    <p>Country : {{Auth::user()->specialist->country}}</p>
                    <p>Phone : {{Auth::user()->specialist->phone}}</p>
                    <p>Member On : {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
