@extends('admin.layout.dashboard')


@section('contentpages')

<div class="box box-warning">
<div class="row" >
        <div class="col-xs-12" dir="rtl">
            <div class="box-header">
              <h3 class="box-title">{{ trans('language.assign plans') }} </h3>
            </div>
            <div class="box-body">
    <form action="{{ route('admin.assign.plan')}}" method="POST" class="form-group">
        {{ csrf_field() }}
        <table>
          <tr>
        <div class="form-row align-items-center">
          <td style="padding:15px">
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect" >{{ trans('language.companies')}}</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="company">
              @foreach($companies as $company)
              <option value="{{$company->id}}" name="company" >{{$company->name}}</option>
                @endforeach
            </select>
          </div>
          </td>
          <td style="padding:15px">
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect" >{{ trans('language.plans')}}</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="plan">
             @foreach($plans as $plan)
              <option value="{{$plan->id}}" name="plan">{{$plan->title}}</option>
                @endforeach
            </select>
          </div>
          </td>
          <td style="padding:15px">
          <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary">{{ trans('language.submit')}}</button>
          </div>
          </td>

        </div>
          </tr>
        </table>
    </form>
            </div>
</div>
  </div>
</div>




@endsection





