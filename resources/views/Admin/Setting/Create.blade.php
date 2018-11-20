@extends('Admin.layout.dashboard')


@section('contentpages')



<div class="row">
    <div class="col-md-12" dir="rtl">

            <div class="box box-warning">

                <form role="form" action="{{ route('admin.setting.store')}}" method="POST" >

                    @include('Admin.Setting.Form')

                    <div class="box-footer text-center">
                        <button type="submit" class="btn btn-info btn-lg">حفظ</button>
                    </div>


            </form>
            </div>
          </div>
        </div>

@endsection