@extends('Admin.layout.dashboard')

@section('contentpages')

<div class="row">
    <div class="col-md-12 " dir="rtl">

            <div class="box box-warning">
                    <div class="box-header">
                            <h3 class="box-title">{{ trans('language.edit pages') }}</h3>
                          </div>

                <form role="form" action="{{ route('admin.pages.update', $pages->id)}}" method="POST" >
                    <input type="hidden" name="_method" value="PATCH" />

                    @include('Admin.Pages.Form')

                 <div class="box-footer text-center">
                    <button type="submit" class="btn btn-success btn-lg">{{ trans('language.edit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
