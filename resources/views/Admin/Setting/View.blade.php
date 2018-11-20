@extends('admin.layout.dashboard')


@section('contentpages')



        <div class="row">
            <div class="col-xs-12" >
              <div class="box box-warning" style="text-align: right;">
                <div class="box-header">
                  <h3 class="box-title">{{ trans('language.setting') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" dir="rtl">
                  <table class="table table-hover" >
                    @if (array_key_exists('facebook', $setting->social_network))
                    <tr >
                      <th class="text-right">{{ trans('language.facebook') }}</th>
                      <td> {{ $setting->social_network['facebook']}} </td>
                    </tr>
                    @endif
                    @if (array_key_exists('twitter', $setting->social_network))
                    <tr >
                      <th class="text-right">{{ trans('language.twitter') }}</th>
                      <td> {{ $setting->social_network['twitter']}} </td>
                    </tr>
                    @endif
                    @if (array_key_exists('instagram', $setting->social_network))
                    <tr >
                      <th class="text-right">{{ trans('language.instagram') }}</th>
                      <td> {{ $setting->social_network['instagram']}} </td>
                    </tr>
                    @endif
                    <tr>
                      <th class="text-right">{{ trans('language.address') }}</th>
                      <td> {{$setting->address}} </td>
                    </tr>
                    <tr>
                      <th class="text-right">{{ trans('language.phone') }}</th>
                      <td> {{$setting->phone}}</td>
                    </tr>
                    <tr>
                      <th class="text-right">{{ trans('language.email') }}</th>
                      <td> {{$setting->email}} </td>
                    </tr>
                    <tr>
                      <th></th>
                      <td> <a href="{{route('admin.setting.edit', $setting->id)}}" class="btn btn-success">{{ trans('language.edit') }}</a> </td>
                    </tr>

                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>



@endsection


