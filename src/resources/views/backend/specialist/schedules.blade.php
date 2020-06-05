@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{config('app.url')}}/Admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Schedules List</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Schedules List</h2>
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
                                @if($datas->schStatus == '0')
                                <h4>{{$datas->fullName}} <i class="pending">
                                    Pending</i></h4>
                                    @elseif ($datas->schStatus == '1')
                                    <h4>{{$datas->id}} <i class="treated">
                                        Treated
                                </i></h4>
                                @endif
                                <ul class="booking_details">
                                    <li><strong>Patient Reg. No</strong> {{$datas->pregNo}}</li>
                                    <li><strong>Schedule Date</strong> {{$datas->schDate}}</li>
                                    <li><strong>Schedule Venue</strong> {{$datas->schVenue}}</li>
                                    <li><strong>Schedule Purpose</strong> {{$datas->schPurpose}}</li>
                                    <li><strong>Doctor's Comment</strong> {{$datas->docComment}}</li> 
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