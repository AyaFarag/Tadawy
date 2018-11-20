@extends('admin.layout.dashboard')


@section('contentpages')

<div class="box box-warning">

        <div class="row">
            <div class="col-xs-12" dir="rtl">

                <div class="box-header">
                  <h3 class="box-title">{{ trans('language.countries') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                  <table class="table table-hover" >
                    <thead>

                      <th style="float:right">{{ trans('language.country name') }}</th>
                      <th></th>

                    </thead>
                    @foreach($country as $country)
                    <tr>
                        <tbody>
                      <td>{{$country->name}}</td>

                      <td>
                        <a href="{{route('admin.country.edit', $country->id)}}" class="btn btn-success">{{ trans('language.edit') }}</a>

                          &nbsp
                          <a href="{{ route('admin.country.delete', $country->id) }}" class="btn btn-danger">{{ trans('language.delete') }}</a>
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