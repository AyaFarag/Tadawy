


 {{ csrf_field() }}

 <div class="col-md-12" >

<div class="row">
        <div class="col-md-6" style="float:right">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <label for="" class="">{{ trans('language.plan title') }}</label>
                                <input id="" type="text" class=" form-control" name="title" value="{{$plan->title}}"/>
                            </div>
                        </div>
                    </div>
                </div>   
          </div>
</div>
<div class="row">
        <div class="col-md-6" style="float:right">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <label for="" class="">{{ trans('language.plan duration') }} </label>
                                <input id="" type="text" class=" form-control" name="duration" value="{{$plan->duration}}" />
                            </div>
                        </div>
                    </div>
                </div>   
          </div>
</div>
<div class="row">
        <div class="col-md-6" style="float:right">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <label for="" class=""> {{ trans('language.plan docs') }}</label>
                                <input id="" type="text" class=" form-control" name="documents" value="{{$plan->documents}}" />
                            </div>
                        </div>
                    </div>
                </div>   
          </div>
</div>

</div>

