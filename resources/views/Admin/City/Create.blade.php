@extends('Admin.layout.dashboard')


@section('contentpages')


<div class="box box-warning">

<div class="row">
    <div class="col-md-12" dir="rtl">


                <form role="form" action="{{ route('admin.city.store')}}" method="POST" >

                    @include('Admin.City.Form')

                    <div class="box-footer text-center">
                        <button type="submit" class="btn btn-info btn-lg">{{ trans('language.add') }}</button>
                    </div>


            </form>
        </div>
    </div>
</div>

@endsection