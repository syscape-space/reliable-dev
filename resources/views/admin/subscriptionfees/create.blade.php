@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#subscriptionfees"])
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
				<a href="{{ aurl('subscriptionfees') }}"  style="color:#343a40"  class="dropdown-item">
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

{!! Form::open(['url'=>aurl('/subscriptionfees'),'id'=>'subscriptionfees','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('user_id',trans('admin.user_id')) !!}
		{!! Form::select('user_id',App\Models\User::pluck('name','id'),old('user_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('amount',trans('admin.amount'),['class'=>' control-label']) !!}
            {!! Form::text('amount',old('amount'),['class'=>'form-control','placeholder'=>trans('admin.amount')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('payment_method',trans('admin.payment_method')) !!}
		{!! Form::select('payment_method',['electronic_payment'=>trans('admin.electronic_payment'),'bank_transfer'=>trans('admin.bank_transfer'),],old('payment_method'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('payment_status',trans('admin.payment_status')) !!}
		{!! Form::select('payment_status',[
			'pending'=>trans('admin.pending'),
			'approved'=>trans('admin.approved'),
			'refused'=>trans('admin.refused')],old('payment_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('refused_reason',trans('admin.refused_reason'),['class'=>'control-label']) !!}
            {!! Form::textarea('refused_reason',old('refused_reason'),['class'=>'form-control','placeholder'=>trans('admin.refused_reason')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('electronic_payment_ref',trans('admin.electronic_payment_ref'),['class'=>' control-label']) !!}
            {!! Form::text('electronic_payment_ref',old('electronic_payment_ref'),['class'=>'form-control','placeholder'=>trans('admin.electronic_payment_ref')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('user_note',trans('admin.user_note'),['class'=>'control-label']) !!}
            {!! Form::textarea('user_note',old('user_note'),['class'=>'form-control','placeholder'=>trans('admin.user_note')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>'control-label']) !!}
            {!! Form::textarea('comment',old('comment'),['class'=>'form-control','placeholder'=>trans('admin.comment')]) !!}
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