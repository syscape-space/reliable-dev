<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="tabbable" id="tabs-479715">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link {{ empty(request('tab')) || request('tab') == 'offers'?'active':'' }}" href="{{ url()->current() }}?tab=offers"><i class="fa fa-gifts"></i>
					<span class="badge badge-danger">{{ $orders->offers()->count() }}</span> {{ trans('admin.offers') }}</a>
				</li>
			<li class="nav-item">
				<a class="nav-link {{ request('tab') == 'accept_offer'?'active':'' }}" href="{{ url()->current() }}?tab=accept_offer"><i class="fa fa-gifts"></i>
					<span class="badge badge-danger">{{ $orders->offers()->where('offer_status','approved')->count() }}</span> {{ trans('admin.accept_offer') }}</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ request('tab') == 'invoice'?'active':'' }}" href="{{ url()->current() }}?tab=invoice"><i class="fa fa-file-invoice"></i>
						<span class="badge badge-danger">{{ $orders->invoices()->count() }}</span>
					{{ trans('admin.invoices') }}</a>
				</li>
				{{-- <li class="nav-item">
					<a class="nav-link {{ request('tab') == 'arbitrations'?'active':'' }}" href="{{ url()->current() }}?tab=arbitrations"><i class="fa fa-users"></i> {{ trans('admin.arbitrations') }}</a>
				</li> --}}
				<li class="nav-item">
					<a class="nav-link {{ request('tab') == 'arbitration_decisions'?'active':'' }}" href="{{ url()->current() }}?tab=arbitration_decisions"><i class="fa fa-user-shield"></i>
						<span class="badge badge-danger">{{ $orders->arbitratorInvoices()->count() }}</span>
					{{ trans('admin.arbitration_decisions') }}</a>
				</li>
			<li class="nav-item">
					<a class="nav-link {{ request('tab') == 'negotiations'?'active':'' }}" href="{{ url()->current() }}?tab=negotiations"><i class="fa fa-user-shield"></i>
					المفاوضات | المناقشة</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active">
					@if(empty(request('tab')) || request('tab') == 'offers' || request('tab') == 'accept_offer')
					 @include('admin.orders.showOrderTabs.offers')
					@elseif(request('tab') == 'invoice')
					 @include('admin.orders.showOrderTabs.invoices')
					@elseif(request('tab') == 'arbitrations')
					 @include('admin.orders.showOrderTabs.arbitrations')
					@elseif(request('tab') == 'arbitration_decisions')
					 @include('admin.orders.showOrderTabs.arbitration_decisions')
					@elseif(request('tab') == 'negotiations')
					 @include('admin.orders.showOrderTabs.negotiations')
					@endif
				</div>
			</div>
		</div>
	</div>