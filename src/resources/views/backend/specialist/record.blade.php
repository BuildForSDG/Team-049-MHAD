@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{config('app.url')}}/Admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Patients Record</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Patients List</h2>
				<div class="filter">
					<select name="orderby" class="selectbox">
						<option value="Any status">Any status</option>
						<option value="Approved">Approved</option>
						<option value="Pending">Pending</option>
						<option value="Cancelled">Cancelled</option>
					</select>
				</div>
			</div>
			<div class="list_general">
				<ul>
                    @if(count($data) > 0)
                        @foreach ($data as $datas)
                            <li>
                                <figure><img src="img/avatar1.jpg" alt=""></figure>
                                <h4>{{$datas->fullName}} <i class="pending">
                                    @if($datas->treatmentStatus == '0')
                                        Pending
                                    @elseif ($datas->treatmentStatus == '1')
                                        Treated
                                    @endif
                                </i></h4>
                                <ul class="booking_details">
                                    <li><strong>Email Address</strong> {{$datas->emailAddress}}</li>
                                    <li><strong>Phone Number</strong> {{$datas->phoneNumber}}</li>
                                    <li><strong>Age</strong> {{$datas->age}}</li>
                                    <li><strong>Gender</strong> {{$datas->gender}}</li>
                                    <li><strong>Date Registerd</strong> {{$datas->dateRegistered_at}}</li>
                                    <li><strong style="color:red; font-size: 16px">PHQ-9 Result</strong> <i style="color:red; font-size: 16px">{{round(($datas->phqResult/27)*100)}}%</i></li>
                                    <li><strong>Diagnosis Level</strong> {{$datas->diagnosisLevel}}</li>
                                    <li><strong>Diagnosis Suggest</strong> {{$datas->diagnoseSuggest}}</li>
                                </ul>
                                <ul class="buttons">
                                    <li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Add Treatment</a></li>
                                    <li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Complete Treatment</a></li>
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