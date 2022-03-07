@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#orderofferinvoices"])
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
				<a href="{{ aurl('orderofferinvoices') }}"  style="color:#343a40"  class="dropdown-item">
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
								
{!! Form::open(['url'=>aurl('/orderofferinvoices'),'id'=>'orderofferinvoices','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		{!! Form::label('order_id',trans('admin.order_id')) !!}
		{!! Form::select('order_id',App\Models\Order::pluck('order_title','id'),old('order_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('offer_id',trans('admin.offer_id')) !!}
		{!! Form::select('offer_id',App\Models\OrderOffer::pluck('id','id'),old('offer_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('offer_amount',trans('admin.offer_amount'),['class'=>' control-label']) !!}
            {!! Form::text('offer_amount',old('offer_amount'),['class'=>'form-control','placeholder'=>trans('admin.offer_amount')]) !!}
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
        {!! Form::label('remaining_amount_to_vendor',trans('admin.remaining_amount_to_vendor'),['class'=>' control-label']) !!}
            {!! Form::text('remaining_amount_to_vendor',old('remaining_amount_to_vendor'),['class'=>'form-control','placeholder'=>trans('admin.remaining_amount_to_vendor')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('amount_deduction_from_user',trans('admin.amount_deduction_from_user')) !!}
		{!! Form::select('amount_deduction_from_user',['awaiting'=>trans('admin.awaiting'),'recovered'=>trans('admin.recovered'),'discounted'=>trans('admin.discounted'),],old('amount_deduction_from_user'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('added_amount_to_vendor_balance',trans('admin.added_amount_to_vendor_balance')) !!}
		{!! Form::select('added_amount_to_vendor_balance',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],old('added_amount_to_vendor_balance'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        {!! Form::label('added_amount_to_vendor_balance_at',trans('admin.added_amount_to_vendor_balance_at')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            {!! Form::text('added_amount_to_vendor_balance_at',old('added_amount_to_vendor_balance_at'),['class'=>'form-control float-right date_time_picker','placeholder'=>trans('admin.added_amount_to_vendor_balance_at'),'readonly'=>'readonly']) !!}
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('inovice_status',trans('admin.inovice_status')) !!}
		{!! Form::select('inovice_status',['open'=>trans('admin.open'),'closed'=>trans('admin.closed'),],old('inovice_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('system_note',trans('admin.system_note'),['class'=>'control-label']) !!}
            {!! Form::textarea('system_note',old('system_note'),['class'=>'form-control','placeholder'=>trans('admin.system_note')]) !!}
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