@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#orderarbitrators"])
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>{{!empty($title)?$title:''}}</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('orderarbitrators')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('orderarbitrators/'.$orderarbitrators->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('orderarbitrators/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$orderarbitrators->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$orderarbitrators->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$orderarbitrators->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['orderarbitrators.destroy', $orderarbitrators->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
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

		{!! Form::open(['url'=>aurl('/orderarbitrators/'.$orderarbitrators->id),'method'=>'put','id'=>'orderarbitrators','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('order_id',trans('admin.order_id'),['class'=>'control-label']) !!}
					{!! Form::select('order_id',App\Models\Order::pluck('order_title','id'), $orderarbitrators->order_id ,['class'=>'form-control select2','placeholder'=>trans('admin.order_id')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('arbitrator_id',trans('admin.arbitrator_id'),['class'=>'control-label']) !!}
					{!! Form::select('arbitrator_id',App\Models\User::pluck('name','id'), $orderarbitrators->arbitrator_id ,['class'=>'form-control select2','placeholder'=>trans('admin.arbitrator_id')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('notify_arbitrator',trans('admin.notify_arbitrator'),['class'=>'control-label']) !!}
					{!! Form::select('notify_arbitrator',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),], $orderarbitrators->notify_arbitrator ,['class'=>'form-control select2','placeholder'=>trans('admin.notify_arbitrator')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('arbitrator_amount',trans('admin.arbitrator_amount'),['class'=>'control-label']) !!}
					{!! Form::text('arbitrator_amount', $orderarbitrators->arbitrator_amount ,['class'=>'form-control','placeholder'=>trans('admin.arbitrator_amount')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('arbitrator_add_amount',trans('admin.arbitrator_add_amount'),['class'=>'control-label']) !!}
					{!! Form::select('arbitrator_add_amount',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),], $orderarbitrators->arbitrator_add_amount ,['class'=>'form-control select2','placeholder'=>trans('admin.arbitrator_add_amount')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_accept_amount',trans('admin.user_accept_amount'),['class'=>'control-label']) !!}
					{!! Form::select('user_accept_amount',['pending'=>trans('admin.pending'),'accept'=>trans('admin.accept'),'reject'=>trans('admin.reject'),], $orderarbitrators->user_accept_amount ,['class'=>'form-control select2','placeholder'=>trans('admin.user_accept_amount')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('vendor_accept_amount',trans('admin.vendor_accept_amount'),['class'=>'control-label']) !!}
					{!! Form::select('vendor_accept_amount',['pending'=>trans('admin.pending'),'accept'=>trans('admin.accept'),'reject'=>trans('admin.reject'),], $orderarbitrators->vendor_accept_amount ,['class'=>'form-control select2','placeholder'=>trans('admin.vendor_accept_amount')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('arbitrator_decision',trans('admin.arbitrator_decision'),['class'=>'control-label']) !!}
					{!! Form::textarea('arbitrator_decision', $orderarbitrators->arbitrator_decision ,['class'=>'form-control','placeholder'=>trans('admin.arbitrator_decision')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_accept_decision',trans('admin.user_accept_decision'),['class'=>'control-label']) !!}
					{!! Form::select('user_accept_decision',['pending'=>trans('admin.pending'),'accept'=>trans('admin.accept'),'reject'=>trans('admin.reject'),], $orderarbitrators->user_accept_decision ,['class'=>'form-control select2','placeholder'=>trans('admin.user_accept_decision')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('vendor_accept_decision',trans('admin.vendor_accept_decision'),['class'=>'control-label']) !!}
					{!! Form::select('vendor_accept_decision',['pending'=>trans('admin.pending'),'accept'=>trans('admin.accept'),'reject'=>trans('admin.reject'),], $orderarbitrators->vendor_accept_decision ,['class'=>'form-control select2','placeholder'=>trans('admin.vendor_accept_decision')]) !!}
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
		<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
		{!! Form::close() !!}
	</div>
</div>
@endsection