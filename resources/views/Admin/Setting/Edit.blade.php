@extends('Admin.layout.dashboard')

@section('contentpages')

<div class="row">
    <div class="col-md-12" dir="rtl">
            {{--  <h1> Edit Setting</h1>  --}}
            <div class="box box-warning">
                    <div class="box-header">
                            <h3 class="box-title">{{ trans('language.edit setting') }}</h3>
                          </div>
                <!-- /.box-header -->

                <form role="form" action="{{ route('admin.setting.update', $setting->id)}}" method="POST" >
                    <input type="hidden" name="_method" value="PATCH" />

                    @include('Admin.Setting.Form')

                 <div class="box-footer text-center">
                    <button type="submit" class="btn btn-success btn-lg">تعديل</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
