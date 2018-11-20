


 {{ csrf_field() }}

 <div class="col-md-12" >

<div class="row">

        <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <label for="" class="">العنوان</label>
                                <input id="" type="text" class=" form-control" name="address" value="{{$contacts->address}}"/>
                            </div>
                        </div>
                    </div>
                </div>   
          </div>
        <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <label for="" class="">رقم الهاتف</label>
                                <input id="" type="text" class=" form-control" name="phone" value="{{$contacts->phone}}"/>
                            </div>
                        </div>
                    </div>
                </div>   
          </div>
        <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <label for="" class="">البريد الإلكتروني</label>
                                <input id="" type="text" class=" form-control" name="email" value="{{$contacts->email}}"/>
                            </div>
                        </div>
                    </div>
                </div>   
          </div>
</div>

</div>

