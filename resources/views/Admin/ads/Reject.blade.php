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
                        <th>ID</th>
                        <th>Comany Name</th>
                        <th>Plan Type</th>
                        <th>join Date</th>
                        <th>Action</th>

                    </tr>
                    @foreach($rejectedcompany as $rejectedcompany)
                    <tr>
                        <td>{{$rejectedcompany->id}}</td>
                        <td><a href="">{{$rejectedcompany->company_id->name}}</a></td>
                        <td>{{$rejectedcompany->plan_id->name}}</td>
                        <td>{{$rejectedcompany->company_id->created_at}}</td>
                        <td><a href="" class="btn btn-danger">Reject</a></td>
                        <td><a href="" class="btn btn-success">Approved</a></td>
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