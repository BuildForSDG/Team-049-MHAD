@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    @include('backend.inc.dash')
    @switch(session('userType')[0])
        @case('Specialist')
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[0]}} - Total Patient Assigned</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('record')}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[1]}} - Total Patient Treated</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('record')}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-calendar-check-o"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[2]}} - Total schedule</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('schedules')}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5><?=$data[3][0]->{'cnt'};?> - Total complaint</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('complains')}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /cards -->
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                <h2><i class="fa fa-bar-chart"></i>Patient Monthly Statistic - {{@date('Y')}}</h2>
                </div>
                <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
            </div>
            @break
        @case('Patient')
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[0]}} - PHQ-9 Test</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{config('app.url')}}/phq9_result">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[1]}} - Total Treatment</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{config('app.url')}}/mytreatment">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-calendar-check-o"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[2]}} - Total schedule</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{config('app.url')}}/myschedule">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5><?=$data[3][0]->{'cnt'};?> - Total complaint</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{config('app.url')}}/complaintrecord">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /cards -->
            <h2></h2>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-bar-chart"></i>Monthly Schedule</h2>
                </div>
                <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
            </div>
            
            @break
        @case('Admin')
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-file"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[0]}} - Total Patient</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{config('app.url')}}/patient">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[1]}} - Total PHQ-9 Test</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('phq9')}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-user-o"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[2]}} - Total Specialist</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{config('app.url')}}/specialistrecord">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-book"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{$data[3]}} - Total complaint</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{config('app.url')}}/complaint">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /cards -->
            <h2></h2>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-bar-chart"></i>Patient Monthly Statistic {{@date('Y')}}</h2>
                </div>
                <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
            </div>
            
            @break
        @default
            
    @endswitch
        <script type="text/javascript">
                // Chart.js scripts
                // -- Set new default font family and font color to mimic Bootstrap's default styling
                Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#292b2c';
                // -- Area Chart Example
                var ctx = document.getElementById("myAreaChart");
                var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [{
                    label: "Sessions",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 20,
                    pointBorderWidth: 2,
                    data: [<?=$data[4][1][0]->{'cnt'};?>, <?=$data[4][2][0]->{'cnt'};?>, <?=$data[4][3][0]->{'cnt'};?>, <?=$data[4][4][0]->{'cnt'};?>, <?=$data[4][5][0]->{'cnt'};?>, <?=$data[4][6][0]->{'cnt'};?>, <?=$data[4][7][0]->{'cnt'};?>, <?=$data[4][8][0]->{'cnt'};?>, <?=$data[4][9][0]->{'cnt'};?>, <?=$data[4][10][0]->{'cnt'};?>, <?=$data[4][11][0]->{'cnt'};?>, <?=$data[4][12][0]->{'cnt'};?>],
                    }],
                },
                options: {
                    scales: {
                    xAxes: [{
                        time: {
                        unit: 'date'
                        },
                        gridLines: {
                        display: false
                        },
                        ticks: {
                        maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                        min: 0,
                        max: 100,
                        maxTicksLimit: 5
                        },
                        gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                    },
                    legend: {
                    display: false
                    }
                }
                });

        </script>
@endsection        