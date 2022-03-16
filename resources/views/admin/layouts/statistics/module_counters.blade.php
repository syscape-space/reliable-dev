<!--admingroups_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>{{ App\Models\AdminGroup::count() }}</h3>
      <p>العملاء</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a href="{{ aurl('admingroups') }}" class="small-box-footer">العملاء <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--admingroups_end-->
<!--admins_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>{{ App\Models\Admin::count() }}</h3>
      <p> المشرفين</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a href="{{ aurl('admins') }}" class="small-box-footer"> المشرفين <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--admins_end-->
<!--occupations_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\Occupation::count()) }}</h3>
      <p>{{ trans("admin.occupations") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-user-tie"></i>
    </div>
    <a href="{{ aurl("occupations") }}" class="small-box-footer">{{ trans("admin.occupations") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--occupations_end-->
<!--specialties_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\Specialtie::count()) }}</h3>
      <p>{{ trans("admin.specialties") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-user-tag"></i>
    </div>
    <a href="{{ aurl("specialties") }}" class="small-box-footer">{{ trans("admin.specialties") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--specialties_end-->
<!--countries_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\Country::count()) }}</h3>
      <p>{{ trans("admin.countries") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-globe-africa"></i>
    </div>
    <a href="{{ aurl("countries") }}" class="small-box-footer">{{ trans("admin.countries") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--countries_end-->
<!--cities_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\City::count()) }}</h3>
      <p>{{ trans("admin.cities") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-flag"></i>
    </div>
    <a href="{{ aurl("cities") }}" class="small-box-footer">{{ trans("admin.cities") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--cities_end-->
<!--socials_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\Social::count()) }}</h3>
      <p>{{ trans("admin.socials") }}</p>
    </div>
    <div class="icon">
      <i class="fab fa-twitter"></i>
    </div>
    <a href="{{ aurl("socials") }}" class="small-box-footer">{{ trans("admin.socials") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--socials_end-->
<!--pages_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\Page::count()) }}</h3>
      <p>{{ trans("admin.pages") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-file-alt"></i>
    </div>
    <a href="{{ aurl("pages") }}" class="small-box-footer">{{ trans("admin.pages") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--pages_end-->
<!--userlicenses_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\UserLicense::count()) }}</h3>
      <p>{{ trans("admin.userlicenses") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-address-card"></i>
    </div>
    <a href="{{ aurl("userlicenses") }}" class="small-box-footer">{{ trans("admin.userlicenses") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--userlicenses_end-->
<!--userexperiences_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\UserExperience::count()) }}</h3>
      <p>{{ trans("admin.userexperiences") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-file-alt"></i>
    </div>
    <a href="{{ aurl("userexperiences") }}" class="small-box-footer">{{ trans("admin.userexperiences") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--userexperiences_end-->
<!--userqualifications_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\UserQualification::count()) }}</h3>
      <p>{{ trans("admin.userqualifications") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-certificate"></i>
    </div>
    <a href="{{ aurl("userqualifications") }}" class="small-box-footer">{{ trans("admin.userqualifications") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--userqualifications_end-->
<!--usercommercials_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\UserCommercial::count()) }}</h3>
      <p>{{ trans("admin.usercommercials") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-receipt"></i>
    </div>
    <a href="{{ aurl("usercommercials") }}" class="small-box-footer">{{ trans("admin.usercommercials") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--usercommercials_end-->
<!--subscriptionfees_start-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ mK(App\Models\SubscriptionFee::count()) }}</h3>
      <p>{{ trans("admin.subscriptionfees") }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-icons"></i>
    </div>
    <a href="{{ aurl("subscriptionfees") }}" class="small-box-footer">{{ trans("admin.subscriptionfees") }} <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!--subscriptionfees_end-->
<!--faqs_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\FAQ::count()) }}</h3>
        <p>{{ trans("admin.faqs") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-question-circle"></i>
      </div>
      <a href="{{ aurl("faqs") }}" class="small-box-footer">{{ trans("admin.faqs") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--faqs_end-->
<!--ticketdepartments_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\TicketDepartment::count()) }}</h3>
        <p>{{ trans("admin.ticketdepartments") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-sticky-note"></i>
      </div>
      <a href="{{ aurl("ticketdepartments") }}" class="small-box-footer">{{ trans("admin.ticketdepartments") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--ticketdepartments_end-->
<!--tickets_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Ticket::count()) }}</h3>
        <p>{{ trans("admin.tickets") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-ticket-alt"></i>
      </div>
      <a href="{{ aurl("tickets") }}" class="small-box-footer">{{ trans("admin.tickets") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--tickets_end-->
<!--vendorpackages_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\VendorPackage::count()) }}</h3>
        <p>{{ trans("admin.vendorpackages") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-boxes"></i>
      </div>
      <a href="{{ aurl("vendorpackages") }}" class="small-box-footer">{{ trans("admin.vendorpackages") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--vendorpackages_end-->
<!--packagerequests_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\PackageRequest::count()) }}</h3>
        <p>{{ trans("admin.packagerequests") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="{{ aurl("packagerequests") }}" class="small-box-footer">{{ trans("admin.packagerequests") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--packagerequests_end-->
<!--orders_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Order::count()) }}</h3>
        <p>{{ trans("admin.orders") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-luggage-cart"></i>
      </div>
      <a href="{{ aurl("orders") }}" class="small-box-footer">{{ trans("admin.orders") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--orders_end-->
<!--ordertypes_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\OrderType::count()) }}</h3>
        <p>{{ trans("admin.ordertypes") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-layer-group"></i>
      </div>
      <a href="{{ aurl("ordertypes") }}" class="small-box-footer">{{ trans("admin.ordertypes") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--ordertypes_end-->
<!--userjobs_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\UserJob::count()) }}</h3>
        <p>{{ trans("admin.userjobs") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-user-tie"></i>
      </div>
      <a href="{{ aurl("userjobs") }}" class="small-box-footer">{{ trans("admin.userjobs") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--userjobs_end-->
<!--orderoffers_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\OrderOffer::count()) }}</h3>
        <p>{{ trans("admin.orderoffers") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-gifts"></i>
      </div>
      <a href="{{ aurl("orderoffers") }}" class="small-box-footer">{{ trans("admin.orderoffers") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--orderoffers_end-->
<!--orderofferinvoices_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\OrderOfferInvoice::count()) }}</h3>
        <p>{{ trans("admin.orderofferinvoices") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-file-invoice"></i>
      </div>
      <a href="{{ aurl("orderofferinvoices") }}" class="small-box-footer">{{ trans("admin.orderofferinvoices") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--orderofferinvoices_end-->
<!--orderarbitrators_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\OrderArbitrator::count()) }}</h3>
        <p>{{ trans("admin.orderarbitrators") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-house-user"></i>
      </div>
      <a href="{{ aurl("orderarbitrators") }}" class="small-box-footer">{{ trans("admin.orderarbitrators") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--orderarbitrators_end-->
<!--orderarbitratorinvoices_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\OrderArbitratorInvoice::count()) }}</h3>
        <p>{{ trans("admin.orderarbitratorinvoices") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-file-invoice"></i>
      </div>
      <a href="{{ aurl("orderarbitratorinvoices") }}" class="small-box-footer">{{ trans("admin.orderarbitratorinvoices") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--orderarbitratorinvoices_end-->
<!--systemmessages_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\SystemMessage::count()) }}</h3>
        <p>{{ trans("admin.systemmessages") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-comment"></i>
      </div>
      <a href="{{ aurl("systemmessages") }}" class="small-box-footer">{{ trans("admin.systemmessages") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--systemmessages_end-->
<!--balancerecharges_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\BalanceRecharge::count()) }}</h3>
        <p>{{ trans("admin.balancerecharges") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-money-check-alt"></i>
      </div>
      <a href="{{ aurl("balancerecharges") }}" class="small-box-footer">{{ trans("admin.balancerecharges") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--balancerecharges_end-->
<!--balancewithdrawals_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\BalanceWithdrawal::count()) }}</h3>
        <p>{{ trans("admin.balancewithdrawals") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-credit-card"></i>
      </div>
      <a href="{{ aurl("balancewithdrawals") }}" class="small-box-footer">{{ trans("admin.balancewithdrawals") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--balancewithdrawals_end-->
