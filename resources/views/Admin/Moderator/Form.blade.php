


{{ csrf_field() }}

<div class="col-md-12" >

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <label for="name" class="">{{ trans('language.name')}}</label>
                            <input name="name" id="name" class="form-control" value="{{ isset($moderator) ? $moderator -> name : '' }}"/>
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
                            <label for="email" class="">{{ trans('language.email')}}</label>
                            <input id="email" type="text" class="form-control" name="email" value="{{ isset($moderator) ? $moderator ->  email : '' }}">
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
                            <label for="password" class="">{{ trans('language.password')}}</label>
                            <input id="password" type="password" class="form-control" name="password" />
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
                            <label for="password_confirmation" class="">{{ trans('language.confirm password')}}</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

