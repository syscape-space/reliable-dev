@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#orderarbitratorinvoices"])
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
				<a href="{{aurl('orderarbitratorinvoices')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('orderarbitratorinvoices/'.$orderarbitratorinvoices->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('orderarbitratorinvoices/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$orderarbitratorinvoices->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
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
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$orderarbitratorinvoices->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['orderarbitratorinvoices.destroy', $orderarbitratorinvoices->id]
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

{!! Form::open(['url'=>aurl('/orderarbitratorinvoices/'.$orderarbitratorinvoices->id),'method'=>'put','id'=>'orderarbitratorinvoices','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('order_id',trans('admin.order_id'),['class'=>'control-label']) !!}
{!! Form::select('order_id',App\Models\Order::pluck('order_title','id'), $orderarbitratorinvoices->order_id ,['class'=>'form-control select2','placeholder'=>trans('admin.order_id')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
		<div class="form-group">
				{!! Form::label('arbitrator_id',trans('admin.arbitrator_id'),['class'=>'control-label']) !!}
{!! Form::select('arbitrator_id',App\Models\User::pluck('name','id'), $orderarbitratorinvoices->arbitrator_id ,['class'=>'form-control select2','placeholder'=>trans('admin.arbitrator_id')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
		<div class="form-group">
				{!! Form::label('order_arbitrator_id',trans('admin.order_arbitrator_id'),['class'=>'control-label']) !!}
{!! Form::select('order_arbitrator_id',App\Models\OrderArbitrator::pluck('id','id'), $orderarbitratorinvoices->order_arbitrator_id ,['class'=>'form-control select2','placeholder'=>trans('admin.order_arbitrator_id')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
		<div class="form-group">
				{!! Form::label('vendor_id',trans('admin.vendor_id'),['class'=>'control-label']) !!}
{!! Form::select('vendor_id',App\Models\User::pluck('name','id'), $orderarbitratorinvoices->vendor_id ,['class'=>'form-control select2','placeholder'=>trans('admin.vendor_id')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
		<div class="form-group">
				{!! Form::label('user_id',trans('admin.user_id'),['class'=>'control-label']) !!}
{!! Form::select('user_id',App\Models\User::pluck('name','id'), $orderarbitratorinvoices->user_id ,['class'=>'form-control select2','placeholder'=>trans('admin.user_id')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('vendor_amount',trans('admin.vendor_amount'),['class'=>'control-label']) !!}
        {!! Form::text('vendor_amount', $orderarbitratorinvoices->vendor_amount ,['class'=>'form-control','placeholder'=>trans('admin.vendor_amount')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
		<div class="form-group">
				{!! Form::label('amount_deduction_from_vendor',trans('admin.amount_deduction_from_vendor'),['class'=>'control-label']) !!}
{!! Form::select('amount_deduction_from_vendor',['awaiting'=>trans('admin.awaiting'),'recovered'=>trans('admin.recovered'),'discounted'=>trans('admin.discounted'),], $orderarbitratorinvoices->amount_deduction_from_vendor ,['class'=>'form-control select2','placeholder'=>trans('admin.amount_deduction_from_vendor')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
		<div class="form-group">
				{!! Form::label('amount_deduction_from_user',trans('admin.amount_deduction_from_user'),['class'=>'control-label']) !!}
{!! Form::select('amount_deduction_from_user',['awaiting'=>trans('admin.awaiting'),'recovered'=>trans('admin.recovered'),'discounted'=>trans('admin.discounted'),], $orderarbitratorinvoices->amount_deduction_from_user ,['class'=>'form-control select2','placeholder'=>trans('admin.amount_deduction_from_user')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('total_amount',trans('admin.total_amount'),['class'=>'control-label']) !!}
        {!! Form::text('total_amount', $orderarbitratorinvoices->total_amount ,['class'=>'form-control','placeholder'=>trans('admin.total_amount')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('system_tax',trans('admin.system_tax'),['class'=>'control-label']) !!}
        {!! Form::text('system_tax', $orderarbitratorinvoices->system_tax ,['class'=>'form-control','placeholder'=>trans('admin.system_tax')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('remaining_amount_to_arbitrator',trans('admin.remaining_amount_to_arbitrator'),['class'=>'control-label']) !!}
        {!! Form::text('remaining_amount_to_arbitrator', $orderarbitratorinvoices->remaining_amount_to_arbitrator ,['class'=>'form-control','placeholder'=>trans('admin.remaining_amount_to_arbitrator')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
		<div class="form-group">
				{!! Form::label('inovice_status',trans('admin.inovice_status'),['class'=>'control-label']) !!}
{!! Form::select('inovice_status',['open'=>trans('admin.open'),'closed'=>trans('admin.closed'),], $orderarbitratorinvoices->inovice_status ,['class'=>'form-control select2','placeholder'=>trans('admin.inovice_status')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('user_amount',trans('admin.user_amount'),['class'=>'control-label']) !!}
        {!! Form::text('user_amount', $orderarbitratorinvoices->user_amount ,['class'=>'form-control','placeholder'=>trans('admin.user_amount')]) !!}
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