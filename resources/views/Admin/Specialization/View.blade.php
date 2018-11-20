@extends('admin.layout.dashboard')


@section('contentpages')

<div class="box box-warning">

        <div class="row">
            <div class="col-xs-12" dir="rtl">

                  <div class="box-header">
                      <h3 class="box-title"> {{ trans('language.specialization') }}</h3>
                  </div>


                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" >
                    <thead>

                      <th class="text-right">{{ trans('language.specialization name') }}</th>
                      <th class="text-right">{{ trans('language.category name') }}</th>
                      <th class="text-right"></th>

                    </thead>
                    @foreach($specialization as $specialization)
                    <tr>
                        <tbody>
                      <td>{{$specialization->name}}</td>
                      <td>{{$specialization->category->name}}</td>

                      <td>
                        <a href="{{route('admin.specialization.edit', $specialization->id)}}" class="btn btn-success">{{ trans('language.edit') }}</a>

                          &nbsp
                          <a href="{{ route('admin.specialization.delete', $specialization->id) }}" class="btn btn-danger">{{ trans('language.delete') }}</a>
                     </td>

                    </tbody>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          </div>


@endsection