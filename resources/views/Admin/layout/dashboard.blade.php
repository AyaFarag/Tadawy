@extends('Admin.layout.app')

@section('pages')



<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        {{--  {{ trans('language.Dashboard') }}  --}}
        {{--  <small>{{ trans('language.Control panel') }}</small>  --}}
      </h1>
    </section>





    <!-- Page content starts here-->
    <!-- Main content -->
    <section class="content container-fluid">
      

      @yield('contentpages')

      

    </section>
    <!-- /.content -->
    <!-- Page content starts here-->






  </div>
  <!-- /.content-wrapper -->
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

@endsection






