@if (Session::has('success'))

   <div class="alert alert-success" style="width:auto; float:left; margin:23px 0 -44px 34px;" role="alert">
       <i class="fa fa-check"></i>
        <strong>Success:</strong> {{ Session::get('success')}}
   </div>

@endif
@if (Session::has('reject'))

   <div class="alert alert-danger" style="width:auto; float:left; margin:23px 0 -44px 34px;" role="alert">
       <i class="fa fa-check"></i>
        <strong>Success:</strong> {{ Session::get('reject')}}
   </div>

@endif

@if ($errors->any())
    <div class="alert alert-danger" style="width:auto; float:left; margin:23px 0 -44px 34px;" role="alert">

        <ul>
            @foreach ($errors->all() as $error)
            {{-- <i class="fa fa-close "></i> --}}
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif