@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#ticketdepartments",'query'=>''])
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
				<a href="{{ aurl('ticketdepartments') }}"  style="color:#343a40"  class="dropdown-item">
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
								
{!! Form::open(['url'=>aurl('/ticketdepartments'),'id'=>'ticketdepartments','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('department_name_ar',trans('admin.department_name_ar'),['class'=>' control-label']) !!}
            {!! Form::text('department_name_ar',old('department_name_ar'),['class'=>'form-control','placeholder'=>trans('admin.department_name_ar')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('department_name_en',trans('admin.department_name_en'),['class'=>' control-label']) !!}
            {!! Form::text('department_name_en',old('department_name_en'),['class'=>'form-control','placeholder'=>trans('admin.department_name_en')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 dep_icon">
    <div class="form-group">
        <label for="'dep_icon'">{{ trans('admin.dep_icon') }}</label>
        <div class="input-group">
            <div class="custom-file">
                {!! Form::file('dep_icon',['class'=>'custom-file-input','placeholder'=>trans('admin.dep_icon'),"accept"=>it()->acceptedMimeTypes("image"),"id"=>"dep_icon"]) !!}
                {!! Form::label('dep_icon',trans('admin.dep_icon'),['class'=>'custom-file-label']) !!}
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('department_desc_ar',trans('admin.department_desc_ar'),['class'=>'control-label']) !!}
            {!! Form::textarea('department_desc_ar',old('department_desc_ar'),['class'=>'form-control','placeholder'=>trans('admin.department_desc_ar')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('department_desc_en',trans('admin.department_desc_en'),['class'=>'control-label']) !!}
            {!! Form::textarea('department_desc_en',old('department_desc_en'),['class'=>'form-control','placeholder'=>trans('admin.department_desc_en')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('department_status',trans('admin.department_status')) !!}
		{!! Form::select('department_status',['show'=>trans('admin.show'),'hide'=>trans('admin.hide'),],old('department_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
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