@extends('admin.layout.dashboard')


@section('contentpages')



<div class="box box-warning">
    <div class="row" >
        <div class="col-xs-12" dir="rtl">
            <div class="box-header">
              <h3 class="box-title">{{ trans('language.pendding requests') }}</h3>
            </div>

              <div class="box-body">
                  {{-- --------- search ---------- --}}
              <div class="container" >
                <table  >
                  <tr>
                  <section  style="margin:right">
                    <td >
                      <div class=" ">
                        <input class="inputForm" type="checkbox" id="inlineCheckbox1" value="pendding" name="search[]" onclick="search()">
                        <label class="" for="inlineCheckbox1">
                          <h4><span class="label label-warning h4">{{ trans('language.pendding') }}</span></h4>
                        </label>
                      </div>
                    </td>

                    <td >
                      <div class=" ">
                        <input class="inputForm" type="checkbox" id="inlineCheckbox2" value="approved" name="search[]" onclick="search()">
                        <label class="" for="inlineCheckbox2">
                          <h4><span class="label label-success h4">{{ trans('language.approved') }}</span></h4>
                        </label>
                      </div>
                    </td>

                    <td >
                    <div class=" ">
                      <input class="inputForm" type="checkbox" id="inlineCheckbox3" value="rejected" name="search[]" onclick="search()">
                      <label class="" for="inlineCheckbox3">
                        <h4><span class="label label-danger h4">{{ trans('language.rejected') }}</span></h4>
                        </label>
                      </div>
                    </td>

                    {{--  <td class="col col-md-1">
                      <input type="submit" class="btn btn-primary btn-sm" value="{{ trans('language.search') }}">
                    </td>  --}}
                  </section>
                  <td>
                    <a class="btn btn-info btn-sm" href="{{ url('/pendding/plan/page')}}">إعادة تعيين</a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          {{-- ------------------- --}}
          <div class=" table-responsive no-padding" style="overflow-x: hidden;">
            <table class="table table-hover">
          <tr>
            <th class="text-right">{{ trans('language.id') }}</th>
            <th class="text-right">{{ trans('language.company name') }}</th>
            <th class="text-right">{{ trans('language.plan title') }}</th>
            <th class="text-right">{{ trans('language.join Date') }}</th>
            <th class="text-right">{{ trans('language.status') }}</th>
            <th class="text-right"></th>
          </tr>

        <div id="id" class="w-100 text-center opaque-overlay mb-3">
          <div  class="row m-0" id="po-wrap">
            @include('Admin.Company.section')
          </div>
        </div>
        </table>



        <!-- /.box-body -->
      <!-- /.box -->
    </div>
  </div>
    </div>

    <form action="{{ route('admin.country.store')}}" method="POST" style="width:50%; margin:auto;">

        <label> Send Data </label>
        {{ csrf_field() }}
        <input id="content" type="text" name="name" class="form-control" placeholder="write your text here" />
        <button id="buttonSubmit" type="submit" onclick="x()" class="btn btn-success">Submit</button>

    </form>

    <div class="bg-success" style="width:50%; margin:auto;">
      <h3> Country name: </h3>
      <p > the name of country </p>
    </div>

</div>

@endsection