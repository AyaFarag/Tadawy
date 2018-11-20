


 {{ csrf_field() }}

 <div class="col-md-12" style="float:right">

<div class="row">
        <div class="col-md-6" style="float:right">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <label for="" class="">{{ trans('language.facebook') }}</label>
                                <textarea id="" type="text" class=" form-control" name="social_network[facebook]">{{
                                    array_key_exists('facebook', $setting->social_network)
                                    ? $setting->social_network['facebook']
                                    : ""
                                }}</textarea>
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
                                <label for="" class="">{{ trans('language.twitter') }}</label>
                                <textarea id="" type="text" class=" form-control" name="social_network[twitter]">{{
                                    array_key_exists('twitter', $setting->social_network)
                                    ? $setting->social_network['twitter']
                                    : ""
                                }}</textarea>
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
                                <label for="" class="">{{ trans('language.instagram') }}</label>
                                <textarea id="" type="text" class=" form-control" name="social_network[instagram]">{{
                                        array_key_exists('instagram', $setting->social_network)
                                        ? $setting->social_network['instagram']
                                        : ""
                                    }}</textarea>
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
                                <label for="" class="">{{ trans('language.address') }}</label>
                                <textarea id="" type="text" class=" form-control" name="address">{{$setting->address}}</textarea>
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
                                <label for="" class="">{{ trans('language.phone') }}</label>
                                <textarea id="" type="text" class=" form-control" name="phone">{{$setting->phone}}</textarea>
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
                                <label for="" class="">{{ trans('language.email') }}</label>
                                <textarea id="" type="text" class=" form-control" name="email">{{$setting->email}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
</div>

</div>

