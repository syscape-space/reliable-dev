<div class="row">
	<div class="table-responsive">
		<table class="table table-bordered table-hoverd table-striped">
			<tr>
				<td><small>{{ trans('admin.id') }}</small></td>
				<td><small>{{ trans('admin.offer_id') }}</small></td>
				<td><small>{{ trans('admin.offer_amount') }}</small></td>
				<td><small>{{ trans('admin.system_tax') }}</small></td>
				<td><small>{{ trans('admin.remaining_amount_to_vendor') }}</small></td>
				<td><small>{{ trans('admin.amount_deduction_from_user') }}</small></td>
				<td><small>{{ trans('admin.added_amount_to_vendor_balance') }}</small></td>
				<td><small>{{ trans('admin.added_amount_to_vendor_balance_at') }}</small></td>
				<td><small>{{ trans('admin.inovice_status') }}</small></td>
				<td><small>{{ trans('admin.system_note') }}</small></td>
				<td><small>{{ trans('admin.created_at') }}</small></td>
			</tr>
			@foreach($invoices as $invoice)
			<tr>
				<td><small><a href="{{ aurl('orderofferinvoices/'.$invoice->id) }}" target="_blank">#{{ $invoice->id }}</a></small></td>
				<td><small><a href="{{ aurl('orderoffers/'.$invoice->offer_id) }}" target="_blank">#{{ $invoice->offer_id }}</a></small></td>
				<td><small>{{ number_format($invoice->offer_amount) }}</small></td>
				<td><small>{{ number_format($invoice->system_tax) }}</small></td>
				<td><small>{{ number_format($invoice->remaining_amount_to_vendor) }}</small></td>
				<td><small>{{ trans('admin.'.$invoice->amount_deduction_from_user) }}</small></td>
				<td><small>{{ trans('admin.'.$invoice->added_amount_to_vendor_balance) }}</small></td>
				<td>
					<small>
						<i class="fa fa-clock d-inline"></i> <time class="timeago d-inline" datetime="{{ $invoice->added_amount_to_vendor_balance_at }}" title="{{ $invoice->added_amount_to_vendor_balance_at }}"></time>
					</small>
					</td>
				<td><small>{{ trans('admin.'.$invoice->inovice_status) }}</small></td>
				<td><small>{{ $invoice->system_note }}</small></td>
				<td>
					<small>
						<i class="fa fa-clock d-inline"></i> <time class="timeago d-inline" datetime="{{ $invoice->created_at }}" title="{{ $invoice->created_at }}"></time>
					</small>
					</td>
			</tr>
			@endforeach
		</table>
		{!! $invoices->appends(['tab'=>request('tab')])->render() !!}
	</div>
	<div class="table-responsive">
		@if(!empty($arbitratorInvoices))
		<center>{{ trans('admin.orderarbitratorinvoices') }}</center>
		<table class="table table-bordered table-hoverd table-striped">
			<tr>
				<td><small>{{ trans('admin.id') }}</small></td>
				<td><small>{{ trans('admin.arbitrator_id') }}</small></td>
				<td><small>{{ trans('admin.order_arbitrator_id') }}</small></td>
				{{-- <td><small>{{ trans('admin.vendor_id') }}</small></td>
				<td><small>{{ trans('admin.user_id') }}</small></td> --}}
				<td><small>{{ trans('admin.amount_deduction_from_vendor') }}</small></td>
				<td><small>{{ trans('admin.amount_deduction_from_user') }}</small></td>
				<td><small>{{ trans('admin.vendor_amount') }}</small></td>
				<td><small>{{ trans('admin.user_amount') }}</small></td>
				<td><small>{{ trans('admin.total_amount') }}</small></td>
				<td><small>{{ trans('admin.system_tax') }}</small></td>
				<td><small>{{ trans('admin.remaining_amount_to_arbitrator') }}</small></td>
				<td><small>{{ trans('admin.inovice_status') }}</small></td>
				<td><small>{{ trans('admin.created_at') }}</small></td>
			</tr>
			@foreach($arbitratorInvoices as $arbitratorInvoice)
			<tr>
				<td><small><a href="{{ aurl('orderarbitratorinvoices/'.$arbitratorInvoice->id) }}" target="_blank">#{{ $arbitratorInvoice->id }}</a></small></td>
				<td><small>{{ $arbitratorInvoice->arbitrator_id()->first()->name??'' }}</small></td>
				<td><small>{{ $arbitratorInvoice->order_arbitrator_id }}</small></td>
				{{-- <td><small>{{ $arbitratorInvoice->vendor_id()->first()->name??'' }}</small></td>
				<td><small>{{ $arbitratorInvoice->user_id()->first()->name??'' }}</small></td> --}}
				<td><small>{{ trans('admin.'.$arbitratorInvoice->amount_deduction_from_vendor) }}</small></td>
				<td><small>{{ trans('admin.'.$arbitratorInvoice->amount_deduction_from_user) }}</small></td>
				<td><small>{{ $arbitratorInvoice->vendor_amount }}</small></td>
				<td><small>{{ $arbitratorInvoice->user_amount }}</small></td>
				<td><small>{{ $arbitratorInvoice->total_amount }}</small></td>
				<td><small>{{ $arbitratorInvoice->system_tax }}</small></td>
				<td><small>{{ $arbitratorInvoice->remaining_amount_to_arbitrator }}</small></td>
				<td><small>{{ trans('admin.'.$arbitratorInvoice->inovice_status) }}</small></td>
				<td>
					<small>
						<i class="fa fa-clock d-inline"></i> <time class="timeago d-inline" datetime="{{ $arbitratorInvoice->created_at }}" title="{{ $arbitratorInvoice->created_at }}"></time>
					</small>
					</td>
			</tr>
			@endforeach
		</table>
		{!! $arbitratorInvoices->appends(['tab'=>request('tab')])->render() !!}
		@endif
	</div>

</div>