@extends('admin.layout.dashboard')


@section('contentpages')

<div class="box">

        <div class="row">
            <div class="col-xs-12" dir="rtl">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> بيانات الأتصال</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" >
                    <thead>

                      <th class="text-right"> العنوان</th>
                      <th class="text-right"> رقم الهاتف</th>
                      <th class="text-right"> الإلكتروني</th>
                      <th></th>

                    </thead>

                    <tr>
                        <tbody>
                      <td>{{$contacts->address}}</td>
                      <td>{{$contacts->phone}}</td>
                      <td>{{$contacts->email}}</td>

                      <td>
                        <a href="{{route('admin.contacts.edit', $contacts->id)}}" class="btn btn-success">Edit</a>

                          &nbsp
                          <a href="{{ route('admin.contacts.delete', $contacts->id) }}" class="btn btn-danger">Delete</a>
                     </td>

                    </tbody>
                    </tr>

                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          </div>


@endsection