@extends('admin.layout.dashboard')


@section('contentpages')

<div class="row" >
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Approved Requests</h3>
    
    
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
                @foreach($approvedcompany as $approvedcompany)
                <tr>
                    <td>{{$approvedcompany->id}}</td>
                    <td><a>{{$approvedcompany->company->name}}</a></td>
                    <td>{{$approvedcompany->plan->name}}</td>
                    <td>{{$approvedcompany->company->created_at}}</td>
                    <td><h4> <span class="label label-success h4">Approved</span> </h4></td>
                    <td>
                    <a href="{{URL::to('company/reject/'.$approvedcompany->id)}}" class="btn btn-danger">Reject</a>
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