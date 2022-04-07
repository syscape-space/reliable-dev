<!-- Navbar -->
  <nav class="main-header navbar navbar-expand
 {{ !empty(setting()->theme_setting) &&
    !empty(setting()->theme_setting->navbar)?
    setting()->theme_setting->navbar:'navbar-dark' }}
{{ !empty(setting()->theme_setting) &&
   !empty(setting()->theme_setting->main_header)?
    setting()->theme_setting->main_header:'' }}
    ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ aurl('logout') }}" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i> {{ trans('admin.logout') }}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ aurl('lock/screen') }}?email={{ admin()->user()->email }}" class="nav-link"><i class="nav-icon fa fa-user-lock"></i> {{ trans('admin.lock_screen') }}</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}


    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      @if(count(L::all()) > 0)
       <!-- Language Dropdown Menu -->
      <li class="nav-item" >
        <a href="{{route('orders.index',['status'=>'under_review'])}}" class="btn btn-success text-white">طلبات جديدة <i class="mr-0 ml-2 far fa-bell move-css"></i></a>
        <a href="{{route('users.index',['id_status'=>'pending'])}}" class="btn btn-warning mx-2">
          تحقيق الهوية
          <span class="badge bg-default" style="padding: 4px 7px; margin-right: 5px;">{{App\Models\User::where('id_status','pending')->count()}}</span>
        </a>
      </li>
      <li class="nav-item  dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-language"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg  languages {{ app('l') == 'ar'?'dropdown-menu-right':'dropdown-menu-left' }}">
          @foreach(L::all() as $l)
            <a href="{{aurl('lang/'.$l)}}" class="dropdown-item">
            <i class="fas fa-language"></i> {{trans('admin.'.$l)}} </a>
        @endforeach
        </div>
      </li>
      <!-- Language Dropdown Menu End-->
      @endif
      <!-- Messages Dropdown Menu -->
      @include('admin.layouts.last_replay_tickets')
      @php
$contact_us_count = App\Models\Contact::where('seen','no')->count();
$contact_us = App\Models\Contact::orderBy('id','DESC')->take(10)->get();
@endphp
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-envelope"></i>
          <span class="badge badge-danger navbar-badge {{ $contact_us_count == 0?'hidden':'' }}">{{ $contact_us_count }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg messages  {{ app('l') == 'ar'?'dropdown-menu-right':'dropdown-menu-left' }}">
          @foreach($contact_us as $contact)
          <a href="{{ aurl('contactus/'.$contact->id) }}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              {{-- <img src="{{ url('assets') }}/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{ $contact->full_name }}
                  <span class="float-right text-sm text-danger"><i class="fa {{ $contact->seen == 'yes'?'fa-check-double':'fa-check' }}"></i></span>
                </h3>
                <p class="text-sm">{{ $contact->title_msg }}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $contact->created_at->diffForHumans() }}</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          @endforeach

          <div cålass="dropdown-divider"></div>
          <a href="{{ aurl('contactus') }}" class="dropdown-item dropdown-footer">{{ trans('admin.see_all_messages') }}</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg notifications {{ app('l') == 'ar'?'dropdown-menu-right':'dropdown-menu-left' }}">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- /.navbar -->
<!-- Main Sidebar Menu Container -->
<aside class="main-sidebar {{ !empty(setting()->theme_setting) && !empty(setting()->theme_setting->sidebar_class)?setting()->theme_setting->sidebar_class:'sidebar-dark-primary' }} elevation-4">
  <!-- Brand Logo -->
  <a href="{{ aurl('/') }}" class="brand-link {{ !empty(setting()->theme_setting) && !empty(setting()->theme_setting->brand_color)?setting()->theme_setting->brand_color:'' }}">
    @if(!empty(setting()->logo))
    <img src="{{ it()->url(setting()->logo) }}" alt="{{ setting()->{l('sitename')} }}" class="brand-image img-circle elevation-3" style="opacity: .8">
    @endif
    <span class="brand-text font-weight-light">{{ setting()->{l('sitename')} }}</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(!empty(admin()->user()->photo_profile))
        <img src="{{ it()->url(admin()->user()->photo_profile) }}" class="img-circle elevation-2" alt="{{ admin()->user()->name }}">
        @else
        <img src="{{ url('assets') }}/img/avatar5.png" class="img-circle elevation-2" alt="{{ admin()->user()->name }}">
        @endif
      </div>
      <div class="info">
        <a href="{{ aurl('account') }}" class="d-block">{{ admin()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
