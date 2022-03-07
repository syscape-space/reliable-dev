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
				<a href="{{aurl('balancerecharges')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('balancerecharges/'.$balancerecharges->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('balancerecharges/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$balancerecharges->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$balancerecharges->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$balancerecharges->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
               'method' => 'DELETE',
               'route' => ['balancerecharges.destroy', $balancerecharges->id]
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
				<b>{{trans('admin.id')}} :</b> {{$balancerecharges->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			@if(!empty($balancerecharges->admin_id()->first()))
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<b>{{trans('admin.admin_id')}} :</b>
				{{ $balancerecharges->admin_id()->first()->name }}
			</div>
			@endif
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.amount')}} :</b>
				{!! $balancerecharges->amount !!}
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.operation_number')}} :</b>
				{!! $balancerecharges->operation_number !!}
			</div>
			@if($balancerecharges->charge_by == 'bank_transfer')
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.transfer_name')}} :</b>
				{!! $balancerecharges->transfer_name !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.bank_name')}} :</b>
				{!! $balancerecharges->bank_name !!}
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<b>{{trans('admin.user_note')}} :</b>
				{!! $balancerecharges->user_note !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.transfer_image')}} :</b>
				@include("admin.show_image",["image"=>$balancerecharges->transfer_image])
			</div>
			@endif
			@if($balancerecharges->charge_status == 'rejected')
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<b>{{trans('admin.reason')}} :</b>
				{!! $balancerecharges->reason !!}
			</div>
			@endif

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.user_id')}} :</b>
				@if(!empty($balancerecharges->user_id()->first()))
			<a href="{{ aurl('users/'.$balancerecharges->user_id) }}" target="_blank">{{ $balancerecharges->user_id()->first()->name }}</a>
			@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.charge_by')}} :</b>
				{{ trans("admin.".$balancerecharges->charge_by) }}
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.charge_status')}} :</b>
				{{ trans("admin.".$balancerecharges->charge_status) }}
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<b>{{trans('admin.system_notes')}} :</b>
				{!! $balancerecharges->system_notes !!}
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection