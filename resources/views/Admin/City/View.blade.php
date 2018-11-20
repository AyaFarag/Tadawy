@extends('admin.layout.dashboard')


@section('contentpages')

<div class="box box-warning">

        <div class="row">
            <div class="col-xs-12" dir="rtl">

                <div class="box-header">
                  <h3 class="box-title"> {{ trans('language.cities') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-hover" >
                    <tr>
                    <thead >

                      <th class="text-right"> {{ trans('language.city name') }}</th>
                      <th class="text-right"> {{ trans('language.country name') }}</th>
                      <th></th>

                    </thead>
                    </tr>
                    @foreach($city as $city)
                    <tr>
                        <tbody>
                      <td >{{$city->name}}</td>
                      <td >{{$city->country->name}}</td>

                      <td>
                        <a href="{{route('admin.city.edit', $city->id)}}" class="btn btn-success">{{ trans('language.edit') }}</a>

                          &nbsp
                          <a href="{{ route('admin.city.delete', $city->id) }}" class="btn btn-danger">{{ trans('language.delete') }}</a>
                     </td>

                    </tbody>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.box-body -->

              <!-- /.box -->
            </div>
          </div>
          </div>


@endsection