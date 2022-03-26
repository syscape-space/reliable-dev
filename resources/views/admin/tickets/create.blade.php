@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#tickets",'query'=>''])
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
				<a href="{{ aurl('tickets') }}"  style="color:#343a40"  class="dropdown-item">
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

{!! Form::open(['url'=>aurl('/tickets'),'id'=>'tickets','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('ticket_title',trans('admin.ticket_title'),['class'=>' control-label']) !!}
            {!! Form::text('ticket_title',old('ticket_title'),['class'=>'form-control','placeholder'=>trans('admin.ticket_title')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	<div class="form-group">
		{!! Form::label('ticket_linked',trans('admin.ticket_linked')) !!}
		{!! Form::select('ticket_linked',['order'=>trans('admin.order'),'offer'=>trans('admin.offer'),'charge'=>trans('admin.charge'),'received_money'=>trans('admin.received_money'),'account'=>trans('admin.account'),'other'=>trans('admin.other'),],old('ticket_linked'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
        {!! Form::label('link_id',trans('admin.link_id'),['class'=>' control-label']) !!}
            {!! Form::text('link_id',old('link_id'),['class'=>'form-control','placeholder'=>trans('admin.link_id')]) !!}
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
		{!! Form::label('ticket_department_id',trans('admin.ticket_department_id')) !!}
		{!! Form::select('ticket_department_id',App\Models\TicketDepartment::pluck('department_name_ar','id'),old('ticket_department_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('ticket_content',trans('admin.ticket_content'),['class'=>'control-label']) !!}
            {!! Form::textarea('ticket_content',old('ticket_content'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.ticket_content')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
     @include("admin.dropzone",[
    "thumbnailWidth"=>"80",
    "thumbnailHeight"=>"80",
    "parallelUploads"=>"20",
    "maxFiles"=>"30",
    "maxFileSize"=>"",
    "acceptedMimeTypes"=>it()->acceptedMimeTypes(""),
    "autoQueue"=>true,
    "dz_param"=>"ticket_dz",
    "type"=>"create",
    "route"=>"tickets",
    "path"=>"tickets",
    ])
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('ticket_status',trans('admin.ticket_status')) !!}
		{!! Form::select('ticket_status',['opened'=>trans('admin.opened'),'closed'=>trans('admin.closed'),],old('ticket_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
{{-- <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('user_ticket_rate',trans('admin.user_ticket_rate')) !!}
		{!! Form::select('user_ticket_rate',['1'=>trans('admin.1'),'2'=>trans('admin.2'),'3'=>trans('admin.3'),'4'=>trans('admin.4'),'5'=>trans('admin.5'),],old('user_ticket_rate'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('user_ticket_comment',trans('admin.user_ticket_comment'),['class'=>'control-label']) !!}
            {!! Form::textarea('user_ticket_comment',old('user_ticket_comment'),['class'=>'form-control','placeholder'=>trans('admin.user_ticket_comment')]) !!}
    </div>
</div>
 --}}
</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add_back') }}</button>
{!! Form::close() !!}	</div>
</div>
@endsection