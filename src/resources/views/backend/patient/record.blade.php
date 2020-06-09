@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{config('app.url')}}/Admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">PHQ-9 Test</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">PHQ-9 Result(s)</h2>
			</div>
			<div class="list_general">
				<ul>
                    @if(count($data) > 0)
                        @foreach ($data as $datas)
                            <li>
                                <figure>&nbsp;</figure>
                                <h4>{{$datas->fullName}} </h4>
                                <ul class="booking_details">
                                    <li><strong>Email Address</strong> {{$datas->emailAddress}}</li>
                                    <li><strong>Phone Number</strong> {{$datas->phoneNumber}}</li>
                                    <li><strong>Age</strong> {{$datas->age}}</li>
                                    <li><strong>Gender</strong> {{$datas->gender}}</li>
                                    <li><strong>Date Registerd</strong> {{$datas->dateRegistered_at}}</li>
                                    <li><strong style="color:red; font-size: 16px">PHQ-9 Result</strong> <i style="color:red; font-size: 16px">{{round(($datas->phqResult/27)*100)}}%</i></li>
                                    <li><strong>Diagnosis Level</strong> {{$datas->diagnosisLevel}}</li>
                                    <li><strong>Diagnosis Suggest</strong> {{$datas->diagnoseSuggest}}</li>
                                    <li style="color:blue; font-size: 16px"><strong>Assigned Doctor</strong>Dr. {{$datas->SPfullName}}</li>
                                    <li style="color:blue; font-size: 16px"><strong>Doctor Phone</strong> {{$datas->SPphoneNumber}}</li>
                                    <li style="color:blue; font-size: 16px"><strong>Doctor Email</strong> {{$datas->SPemailAddress}}</li>
                                    <li style="color:blue; font-size: 16px"><strong>Occupation</strong> {{$datas->SPoccupation}}</li>
                                    <li style="color:blue; font-size: 16px"><strong>Specialty</strong> {{$datas->SPspecialty}}</li>
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