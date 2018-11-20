@extends('Admin.layout.dashboard')


@section('contentpages')



<div class="row">
<div class="col-md-12" dir="rtl">

        <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">{{ trans('language.add moderator') }}</h3>
        </div>
            <form role="form" action="{{ route('admin.moderator.store')}}" method="POST">
                @include('Admin.Moderator.Form')

                <div class="box-footer text-center">
                    <button type="submit" class="btn btn-info btn-lg">{{ trans('language.add')}}</button>
                </div>
            </form>
       </div>
    </div>
</div>

@endsection