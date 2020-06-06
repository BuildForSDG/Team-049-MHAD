@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
            <div class="container-fluid">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="{{route('Admin')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">PHQ-9 Patient Diagnosis Result</li>
              </ol>
                <!-- Example DataTables Card-->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table"></i> Diagnosis Record</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Reg. #</th>
                          <th>Name</th>
                          <th>Phone Number</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>PHQ Result</th>
                          <th>Diagnosis Level</th>
                          <th>Diagnosed Date</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        @if(count($data) > 0)
                        @foreach ($data as $datas)
                        <tr>
                            <td>{{$datas->pregNo}}</th>
                            <td>{{$datas->fullName}}</th>
                            <td>{{$datas->phoneNumber}}</td>
                            <td>{{$datas->age}}</th>
                            <td>{{$datas->gender}}</td>
                            <td><i style="color:red; font-size: 16px">{{round(($datas->phqResult/27)*100)}}%</i></td>
                            <td>{{$datas->diagnosisLevel}}</td>
                            <td>{{$datas->dateDaignosed}}</td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted">{{$data->links()}}</div>
              </div>
              <!-- /tables-->
              </div>
              <!-- /container-fluid-->
@endsection        