@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{config('app.url')}}/Admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Treatment</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">My Treatment Record(s)</h2>
			</div>
			<div class="list_general">
				<ul>
                    @if(count($data) > 0)
                        @foreach ($data as $datas)
                            <li>
                                <figure>&nbsp;</figure>
                                @if($datas->status == '0')
                                <h4>{{$datas->fullName}} </h4>
                                @endif
                                <ul class="booking_details">
                                    <li><strong>Patient Reg. No</strong> {{$datas->pregNo}}</li>
                                    <li><strong>Symptom</strong> {{$datas->targetSymptom}}</li>
                                    <li><strong>Prescription</strong> {{$datas->prescDesc}}</li>
                                    <li><strong>Comment</strong> {{$datas->comment}}</li>
                                    <li style="color:blue"><strong>Patient's Feedback </strong> {{$datas->patientFeedback}}</li>
                                    <li><strong>Date Treated</strong> {{$datas->dateTreated}}</li>
                                   
                                </ul>
                                <ul class="buttons">
                                <li><a href="{{config('app.url')}}/feedback/{{$datas->id}}" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Add Feedback</a></li>
                                </ul>
                            </li>
                        @endforeach
                    @endif
                </ul>
			</div>
		</div>
		<!-- /box_general-->
		<nav aria-label="...">
            {{$data->links() }}
		</nav>
		<!-- /pagination-->
      </div>
@endsection              