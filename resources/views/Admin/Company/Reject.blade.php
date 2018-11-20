@extends('admin.layout.dashboard')


@section('contentpages')

<div class="row" >
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rejected Requests</h3>
    
    
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                    <tr>
                        <th >ID</th>
                        <th>Comany Name</th>
                        <th>Plan Type</th>
                        <th>join Date</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                    @foreach($rejectedcompany as $rejectedcompany)
                    <tr>
                        <td>{{$rejectedcompany->id}}</td>
                        <td><a href="">{{$rejectedcompany->company->name}}</a></td>
                        <td>{{$rejectedcompany->plan->title}}</td>
                        <td>{{$rejectedcompany->created_at}}</td>
                        <td><h4> <span class="label label-danger h4">Rejected</span> </h4></td>
                        <td>
                          <a href="{{URL::to('company/approve/'.$rejectedcompany->id)}}" class="btn btn-success">Approve</a>
                        </td>
                    </tr>
                    @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    

@endsection