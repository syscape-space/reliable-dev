@extends('admin.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a>{{!empty($title)?$title:''}}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('orderarbitratorinvoices')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('orderarbitratorinvoices/'.$orderarbitratorinvoices->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('orderarbitratorinvoices/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$orderarbitratorinvoices->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$orderarbitratorinvoices->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$orderarbitratorinvoices->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
               'method' => 'DELETE',
               'route' => ['orderarbitratorinvoices.destroy', $orderarbitratorinvoices->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						 <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				<b>{{trans('admin.id')}} :</b> {{$orderarbitratorinvoices->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.vendor_amount')}} :</b>
				{!! $orderarbitratorinvoices->vendor_amount !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.total_amount')}} :</b>
				{!! $orderarbitratorinvoices->total_amount !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.system_tax')}} :</b>
				{!! $orderarbitratorinvoices->system_tax !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.remaining_amount_to_arbitrator')}} :</b>
				{!! $orderarbitratorinvoices->remaining_amount_to_arbitrator !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.user_amount')}} :</b>
				{!! $orderarbitratorinvoices->user_amount !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.order_id')}} :</b>
				@if(!empty($orderarbitratorinvoices->order_id()->first()))
			{{ $orderarbitratorinvoices->order_id()->first()->order_title }}
			@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.arbitrator_id')}} :</b>
				@if(!empty($orderarbitratorinvoices->arbitrator_id()->first()))
			{{ $orderarbitratorinvoices->arbitrator_id()->first()->name }}
			@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.order_arbitrator_id')}} :</b>
				@if(!empty($orderarbitratorinvoices->order_arbitrator_id()->first()))
			{{ $orderarbitratorinvoices->order_arbitrator_id()->first()->id }}
			@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.vendor_id')}} :</b>
				@if(!empty($orderarbitratorinvoices->vendor_id()->first()))
			{{ $orderarbitratorinvoices->vendor_id()->first()->name }}
			@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.user_id')}} :</b>
				@if(!empty($orderarbitratorinvoices->user_id()->first()))
			{{ $orderarbitratorinvoices->user_id()->first()->name }}
			@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.amount_deduction_from_vendor')}} :</b>
				{{ trans("admin.".$orderarbitratorinvoices->amount_deduction_from_vendor) }}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.amount_deduction_from_user')}} :</b>
				{{ trans("admin.".$orderarbitratorinvoices->amount_deduction_from_user) }}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.inovice_status')}} :</b>
				{{ trans("admin.".$orderarbitratorinvoices->inovice_status) }}
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection