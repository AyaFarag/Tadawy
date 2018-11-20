@extends('admin.layout.dashboard')


@section('contentpages')

<div class="box box-warning">
<div class="row" >
    <div class="col-xs-12" dir="rtl">
        <div class="box-header">
          <h3 class="box-title">{{ trans('language.pendding requests') }}</h3>
        </div>
          <div class="container">

        <table>
          <tr >
              <form action="{{ url('admin/pendding/ads/page') }}" method="GET" >
                <td style="padding:25px;">
                    <div class=" ">
                        <input class="" type="checkbox" id="inlineCheckbox1" value="0" name="search[]"

                          {{ request() -> has("search") && in_array(0, request() -> input("search")) ? "checked" : "" }}
                        >
                        <label class="" for="inlineCheckbox1">
                          <h4><span class="label label-warning h4">{{ trans('language.pendding') }}</span></h4>
                        </label>
                    </div>
                </td>

                <td style="padding:25px;">
                <div class=" ">
                    <input class="" type="checkbox" id="inlineCheckbox2" value="1" name="search[]"
                      {{ request() -> has("search") && in_array(1, request() -> input("search")) ? "checked" : "" }}
                    >
                    <label class="" for="inlineCheckbox2">
                      <h4><span class="label label-success h4">{{ trans('language.approved') }}</span></h4>
                    </label>
                  </div>
                </td>


                <td style="padding:25px;">
                  <div class=" ">
                    <input class="" type="checkbox" id="inlineCheckbox3" value="2" name="search[]"
                      {{ request() -> has("search") && in_array(2, request() -> input("search")) ? "checked" : "" }}
                    >
                    <label class="" for="inlineCheckbox3">
                      <h4><span class="label label-danger h4">{{ trans('language.rejected') }}</span></h4>
                    </label>
                  </div>
                </td>

                <td style="padding:25px;">
                    <input type="submit" class="btn btn-primary btn-sm" value="{{ trans('language.search') }}">
                </td>

              </form>

              <td>
                <a class="btn btn-info btn-sm" href="{{ url('admin/pendding/ads/page')}}">{{ trans('language.reset') }}</a>
              </td>

            </tr>
        </table>

    </div>
              {{-- ------------------- --}}

        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th class="text-right">{{ trans('language.id') }}</th>
              <th class="text-right">{{ trans('language.company name') }} </th>
              <th class="text-right">{{ trans('language.ad title') }}</th>
              <th class="text-right">{{ trans('language.ad content') }}</th>
              <th class="text-right">{{ trans('language.ad duration') }}</th>
              <th class="text-right">{{ trans('language.ad image') }}</th>
              <th class="text-right">{{ trans('language.status') }}</th>
              <th class="text-right"></th>
              @foreach($ads as $ads)
            </tr>
            <tr class="{{$ads->status}}">
              <td>{{$ads->id}}</td>
              <td><a>{{$ads->company->name}}</a></td>
              <td>{{$ads->title}}</td>
              <td>{{$ads->content}}</td>
              <td>{{$ads->duration}}</td>
              <td>{{$ads->image}}</td>
              <td><h4>
                  @if($ads->status == 0)
                  <span class="label label-warning h4">{{ trans('language.pendding') }}</span>
                 @elseif($ads->status == 1)
                 <span class="label label-success h4">{{ trans('language.approved') }}</span>
                 @elseif($ads->status == 2)
                 <span class="label label-danger h4">{{ trans('language.rejected') }}</span>
                 @endif

                </h4> </td>
              <td>
              <td>
                  @if (is_null($ads -> ended_at))
                    <a href="{{URL::to('admin/ads/approve/'.$ads->id)}}" class="btn btn-success">{{ trans('language.approve') }}</a>
                    <a href="{{URL::to('admin/ads/reject/'.$ads->id)}}" class="btn btn-danger">{{ trans('language.reject') }}</a>
                  @endif
              </td>
            </tr>

            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>

@endsection