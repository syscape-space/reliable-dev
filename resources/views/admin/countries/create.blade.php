@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#countries",'query'=>""])
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
				<a href="{{ aurl('countries') }}"  style="color:#343a40"  class="dropdown-item">
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

{!! Form::open(['url'=>aurl('/countries'),'id'=>'countries','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_name_ar',trans('admin.country_name_ar'),['class'=>' control-label']) !!}
            {!! Form::text('country_name_ar',old('country_name_ar'),['class'=>'form-control','placeholder'=>trans('admin.country_name_ar')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_name_en',trans('admin.country_name_en'),['class'=>' control-label']) !!}
            {!! Form::text('country_name_en',old('country_name_en'),['class'=>'form-control','placeholder'=>trans('admin.country_name_en')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_key',trans('admin.country_key'),['class'=>' control-label']) !!}
            {!! Form::text('country_key',old('country_key'),['class'=>'form-control','placeholder'=>trans('admin.country_key')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_iso',trans('admin.country_iso'),['class'=>' control-label']) !!}
            {!! Form::text('country_iso',old('country_iso'),['class'=>'form-control','placeholder'=>trans('admin.country_iso')]) !!}
    </div>
</div>

<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_currency',trans('admin.country_currency'),['class'=>' control-label']) !!}
            {!! Form::text('country_currency',old('country_currency'),['class'=>'form-control','placeholder'=>trans('admin.country_currency')]) !!}
    </div>
</div>

<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_symbol',trans('admin.country_symbol'),['class'=>' control-label']) !!}
            {!! Form::text('country_symbol',old('country_symbol'),['class'=>'form-control','placeholder'=>trans('admin.country_symbol')]) !!}
    </div>
</div>

<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_currency_exchange',trans('admin.country_currency_exchange'),['class'=>' control-label']) !!}
            {!! Form::text('country_currency_exchange',old('country_currency_exchange'),['class'=>'form-control','placeholder'=>trans('admin.country_currency_exchange')]) !!}
    </div>
</div>




<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 country_flag">
    <div class="form-group">
        <label for="'country_flag'">{{ trans('admin.country_flag') }}</label>
        <div class="input-group">
            <div class="custom-file">
                {!! Form::file('country_flag',['class'=>'custom-file-input','placeholder'=>trans('admin.country_flag'),"accept"=>it()->acceptedMimeTypes("image"),"id"=>"country_flag"]) !!}
                {!! Form::label('country_flag',trans('admin.country_flag'),['class'=>'custom-file-label']) !!}
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('country_status',trans('admin.country_status')) !!}
		{!! Form::select('country_status',['show'=>trans('admin.show'),'hide'=>trans('admin.hide'),],old('country_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
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