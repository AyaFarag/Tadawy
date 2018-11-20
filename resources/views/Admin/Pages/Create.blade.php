@extends('Admin.layout.dashboard')


@section('contentpages')



<div class="row">
        <div class="col-md-12">
                <h1> Pages </h1>
              <div class="box box-warning">

                    <form role="form" action="{{ route('admin.pages.store')}}" method="POST" >

                        @include('Admin.Pages.Form')

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-info btn-lg">حفظ</button>
                        </div>
                     </form>
               </div>
          </div>
        </div>

@endsection