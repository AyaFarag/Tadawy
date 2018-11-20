


 {{ csrf_field() }}

 <div class="col-md-12" >

<div class="row">
    <div class="col-md-6" style="float:right">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <label for="" class="">{{ trans('language.page title') }}</label>
                            <textarea id="" type="text" class=" form-control" name="title">{{$pages->title}}</textarea>
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
                                <label for="" class="">{{ trans('language.page content') }}</label>
                                <textarea id="" type="text" class=" form-control" rows="10" name="content">{{$pages->content}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>   
          </div>

</div>

</div>

