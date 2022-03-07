@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#orderarbitrators"])
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>
				{{ !empty($title)?$title:'' }}
			</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{ aurl('orderarbitrators') }}"  style="color:#343a40"  class="dropdown-item">
				<i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
			</div>
		</div>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		{!! Form::open(['url'=>aurl('/orderarbitrators'),'id'=>'orderarbitrators','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('order_id',trans('admin.order_id')) !!}
					{!! Form::select('order_id',App\Models\Order::pluck('order_title','id'),old('order_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('arbitrator_id',trans('admin.arbitrator_id')) !!}
					{!! Form::select('arbitrator_id',App\Models\User::pluck('name','id'),old('arbitrator_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('notify_arbitrator',trans('admin.notify_arbitrator')) !!}
					{!! Form::select('notify_arbitrator',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],old('notify_arbitrator'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('arbitrator_amount',trans('admin.arbitrator_amount'),['class'=>' control-label']) !!}
					{!! Form::text('arbitrator_amount',old('arbitrator_amount'),['class'=>'form-control','placeholder'=>trans('admin.arbitrator_amount')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('arbitrator_add_amount',trans('admin.arbitrator_add_amount')) !!}
					{!! Form::select('arbitrator_add_amount',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],old('arbitrator_add_amount'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_accept_amount',trans('admin.user_accept_amount')) !!}
					{!! Form::select('user_accept_amount',['pending'=>trans('admin.pending'),'accept'=>trans('admin.accept'),'reject'=>trans('admin.reject'),],old('user_accept_amount'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('vendor_accept_amount',trans('admin.vendor_accept_amount')) !!}
					{!! Form::select('vendor_accept_amount',['pending'=>trans('admin.pending'),'accept'=>trans('admin.accept'),'reject'=>trans('admin.reject'),],old('vendor_accept_amount'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('arbitrator_decision',trans('admin.arbitrator_decision'),['class'=>'control-label']) !!}
					{!! Form::textarea('arbitrator_decision',old('arbitrator_decision'),['class'=>'form-control','placeholder'=>trans('admin.arbitrator_decision')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_accept_decision',trans('admin.user_accept_decision')) !!}
					{!! Form::select('user_accept_decision',['pending'=>trans('admin.pending'),'accept'=>trans('admin.accept'),'reject'=>trans('admin.reject'),],old('user_accept_decision'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('vendor_accept_decision',trans('admin.vendor_accept_decision')) !!}
					{!! Form::select('vendor_accept_decision',['pending'=>trans('admin.pending'),'accept'=>trans('admin.accept'),'reject'=>trans('admin.reject'),],old('vendor_accept_decision'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
		<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add_back') }}</button>
	{!! Form::close() !!}	</div>
</div>
@endsection