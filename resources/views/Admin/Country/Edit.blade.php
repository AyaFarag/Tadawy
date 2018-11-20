@extends('Admin.layout.dashboard')

@section('contentpages')

<div class="row">
    <div class="col-md-12 " dir="rtl">

            <div class="box box-warning">
                <!-- /.box-header -->

                <form role="form" action="{{ route('admin.country.update', $country->id)}}" method="POST" >
                    <input type="hidden" name="_method" value="PATCH" />
                @include('Admin.Country.Form')

                <div class="box-footer text-center">
                    <button type="submit" class="btn btn-success btn-lg">{{ trans('language.edit') }}</button>
                </div>
            </form>
            </div>
          </div>
        </div>

@endsection
