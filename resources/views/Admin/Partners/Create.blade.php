@extends('Admin.layout.dashboard')

@section('contentpages')

<div class="row" dir="rtl">
  <div class="col-md-12 " >
    <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">{{ trans('language.search')}}</h3>
        </div>
        <div class="box-body">
          <form method="get" action="{{ route('admin.partner.create') }}">
            <div class="form-group">
              <label class="control-label" for="search">{{ trans('language.name')}}</label>
              <div>
                <input class="form-control" id="search" name="query" value="{{ Request::has('query') ? Request::input('query') : '' }}" />
                <button class="btn col-md-2" type="submit">{{ trans('language.search')}}</button>
              </div>
            </div>
          </form>
        </div>
    </div>
    <div class="box box-warning" dir="rtl">
      <div class="box-header">
        <h3 class="box-title">{{ trans('language.partners')}}</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover" >
          <thead>

            <th style="text-align:right">{{ trans('language.name')}}</th>
            <th style="text-align:right">{{ trans('language.email')}}</th>
            <th style="text-align:right"></th>

          </thead>
          @foreach($companies as $company)
          <tbody>
            <tr>
              <td>{{$company->name}}</td>
              <td>{{$company->email}}</td>

              <td>
              	@if ($company -> partner)
                	<a href="{{ route('admin.partner.remove', $company->id) }}" class="btn btn-danger">Remove Partner</a>
                @else
                  <a href="{{route('admin.partner.store', $company->id)}}" class="btn btn-success">Add Partner</a>
              	@endif
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        {{ $companies -> links() }}
      </div>
    </div>
  </div>
</div>

@endsection
