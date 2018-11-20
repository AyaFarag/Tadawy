@extends('admin.layout.dashboard')


@section('contentpages')






  <div class="row">
      <div class="col-xs-12" dir="rtl">
          <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <div class="col-md-3">

                  </div>
                  <div class="col-md-9">
                    <table class="table table-hover" >
                        <thead>

                            <th class="text-right">{{ trans('language.page name') }}</th>
                            <th> </th>
                        </thead>
                        @foreach($pages as $page)

                      <tr>
                        <tbody>
                            <td>{{$page->title}}</td>


                            <td>
                              <a href="{{route('admin.pages.edit', $page->id)}}" class="btn btn-success">{{ trans('language.edit') }}</a>
                              <a href="{{route('admin.pages.delete', $page->id)}}" class="btn btn-danger">{{ trans('language.delete') }}</a>
                            </td>
                        </tbody>
                      </tr>
                      @endforeach
                 </table>
                </div>
              </div>
                <!-- /.box-body -->
            </div>
              <!-- /.box -->
        </div>
    </div>
          </div>


@endsection