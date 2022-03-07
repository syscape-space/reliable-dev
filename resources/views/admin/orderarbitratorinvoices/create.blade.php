@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#orderarbitratorinvoices"])
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
				<a href="{{ aurl('orderarbitratorinvoices') }}"  style="color:#343a40"  class="dropdown-item">
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

{!! Form::open(['url'=>aurl('/orderarbitratorinvoices'),'id'=>'orderarbitratorinvoices','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('order_id',trans('admin.order_id')) !!}
		{!! Form::select('order_id',App\Models\Order::pluck('order_title','id'),old('order_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('arbitrator_id',trans('admin.arbitrator_id')) !!}
		{!! Form::select('arbitrator_id',App\Models\User::pluck('name','id'),old('arbitrator_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('order_arbitrator_id',trans('admin.order_arbitrator_id')) !!}
		{!! Form::select('order_arbitrator_id',App\Models\OrderArbitrator::pluck('id','id'),old('order_arbitrator_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('vendor_id',trans('admin.vendor_id')) !!}
		{!! Form::select('vendor_id',App\Models\User::pluck('name','id'),old('vendor_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('user_id',trans('admin.user_id')) !!}
		{!! Form::select('user_id',App\Models\User::pluck('name','id'),old('user_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('vendor_amount',trans('admin.vendor_amount'),['class'=>' control-label']) !!}
            {!! Form::text('vendor_amount',old('vendor_amount'),['class'=>'form-control','placeholder'=>trans('admin.vendor_amount')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('amount_deduction_from_vendor',trans('admin.amount_deduction_from_vendor')) !!}
		{!! Form::select('amount_deduction_from_vendor',['awaiting'=>trans('admin.awaiting'),'recovered'=>trans('admin.recovered'),'discounted'=>trans('admin.discounted'),],old('amount_deduction_from_vendor'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('amount_deduction_from_user',trans('admin.amount_deduction_from_user')) !!}
		{!! Form::select('amount_deduction_from_user',['awaiting'=>trans('admin.awaiting'),'recovered'=>trans('admin.recovered'),'discounted'=>trans('admin.discounted'),],old('amount_deduction_from_user'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('total_amount',trans('admin.total_amount'),['class'=>' control-label']) !!}
            {!! Form::text('total_amount',old('total_amount'),['class'=>'form-control','placeholder'=>trans('admin.total_amount')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('system_tax',trans('admin.system_tax'),['class'=>' control-label']) !!}
            {!! Form::text('system_tax',old('system_tax'),['class'=>'form-control','placeholder'=>trans('admin.system_tax')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('remaining_amount_to_arbitrator',trans('admin.remaining_amount_to_arbitrator'),['class'=>' control-label']) !!}
            {!! Form::text('remaining_amount_to_arbitrator',old('remaining_amount_to_arbitrator'),['class'=>'form-control','placeholder'=>trans('admin.remaining_amount_to_arbitrator')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('inovice_status',trans('admin.inovice_status')) !!}
		{!! Form::select('inovice_status',['open'=>trans('admin.open'),'closed'=>trans('admin.closed'),],old('inovice_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('user_amount',trans('admin.user_amount'),['class'=>' control-label']) !!}
            {!! Form::text('user_amount',old('user_amount'),['class'=>'form-control','placeholder'=>trans('admin.user_amount')]) !!}
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