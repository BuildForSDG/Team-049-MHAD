@extends('backend.layouts.app')
@section('content')
    <!-- Icon Cards-->
    
            <div class="container-fluid">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="{{route('Admin')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">System Logs</li>
              </ol>
                <!-- Example DataTables Card-->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table"></i> Logs Record</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Method</th>
                          <th>Resources URL</th>
                          <th>Response Status</th>
                          <th>Response Time</th>
                          <th>Accessed Date</th>
                          <th>Accessed By</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        @if(count($data) > 0)
                        @php ($sn=0)
                        @foreach ($data as $datas)
                        @php ($sn++)
                        @if(isset($_REQUEST['page']))
                            @php ($page=$_REQUEST['page'])
                        @else 
                            @php ($page = 1)
                        @endif
                        @php ($pg_cnt = $sn + (($page - 1) * 10))
                        <tr>
                            <td>{{$pg_cnt}}</th>
                            <td>{{$datas->method}}</th>
                            <td>{{$datas->resources_url}}</td>
                            <td>{{$datas->response_status}}</td>
                            <td>{{$datas->response_time}}</td>
                            <td>{{$datas->access_date}}</td>
                            <td>{{$datas->access_by}}</th>
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