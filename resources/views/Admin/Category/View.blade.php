@extends('admin.layout.dashboard')


@section('contentpages')

<div class="box box-warning">

        <div class="row">
            <div class="col-xs-12" dir="rtl">

                <div class="box-header">
                  <h3 class="box-title"> {{ trans('language.categories') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" >
                    <thead>
                      <th class="text-right">{{ trans('language.category name') }}</th>
                      <th class="text-right"></th>
                    </thead>
                    @foreach($category as $category)
                    <tr>
                        <tbody>
                      <td>{{$category->name}}</td>

                      <td>
                        <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-success">{{ trans('language.edit') }}</a>

                          &nbsp
                          <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-danger">{{ trans('language.delete') }}</a>

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