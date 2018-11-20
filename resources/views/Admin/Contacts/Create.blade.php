@extends('Admin.layout.dashboard')


@section('contentpages')



<div class="row">
    <div class="col-md-12" dir="rtl">
            <h1>إضافه بيانات الأتصال</h1>
            <div class="box box-primary">

                <form role="form" action="{{ route('admin.contacts.store')}}" method="POST" >

                    @include('Admin.Contacts.Form')

                    <div class="box-footer text-center">
                        <button type="submit" class="btn btn-info btn-lg">حفظ</button>
                    </div>


            </form>
            </div>
          </div>
        </div>

@endsection