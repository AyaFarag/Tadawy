@extends('admin.layout.dashboard')


@section('contentpages')

<div class="box box-warning">
  <div class="row">
      <div class="col-xs-12" dir="rtl">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class=" table-responsive no-padding">
                  <div class="col-md-12">
                    <table class="table table-hover" >
                        <thead >
                            <th style="text-align:right">{{ trans('language.name')}}</th>
                            <th style="text-align:right">{{ trans('language.email')}}</th>
                            <th style="text-align:right"></th>
                        </thead>
                        <tbody>
                            @forelse($moderators as $moderator)
                            <tr>
                                <tbody>
                                    <td >{{ $moderator -> name }}</td>
                                    <td>{{ $moderator -> email }}</td>

                                    <td>
                                        <a href="{{ route('admin.moderator.edit', $moderator -> id) }}" class="btn btn-success"> {{ trans('language.edit')}} </a>
                                        <a href="{{ route('admin.moderator.delete', $moderator -> id) }}" class="btn btn-danger"> {{ trans('language.delete')}} </a>
                                    </td>
                                </tbody>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
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