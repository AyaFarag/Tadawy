@extends('admin.layout.dashboard')


@section('contentpages')

<div class="box box-warning">

        <div class="row">
            <div class="col-xs-12" dir="rtl">

                <div class="box-header">
                  <h4 class="box-title">{{ trans('language.plans') }}</h4>
                </div>
                <!-- /.box-header -->
                <div class="pb-2 pt-0 px-0 m-0 text-justify pageContainer_prag d-block w-100">
                  <section class="packages">
                          <div class="row mt-5">
                            @foreach($plan as $plan)
                              <div class="col-md-4">
                                  <div class="card pb-5 px-5 m-1 packages_pgk text-center">
                                      <div class="card-block packages_pgk_title">
                                          <b> </b>
                                      </div>
                                      <div class="card-block my-3">
                                          <h1 class="packages_pgk_name">
                                              <strong>{{$plan->title}}</strong>
                                          </h1>
                                          <p>- - -</p>
                                          <hr>
                                          <p>
                                              <b>{{$plan->duration}}</b> </p>
                                          <hr>
                                          <p>
                                              <b>{{$plan->documents}}</b></p>

                                      </div>
                                      <div class="card-block">
                                          {{--  <a href="#" class="btn btn-secondary packages_pgk_btn">Start now</a>  --}}
                                      </div>
                                      <div>
                                          <a href="{{route('admin.plan.edit', $plan->id)}}" class="btn btn-success">{{ trans('language.edit') }}</a>

                                          &nbsp
                                          <a href="{{ route('admin.plan.delete', $plan->id) }}" class="btn btn-danger">{{ trans('language.delete') }}</a>

                                      </div>
                                  </div>
                              </div>
                              @endforeach
                          </div>
                  </section>
              </div>
                <!-- /.box-body -->

              <!-- /.box -->
            </div>
          </div>
          </div>


@endsection