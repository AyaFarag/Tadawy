


 {{ csrf_field() }}



<div class="row">
        <div class="col-md-6" style="float:right">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <label class="" for="inlineFormCustomSelect" name="country">{{ trans('language.choose country') }}</label>
    
                                <select class="custom-select custom-select-lg mb-3"  id="inlineFormCustomSelect" name="country">
                                    @foreach ($country as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                </div>   
         </div>
    </div>

<div="row">

    <div class="col-md-6" style="float:right">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <label for="" class="">{{ trans('language.city name') }}</label>
                            <input id="" type="text" class=" form-control" name="name" value="{{$city->name}}"/>
                        </div>
                    </div>
                </div>
            </div>   
     </div>

</div>

 </div>

