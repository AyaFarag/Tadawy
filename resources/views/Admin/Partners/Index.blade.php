@extends('Admin.layout.dashboard')

@section('contentpages')

<div class="row" dir="rtl">
  <div class="col-md-12 ">
		<div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">{{ trans('language.partners')}}</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover" >
          <thead>

            <th style="text-align:right">{{ trans('language.name')}}</th>
            <th style="text-align:right">{{ trans('language.email')}}</th>
            <th></th>

          </thead>
          @foreach($partners as $partner)
          <tbody>
            <tr>
              <td>{{$partner->name}}</td>
              <td>{{$partner->email}}</td>

              <td>
              	<a href="{{ route('admin.partner.remove', $partner->id) }}" class="btn btn-danger">Remove Partner</a>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        {{ $partners -> links() }}
      </div>
    </div>
  </div>
</div>

@endsection
