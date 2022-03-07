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
				<a href="{{aurl('balancewithdrawals')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('balancewithdrawals/'.$balancewithdrawals->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('balancewithdrawals/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$balancewithdrawals->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$balancewithdrawals->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$balancewithdrawals->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
               'method' => 'DELETE',
               'route' => ['balancewithdrawals.destroy', $balancewithdrawals->id]
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
				<b>{{trans('admin.id')}} :</b> {{$balancewithdrawals->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			@if(!empty($balancewithdrawals->admin_id()->first()))
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<b>{{trans('admin.admin_id')}} :</b>
				{{ $balancewithdrawals->admin_id()->first()->name }}
			</div>
			@endif
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.user_id')}} :</b>
				@if(!empty($balancewithdrawals->user_id()->first()))
			<a href="{{ aurl('users/'.$balancewithdrawals->user_id) }}" target="_blank">{{ $balancewithdrawals->user_id()->first()->name }}</a>
			@endif
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.amount')}} :</b>
				{!! $balancewithdrawals->amount !!}
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-3">
				<b>{{trans('admin.user_notes')}} :</b>
				{!! $balancewithdrawals->user_notes !!}
			</div>
			@if($balancewithdrawals->withdrawal_status == 'refused')
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-3">
				<b>{{trans('admin.reason')}} :</b>
				{!! $balancewithdrawals->reason !!}
			</div>
			@endif
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-3">
				<b>{{trans('admin.system_notes')}} :</b>
				{!! $balancewithdrawals->system_notes !!}
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.receipt_via')}} :</b>
				{{ trans("admin.".$balancewithdrawals->receipt_via) }}
			</div>
			@if(!empty($balancewithdrawals->transfer_picture))
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="row">
					<div class="col-md-8 col-lg-4 col-xs-12">
					  <b>{{trans('admin.transfer_picture')}} :</b>
					</div>
					<div class="col-md-2 col-lg-2 col-xs-12">

					</div>
					<div class="col-md-2 col-lg-2 col-xs-12">
						<a href="{{ it()->url($balancewithdrawals->transfer_picture) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a>
					</div>
				</div>
			</div>
			@endif
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.withdrawal_status')}} :</b>
				{{ trans("admin.".$balancewithdrawals->withdrawal_status) }}
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection