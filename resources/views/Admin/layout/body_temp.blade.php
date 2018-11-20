<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" >

  <!-- Main Header -->
  <header class="main-header" >

    <!-- Logo -->
    <a href="#" class="logo" style="background-color: #e59124;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ trans('language.Control panel') }}</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation" style="background-color: #e59124;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{ trans('language.logout') }}</span>
            </a>


                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->


                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <div class="pull-left" style="margin:10px;"> <span>{{ trans('language.Are you sure to logout ?') }}</span> </div>

                    <div class="pull-right">

                      <a class="btn btn-default btn-flat" href="{{ route('admin.logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ trans('language.logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                    </div>
                  </li>
                </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" ><i class="fa fa-caret-down"></i></a>
          </li>
        </ul>
      </div>
    </nav>

     @include('admin.message')
  </header>
<!--================================================================================================================================================-->

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-color: #000">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->




      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">

        <!-- Optionally, you can add icons to the links -->

        {{--  Moderators  --}}
        <li class="treeview">
          <a href="#route"><i class="fa fa-align-justify"></i> <span>{{ trans('language.moderator') }} </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="{{ route('admin.moderator.index')}}">{{ trans('language.view moderator') }}</a></li>
             <li><a href="{{ route('admin.moderator.create')}}">{{ trans('language.add moderator') }}</a></li>
          </ul>
        </li>

        {{--  Setting  --}}
        <li class="treeview">
          <a href="#route"><i class="fa fa-align-justify"></i> <span>{{ trans('language.setting') }} </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="{{ route('admin.setting.index')}}">{{ trans('language.view setting') }}</a></li>
              {{-- <li><a href="{{ route('admin.setting.create')}}">+ Add setting</a></li>  --}}

          </ul>
        </li>
        {{--  Pages  --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-align-justify"></i> <span>{{ trans('language.pages') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.pages.index')}}">{{ trans('language.view pages') }}</a></li>
            <li><a href="{{ route('admin.pages.create')}}">{{ trans('language.create pages') }}</a></li>

          </ul>
        </li>

        {{--  Parnters  --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-align-justify"></i> <span>{{ trans('language.partners') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.partner.index')}}">{{ trans('language.view partners') }}</a></li>
            <li><a href="{{ route('admin.partner.create')}}">{{ trans('language.create partners') }}</a></li>

          </ul>
        </li>
        {{--  country  --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-align-justify"></i> <span>{{ trans('language.countries') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.country.index')}}">{{ trans('language.view countries') }}</a></li>
            <li><a href="{{ route('admin.country.create')}}">{{ trans('language.add countries') }}</a></li>

          </ul>
        </li>
        {{-- city --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-align-justify"></i> <span>{{ trans('language.cities') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.city.index')}}">{{ trans('language.view cities') }}</a></li>
            <li><a href="{{ route('admin.city.create')}}">{{ trans('language.add cities') }}</a></li>

          </ul>
        </li>
        {{--  Categories  --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-align-justify"></i> <span>{{ trans('language.categories') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.category.index')}}">{{ trans('language.view categories') }}</a></li>
            <li><a href="{{ route('admin.category.create')}}">{{ trans('language.add categories') }}</a></li>

          </ul>
        </li>
        {{--  Specializations  --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-align-justify"></i> <span>{{ trans('language.specialization') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.specialization.index')}}">{{ trans('language.view specialization') }}</a></li>
            <li><a href="{{ route('admin.specialization.create')}}">{{ trans('language.add specialization') }}</a></li>

          </ul>
        </li>



       {{--  plans  --}}
       <li class="treeview">
        <a href="#"><i class="fa fa-align-justify"></i> <span>{{ trans('language.plans') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.plan.index')}}">{{ trans('language.view plans') }}</a></li>
          <li><a href="{{ route('admin.plan.create')}}">{{ trans('language.add plans') }}</a></li>
          <li><a href="{{ route('admin.pendding.plan.page')}}">{{ trans('language.approve plans') }}</a></li>
          <li><a href="{{ route('admin.plans.index')}}">{{ trans('language.assign plans') }}</a></li>

        </ul>
      </li>


        {{--  ads subscribtion   --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-align-justify"></i> <span>{{ trans('language.ads') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/pendding/ads/page')}}">{{ trans('language.pendding') }}</a></li>
            {{--  <li><a href="{{ url('/approved/company/page')}}">{{ trans('language.approved') }}</a></li>
            <li><a href="{{ url('/rejected/company/page')}}">{{ trans('language.rejected') }}</a></li>  --}}
          </ul>
        </li>

        {{--  <li class="active"><a href="{{ url('/admin/home')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>

        <li class="active"><a href="{{ url('/firm') }}"><i class="fa fa-link"></i> <span>+ Add New Firm Account</span></a></li>

        <li><a href="{{ url('/all/firms')}}"><i class="fa fa-link"></i> <span>All Firms</span></a></li>  --}}
      </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
