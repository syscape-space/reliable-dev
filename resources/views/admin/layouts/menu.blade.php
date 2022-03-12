<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
  <a href="{{ aurl('') }}" class="nav-link {{ active_link(null,'active') }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      {{ trans('admin.dashboard') }}
    </p>
  </a>
</li>
@if(admin()->user()->role("countries_show") || admin()->user()->role("pages_show")
|| admin()->user()->role("socials_show")
|| admin()->user()->role("cities_show") || admin()->user()->role('settings_show') || admin()->user()->role("occupations_show")  || admin()->user()->role("specialties_show") ||
admin()->user()->role("systemmessages_show"))
<li class="nav-item {{active_link('settings|ordertypes|countries|pages|socials|cities|occupations|specialties|systemmessages','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('settings|ordertypes|countries|pages|socials|cities|occupations|specialties|systemmessages','active')}}">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      {{trans('admin.settings')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    @if(admin()->user()->role('settings_show'))
    <li class="nav-item">
      <a href="{{aurl('settings')}}" class="nav-link  {{empty(request('type'))?active_link('settings','active'):''}}">
        <i class="fa fa-tachometer-alt nav-icon"></i>
        <p>{{trans('admin.home_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=account_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'account_settings'?'active':'' }}
        ">
        <i class="fa fa-users nav-icon"></i>
        <p>{{trans('admin.account_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=subscription_fee_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'subscription_fee_settings'?'active':'' }}
        ">
        <i class="fa fa-money-check nav-icon"></i>
        <p>{{trans('admin.subscription_fee_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=orders_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'orders_settings'?'active':'' }}
        ">
        <i class="fab fa-wpforms nav-icon"></i>
        <p>{{trans('admin.orders_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=reviews_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'reviews_settings'?'active':'' }}
        ">
        <i class="fa fa-star-half-alt nav-icon"></i>
        <p>{{trans('admin.reviews_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=payment_methods_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'payment_methods_settings'?'active':'' }}
        ">
        <i class="fab fa-cc-visa nav-icon"></i>
        <p>{{trans('admin.payment_methods_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=contract_formats_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'contract_formats_settings'?'active':'' }}
        ">
        <i class="fa fa-file-contract nav-icon"></i>
        <p>{{trans('admin.contract_formats_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=attached_files_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'attached_files_settings'?'active':'' }}
        ">
        <i class="fa fa-file-upload nav-icon"></i>
        <p>{{trans('admin.attached_files_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=terms_and_conditions_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'terms_and_conditions_settings'?'active':'' }}
        ">
        <i class="fa fa-align-right nav-icon"></i>
        <p>{{trans('admin.terms_and_conditions_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=iam_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'iam_settings'?'active':'' }}
        ">
        <i class="fa fa-torii-gate nav-icon"></i>
        <p>{{trans('admin.iam_settings')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{aurl('settings')}}?type=sms_settings" class="nav-link
        {{ request()->segment(2) == 'settings' && request('type') == 'sms_settings'?'active':'' }}
        ">
        <i class="fa fa-sms nav-icon"></i>
        <p>{{trans('admin.sms_settings')}} </p>
      </a>
    </li>
    @endif
    <!--systemmessages_start_route-->
@if(admin()->user()->role("systemmessages_show"))
<li class="nav-item {{active_link('systemmessages','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('systemmessages','active')}}">
    <i class="nav-icon fa fa-comment"></i>
    <p>
      {{trans('admin.systemmessages')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('systemmessages')}}" class="nav-link  {{active_link('systemmessages','active')}}">
        <i class="fa fa-comment nav-icon"></i>
        <p>{{trans('admin.systemmessages')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('systemmessages/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--systemmessages_end_route-->
    <!--occupations_start_route-->
    @if(admin()->user()->role("occupations_show"))
    <li class="nav-item {{active_link('occupations','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('occupations','active')}}">
        <i class="nav-icon fa fa-user-tie"></i>
        <p>
          {{trans('admin.occupations')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('occupations')}}" class="nav-link  {{active_link('occupations','active')}}">
            <i class="fa fa-user-tie nav-icon"></i>
            <p>{{trans('admin.occupations')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('occupations/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--occupations_end_route-->
    <!--specialties_start_route-->
    @if(admin()->user()->role("specialties_show"))
    <li class="nav-item {{active_link('specialties','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('specialties','active')}}">
        <i class="nav-icon fa fa-user-tag"></i>
        <p>
          {{trans('admin.specialties')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('specialties')}}" class="nav-link  {{active_link('specialties','active')}}">
            <i class="fa fa-user-tag nav-icon"></i>
            <p>{{trans('admin.specialties')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('specialties/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--specialties_end_route-->
    <!--countries_start_route-->
    @if(admin()->user()->role("countries_show"))
    <li class="nav-item {{active_link('countries','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('countries','active')}}">
        <i class="nav-icon fa fa-globe-africa"></i>
        <p>
          {{trans('admin.countries')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('countries')}}" class="nav-link  {{active_link('countries','active')}}">
            <i class="fa fa-globe-africa nav-icon"></i>
            <p>{{trans('admin.countries')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('countries/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--countries_end_route-->
    <!--cities_start_route-->
    @if(admin()->user()->role("cities_show"))
    <li class="nav-item {{active_link('cities','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('cities','active')}}">
        <i class="nav-icon fa fa-flag"></i>
        <p>
          {{trans('admin.cities')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('cities')}}" class="nav-link  {{active_link('cities','active')}}">
            <i class="fa fa-flag nav-icon"></i>
            <p>{{trans('admin.cities')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('cities/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--cities_end_route-->
    <!--socials_start_route-->
    @if(admin()->user()->role("socials_show"))
    <li class="nav-item {{active_link('socials','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('socials','active')}}">
        <i class="nav-icon fab fa-twitter"></i>
        <p>
          {{trans('admin.socials')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('socials')}}" class="nav-link  {{active_link('socials','active')}}">
            <i class="fab fa-twitter nav-icon"></i>
            <p>{{trans('admin.socials')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('socials/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--socials_end_route-->
    <!--pages_start_route-->
    @if(admin()->user()->role("pages_show"))
    <li class="nav-item {{active_link('pages','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('pages','active')}}">
        <i class="nav-icon fa fa-file-alt"></i>
        <p>
          {{trans('admin.pages')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('pages')}}" class="nav-link  {{active_link('pages','active')}}">
            <i class="fa fa-file-alt nav-icon"></i>
            <p>{{trans('admin.pages')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('pages/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--pages_end_route-->
    <!--ordertypes_start_route-->
@if(admin()->user()->role("ordertypes_show"))
<li class="nav-item {{active_link('ordertypes','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('ordertypes','active')}}">
    <i class="nav-icon fa fa-layer-group"></i>
    <p>
      {{trans('admin.ordertypes')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('ordertypes')}}" class="nav-link  {{active_link('ordertypes','active')}}">
        <i class="fa fa-layer-group nav-icon"></i>
        <p>{{trans('admin.ordertypes')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('ordertypes/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--ordertypes_end_route-->
  </ul>
</li>
@endif

<!--orders_start_route-->
@if(admin()->user()->role("orders_show") || admin()->user()->role("orderarbitratorinvoices_show") || admin()->user()->role("orderarbitrators_show") || admin()->user()->role("orderofferinvoices_show") || admin()->user()->role("orderoffers_show"))
<li class="nav-item {{active_link('orders|orderarbitratorinvoices|orderarbitrators|orderofferinvoices|orderoffers','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('orders|orderarbitratorinvoices|orderarbitrators|orderofferinvoices|orderoffers','active')}}">
    <i class="nav-icon fa fa-luggage-cart"></i>
    <p>
      {{trans('admin.orders')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('orders')}}" class="nav-link  {{active_link('orders','active')}}">
        <i class="fa fa-luggage-cart nav-icon"></i>
        <p>{{trans('admin.orders')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('orders/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>




    <!--orderoffers_start_route-->
@if(admin()->user()->role("orderoffers_show"))
<li class="nav-item {{active_link('orderoffers','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('orderoffers','active')}}">
    <i class="nav-icon fa fa-gifts"></i>
    <p>
      {{trans('admin.orderoffers')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('orderoffers')}}" class="nav-link  {{active_link('orderoffers','active')}}">
        <i class="fa fa-gifts nav-icon"></i>
        <p>{{trans('admin.orderoffers')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('orderoffers/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--orderoffers_end_route-->


<!--orderofferinvoices_start_route-->
@if(admin()->user()->role("orderofferinvoices_show"))
<li class="nav-item {{active_link('orderofferinvoices','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('orderofferinvoices','active')}}">
    <i class="nav-icon fa fa-file-invoice"></i>
    <p>
      {{trans('admin.orderofferinvoices')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('orderofferinvoices')}}" class="nav-link  {{active_link('orderofferinvoices','active')}}">
        <i class="fa fa-file-invoice nav-icon"></i>
        <p>{{trans('admin.orderofferinvoices')}} </p>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a href="{{ aurl('orderofferinvoices/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li> --}}
  </ul>
</li>
@endif
<!--orderofferinvoices_end_route-->

<!--orderarbitrators_start_route-->
@if(admin()->user()->role("orderarbitrators_show"))
<li class="nav-item {{active_link('orderarbitrators','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('orderarbitrators','active')}}">
    <i class="nav-icon fa fa-house-user"></i>
    <p>
      {{trans('admin.orderarbitrators')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('orderarbitrators')}}" class="nav-link  {{active_link('orderarbitrators','active')}}">
        <i class="fa fa-house-user nav-icon"></i>
        <p>{{trans('admin.orderarbitrators')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('orderarbitrators/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--orderarbitrators_end_route-->
<!--orderarbitratorinvoices_start_route-->
@if(admin()->user()->role("orderarbitratorinvoices_show"))
<li class="nav-item {{active_link('orderarbitratorinvoices','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('orderarbitratorinvoices','active')}}">
    <i class="nav-icon fa fa-file-invoice"></i>
    <p>
      {{trans('admin.orderarbitratorinvoices')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('orderarbitratorinvoices')}}" class="nav-link  {{active_link('orderarbitratorinvoices','active')}}">
        <i class="fa fa-file-invoice nav-icon"></i>
        <p>{{trans('admin.orderarbitratorinvoices')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('orderarbitratorinvoices/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--orderarbitratorinvoices_end_route-->

  </ul>
</li>
@endif
<!--orders_end_route-->





<!--balancerecharges_start_route-->
@if(admin()->user()->role("balancerecharges_show"))
<li class="nav-item {{active_link('balancerecharges','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('balancerecharges','active')}}">
    <i class="nav-icon fa fa-money-check-alt"></i>
    <p>
      {{trans('admin.balancerecharges')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('balancerecharges')}}" class="nav-link  {{active_link('balancerecharges','active')}}">
        <i class="fa fa-money-check-alt nav-icon"></i>
        <p>{{trans('admin.balancerecharges')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('balancerecharges/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--balancerecharges_end_route-->

<!--balancewithdrawals_start_route-->
@if(admin()->user()->role("balancewithdrawals_show"))
<li class="nav-item {{active_link('balancewithdrawals','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('balancewithdrawals','active')}}">
    <i class="nav-icon fa fa-credit-card"></i>
    <p>
      {{trans('admin.balancewithdrawals')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('balancewithdrawals')}}" class="nav-link  {{active_link('balancewithdrawals','active')}}">
        <i class="fa fa-credit-card nav-icon"></i>
        <p>{{trans('admin.balancewithdrawals')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('balancewithdrawals/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--balancewithdrawals_end_route-->



@if(admin()->user()->role("admins_show"))
<li class="nav-item {{ active_link('admins','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admins','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admins')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admins')}}" class="nav-link {{ active_link('admins','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admins')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admins/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
@if(admin()->user()->role("admingroups_show"))
<li class="nav-item {{ active_link('admingroups','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admingroups','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admingroups')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admingroups')}}" class="nav-link {{ active_link('admingroups','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admingroups')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admingroups/create') }}" class="nav-link ">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--subscriptionfees_start_route-->
@if(admin()->user()->role("subscriptionfees_show"))
<li class="nav-item {{active_link('subscriptionfees','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('subscriptionfees','active')}}">
    <i class="nav-icon fa fa-file-invoice-dollar"></i>
    <p>
      {{trans('admin.subscriptionfees')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('subscriptionfees')}}" class="nav-link  {{active_link('subscriptionfees','active')}}">
        <i class="fa fa-file-invoice-dollar nav-icon"></i>
        <p>{{trans('admin.subscriptionfees')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--subscriptionfees_end_route-->
@if(admin()->user()->role("usercommercials_show") || admin()->user()->role("userlicenses_show") || admin()->user()->role("userexperiences_show") || admin()->user()->role("userqualifications_show"))
<li class="nav-item {{active_link('usercommercials|userlicenses|userexperiences|userqualifications','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('usercommercials|userlicenses|userexperiences|userqualifications','active')}}">
    <i class="nav-icon fa fa-house-user"></i>
    <p>
      {{trans('admin.vendor_setting')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <!--usercommercials_start_route-->
    @if(admin()->user()->role("usercommercials_show"))
    <li class="nav-item {{active_link('usercommercials','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('usercommercials','active')}}">
        <i class="nav-icon fa fa-receipt"></i>
        <p>
          {{trans('admin.usercommercials')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('usercommercials')}}" class="nav-link  {{active_link('usercommercials','active')}}">
            <i class="fa fa-receipt nav-icon"></i>
            <p>{{trans('admin.usercommercials')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('usercommercials/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--usercommercials_end_route-->
    <!--userlicenses_start_route-->
    @if(admin()->user()->role("userlicenses_show"))
    <li class="nav-item {{active_link('userlicenses','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('userlicenses','active')}}">
        <i class="nav-icon fa fa-address-card"></i>
        <p>
          {{trans('admin.userlicenses')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('userlicenses')}}" class="nav-link  {{active_link('userlicenses','active')}}">
            <i class="fa fa-address-card nav-icon"></i>
            <p>{{trans('admin.userlicenses')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('userlicenses/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--userlicenses_end_route-->
    <!--userexperiences_start_route-->
    @if(admin()->user()->role("userexperiences_show"))
    <li class="nav-item {{active_link('userexperiences','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('userexperiences','active')}}">
        <i class="nav-icon fa fa-file-alt"></i>
        <p>
          {{trans('admin.userexperiences')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('userexperiences')}}" class="nav-link  {{active_link('userexperiences','active')}}">
            <i class="fa fa-file-alt nav-icon"></i>
            <p>{{trans('admin.userexperiences')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('userexperiences/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--userexperiences_end_route-->
    <!--userqualifications_start_route-->
    @if(admin()->user()->role("userqualifications_show"))
    <li class="nav-item {{active_link('userqualifications','menu-open')}} ">
      <a href="#" class="nav-link {{active_link('userqualifications','active')}}">
        <i class="nav-icon fa fa-certificate"></i>
        <p>
          {{trans('admin.userqualifications')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('userqualifications')}}" class="nav-link  {{active_link('userqualifications','active')}}">
            <i class="fa fa-certificate nav-icon"></i>
            <p>{{trans('admin.userqualifications')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('userqualifications/create') }}" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.create')}} </p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <!--userqualifications_end_route-->
  </ul>
</li>
@endif
<!--faqs_start_route-->
@if(admin()->user()->role("faqs_show"))
<li class="nav-item {{active_link('faqs','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('faqs','active')}}">
    <i class="nav-icon fa fa-question-circle"></i>
    <p>
      {{trans('admin.faqs')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('faqs')}}" class="nav-link  {{active_link('faqs','active')}}">
        <i class="fa fa-question-circle nav-icon"></i>
        <p>{{trans('admin.faqs')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('faqs/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--faqs_end_route-->
<!--departments_start_route-->
@if(admin()->user()->role("departments_show"))
<li class="nav-item {{active_link('departments','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('departments','active')}}">
    <i class="nav-icon fa fa-list"></i>
    <p>
      {{trans('admin.departments')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('departments')}}" class="nav-link  {{active_link('departments','active')}}">
        <i class="fa fa-list nav-icon"></i>
        <p>{{trans('admin.departments')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('departments/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--faqs_end_route-->
<!--ticketdepartments_start_route-->
@if(admin()->user()->role("ticketdepartments_show"))
<li class="nav-item {{active_link('ticketdepartments','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('ticketdepartments','active')}}">
    <i class="nav-icon fa fa-sticky-note"></i>
    <p>
      {{trans('admin.ticketdepartments')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('ticketdepartments')}}" class="nav-link  {{active_link('ticketdepartments','active')}}">
        <i class="fa fa-sticky-note nav-icon"></i>
        <p>{{trans('admin.ticketdepartments')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('ticketdepartments/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--ticketdepartments_end_route-->
<!--tickets_start_route-->
@if(admin()->user()->role("tickets_show"))
<li class="nav-item {{active_link('tickets','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('tickets','active')}}">
    <i class="nav-icon fa fa-ticket-alt"></i>
    <p>
      {{trans('admin.tickets')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('tickets')}}" class="nav-link  {{active_link('tickets','active')}}">
        <i class="fa fa-ticket-alt nav-icon"></i>
        <p>{{trans('admin.tickets')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('tickets/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--tickets_end_route-->
<!--users_start_route-->
@if(admin()->user()->role("users_show"))
<li class="nav-item {{active_link('users','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('users','active')}}">
    <i class="nav-icon fa fa-users"></i>
    <p>
      {{trans('admin.users')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item  {{ in_array(request('membership_type'),['vendor','employee'])?'menu-open':'' }} ">
      <a href="#" class="nav-link {{in_array(request('membership_type'),['vendor','employee'])?'active':''}}">
        <i class="nav-icon fa fa-users"></i>
        <p>
          {{trans('admin.vendors')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('users')}}?membership_type=vendor" class="nav-link  {{ request('membership_type') == 'vendor' && empty(request('account_type')) ?'active':'' }}">
            <i class="fa fa-users nav-icon"></i>
            <p>{{trans('admin.all')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{aurl('users')}}?membership_type=vendor&account_type=company" class="nav-link  {{ request('membership_type') == 'vendor' && request('account_type') == 'company'?'active':'' }}">
            <i class="fa fa-users nav-icon"></i>
            <p>{{trans('admin.company')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{aurl('users')}}?membership_type=vendor&account_type=individual" class="nav-link  {{ request('membership_type') == 'vendor' && request('account_type') == 'individual'?'active':'' }}">
            <i class="fa fa-users nav-icon"></i>
            <p>{{trans('admin.individual')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{aurl('users')}}?membership_type=employee&account_type=individual" class="nav-link {{ request('membership_type') == 'employee' && request('account_type') == 'individual'?'active':'' }}">
            <i class="fa fa-users nav-icon"></i>
            <p>{{trans('admin.employee')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('users/create') }}?membership_type=employee" class="nav-link {{ request('membership_type') == 'employee'?'active':'' }}">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.add_employee')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('users/create') }}?membership_type=vendor" class="nav-link {{ request('membership_type') == 'vendor'?'active':'' }}">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.add_vendor')}} </p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item  {{ in_array(request('membership_type'),['user'])?'menu-open':'' }} ">
      <a href="#" class="nav-link {{in_array(request('membership_type'),['user'])?'active':''}}">
        <i class="nav-icon fa fa-users"></i>
        <p>
          {{trans('admin.users_')}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{aurl('users')}}?membership_type=user" class="nav-link  {{ request('membership_type') == 'user' && empty(request('account_type')) ?'active':'' }}">
            <i class="fa fa-users nav-icon"></i>
            <p>{{trans('admin.all')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{aurl('users')}}?membership_type=user&account_type=company" class="nav-link  {{ request('membership_type') == 'user' && request('account_type') == 'company'?'active':'' }}">
            <i class="fa fa-users nav-icon"></i>
            <p>{{trans('admin.company')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{aurl('users')}}?membership_type=user&account_type=individual" class="nav-link  {{ request('membership_type') == 'user' && request('account_type') == 'individual'?'active':'' }}">
            <i class="fa fa-users nav-icon"></i>
            <p>{{trans('admin.individual')}} </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ aurl('users/create') }}?membership_type=user" class="nav-link {{ request()->segment(3) == 'create'&&  request('membership_type') == 'user'?'active':'' }}">
            <i class="fas fa-plus nav-icon"></i>
            <p>{{trans('admin.add_user')}} </p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</li>
@endif
<!--vendorpackages_start_route-->
@if(admin()->user()->role("vendorpackages_show"))
<li class="nav-item {{active_link('vendorpackages','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('vendorpackages','active')}}">
    <i class="nav-icon fa fa-boxes"></i>
    <p>
      {{trans('admin.vendorpackages')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('vendorpackages')}}" class="nav-link  {{active_link('vendorpackages','active')}}">
        <i class="fa fa-boxes nav-icon"></i>
        <p>{{trans('admin.vendorpackages')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('vendorpackages/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--vendorpackages_end_route-->
<!--packagerequests_start_route-->
@if(admin()->user()->role("packagerequests_show"))
<li class="nav-item {{active_link('packagerequests','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('packagerequests','active')}}">
    <i class="nav-icon fa fa-shopping-cart"></i>
    <p>
      {{trans('admin.packagerequests')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('packagerequests')}}" class="nav-link  {{active_link('packagerequests','active')}}">
        <i class="fa fa-shopping-cart nav-icon"></i>
        <p>{{trans('admin.packagerequests')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('packagerequests/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--packagerequests_end_route-->
<!--contactus_start_route-->
@if(admin()->user()->role("contactus_show"))
<li class="nav-item {{active_link('contactus','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('contactus','active')}}">
    <i class="nav-icon fa fa-globe"></i>
    <p>
      {{trans('admin.contactus')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('contactus')}}" class="nav-link  {{active_link('contactus','active')}}">
        <i class="fa fa-globe nav-icon"></i>
        <p>{{trans('admin.contactus')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--contactus_end_route-->

<!--userjobs_start_route-->
@if(admin()->user()->role("userjobs_show"))
<li class="nav-item {{active_link('userjobs','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('userjobs','active')}}">
    <i class="nav-icon fa fa-user-tie"></i>
    <p>
      {{trans('admin.userjobs')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('userjobs')}}" class="nav-link  {{active_link('userjobs','active')}}">
        <i class="fa fa-user-tie nav-icon"></i>
        <p>{{trans('admin.userjobs')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('userjobs/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--userjobs_end_route-->

<!--userjobs_start_route-->
<li class="nav-item {{active_link('supportmessages','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('userjobs','active')}}">
    <i class="nav-icon fa fa-user-tie"></i>
    <p>
      {{trans('admin.support_messages')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  {{-- Support Messages --}}
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('supportmessages')}}" class="nav-link  {{active_link('supportmessages','active')}}">
        <i class="fa fa-user-tie nav-icon"></i>
        <p>{{trans('admin.support_messages')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('supportmessages/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
  {{-- ./Support Messages --}}
</li>
<!--userjobs_end_route-->

<!--userjobs_start_route-->
<li class="nav-item {{active_link('careers','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('userjobs','active')}}">
    <i class="nav-icon fa fa-user-tie"></i>
    <p>
      {{trans('admin.careers')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  {{-- Support Messages --}}
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('careers')}}" class="nav-link  {{active_link('careers','active')}}">
        <i class="fa fa-user-tie nav-icon"></i>
        <p>{{trans('admin.careers')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('careers/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
  {{-- ./Support Messages --}}
</li>
<!--userjobs_end_route-->

<!--userjobs_start_route-->
<li class="nav-item {{active_link('partners','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('partners','active')}}">
    <i class="nav-icon fa fa-user-tie"></i>
    <p>
      {{trans('admin.partners')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  {{-- Support Messages --}}
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('partners')}}" class="nav-link  {{active_link('partners','active')}}">
        <i class="fa fa-user-tie nav-icon"></i>
        <p>{{trans('admin.partners')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('partners/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
  {{-- ./Support Messages --}}
</li>
<li class="nav-item {{active_link('our_services','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('our_services','active')}}">
    <i class="nav-icon fa fa-user-tie"></i>
    <p>
      {{trans('admin.our_services')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('our_services')}}" class="nav-link  {{active_link('our_services','active')}}">
        <i class="fa fa-user-tie nav-icon"></i>
        <p>{{trans('admin.our_services')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('our_services/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>

