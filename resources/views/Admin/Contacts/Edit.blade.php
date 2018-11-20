@extends('Admin.layout.dashboard')

@section('contentpages')

<div class="row">
    <div class="col-md-12 " dir="rtl">
            <h1>تعديل بيانات الأتصال</h1>
            <div class="box box-primary">
                <!-- /.box-header -->

                <form role="form" action="{{ route('admin.contacts.update', $contacts->id)}}" method="POST" >
                    <input type="hidden" name="_method" value="PATCH" />

                    @include('Admin.Contacts.Form')

                 <div class="box-footer text-center">
                    <button type="submit" class="btn btn-success btn-lg">تعديل</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
