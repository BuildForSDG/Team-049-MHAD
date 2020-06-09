@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
              <a href="{{route('Admin')}}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">My Schedule</li>
            </ol>
              <!-- Example DataTables Card-->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i> My Schedule Record(s)</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Schedule Date</th>
                        <th>Schedule Venue</th>
                        <th>Schedule Purpose</th>
                        <th>Doctor's Comment</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      @if(count($data) > 0)
                      @foreach ($data as $datas)
                      <tr>
                          <td>{{$datas->schDate}}</td>
                          <td>{{$datas->schVenue}}</th>
                          <td>{{$datas->schPurpose}}</td>
                          <td>{{$datas->docComment}}</td>
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

@endsection              