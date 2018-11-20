@extends('Admin.layout.dashboard')


@section('contentpages')



<div class="row">
    <div class="col-md-12" dir="rtl">

            <div class="box box-warning">

                <form role="form" action="{{ route('admin.country.store')}}" method="POST" >

                    @include('Admin.Country.Form')

                    <div class="box-footer text-center">
                        <button type="submit" class="btn btn-info btn-lg">{{ trans('language.add') }}</button>
                    </div>


            </form>
            </div>
          </div>
        </div>

@endsection