<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="tabbable" id="tabs-479715">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link {{ empty(request('tab')) || request('tab') == 'offers'?'active':'' }}" href="{{ url()->current() }}?tab=offers"><i class="fa fa-gifts"></i> <span class="badge badge-danger">{{ $orders->offers()->count() }}</span> {{ trans('admin.offers') }}</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ request('tab') == 'invoice'?'active':'' }}" href="{{ url()->current() }}?tab=invoice"><i class="fa fa-file-invoice"></i> {{ trans('admin.invoices') }}</a>
			</li>

			<li class="nav-item">
				<a class="nav-link {{ request('tab') == 'arbitration_decisions'?'active':'' }}" href="{{ url()->current() }}?tab=arbitration_decisions"><i class="fa fa-user-shield"></i> {{ trans('admin.arbitration_decisions') }}</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane {{ empty(request('tab')) || request('tab') == 'offers'?'active':'' }}">
				@include('admin.orders.tabs.offers')
			</div>
			<div class="tab-pane {{ request('tab') == 'invoice'?'active':'' }}">
				<p>
					Howdy, I'm in Section 2.
				</p>
			</div>
			<div class="tab-pane {{ request('tab') == 'arbitration_decisions'?'active':'' }}">
				<p>
					Howdy, I'm in Section 3.
				</p>
			</div>
		</div>
	</div>
</div>