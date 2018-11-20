


 {{ csrf_field() }}

 <div class="col-md-12" >

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="box-body">
                    <label for="inlineFormCustomSelect">{{ trans('language.category name') }}</label>
                    <select class="custom-select form-control" style="height:34px" id="inlineFormCustomSelect" name="category">

                        @foreach ($category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <label for="" class="">{{ trans('language.specialization name') }}</label>
                                <input id="" type="text" class=" form-control" name="specialization" value="{{$specialization->name}}"/>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
</div>

</div>

