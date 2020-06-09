@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{config('app.url')}}/Admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Medical Specialist</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Specialist Record(s)</h2>
			</div>
			<div class="list_general">
				<ul>
                    @if(count($data) > 0)
                        @foreach ($data as $datas)
                            <li>
                                <figure>&nbsp;</figure>
                                <h4>{{$datas->fullName}}
                                        @if($datas->status == '0')
                                        <i class="pending">Suspended</i>
                                        @elseif ($datas->status == '1')
                                        <i class="treated">Active</i>
                                        @endif
                                    </h4>
                                <ul class="booking_details">
                                    <li><strong>Registration Number</strong> {{$datas->docRegNo}}</li>
                                    <li><strong>Email Address</strong> {{$datas->emailAddress}}</li>
                                    <li><strong>Phone Number</strong> {{$datas->phoneNumber}}</li>
                                    <li><strong>Age</strong> {{$datas->age}}</li>
                                    <li><strong>Gender</strong> {{$datas->gender}}</li>
                                    <li><strong>Occupation</strong> {{$datas->occupation}}</li>
                                    <li><strong>Address</strong> {{$datas->address}}</li>
                                    <li><strong>State</strong> {{$datas->state}}</li>
                                    <li><strong>Country</strong> {{$datas->country}}</li>
                                    <li><strong>Zip Code</strong> {{$datas->zip_code}}</li>
                                    <li><strong>Date Signed Up</strong> {{$datas->dateRegistered}}</li>
                                    <li><strong style="color:red; font-size: 16px">Specialty</strong> <i style="color:red; font-size: 16px">{{$datas->specialty}}</i></li>
                                    
                                </ul>
                                <ul class="buttons">
                                    <li><a href="{{config('app.url')}}/editmedic/{{$datas->docRegNo}}" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Edit</a></li>
                                    <!--li><a href="{{config('app.url')}}/deletemedic/{{$datas->docRegNo}}" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Delete</a></li-->
                                </ul>
                            </li>
                        @endforeach
                    @endif
				</ul>
			</div>
		</div>
		<!-- /box_general-->
		<nav aria-label="...">
            {{$data->links()}}
		</nav>
		<!-- /pagination-->
      </div>
@endsection              