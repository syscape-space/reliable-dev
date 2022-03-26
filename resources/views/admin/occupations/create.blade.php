@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#occupations",'query'=>""])
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
				<a href="{{ aurl('occupations') }}"  style="color:#343a40"  class="dropdown-item">
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
								
{!! Form::open(['url'=>aurl('/occupations'),'id'=>'occupations','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('occupation_name_ar',trans('admin.occupation_name_ar'),['class'=>' control-label']) !!}
            {!! Form::text('occupation_name_ar',old('occupation_name_ar'),['class'=>'form-control','placeholder'=>trans('admin.occupation_name_ar')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('occupation_name_en',trans('admin.occupation_name_en'),['class'=>' control-label']) !!}
            {!! Form::text('occupation_name_en',old('occupation_name_en'),['class'=>'form-control','placeholder'=>trans('admin.occupation_name_en')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
	<div class="form-group">
		{!! Form::label('licenses',trans('admin.licenses')) !!}
		{!! Form::select('licenses',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),],old('licenses'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
	<div class="form-group">
		{!! Form::label('experiences',trans('admin.experiences')) !!}
		{!! Form::select('experiences',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),],old('experiences'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
	<div class="form-group">
		{!! Form::label('qualifications',trans('admin.qualifications')) !!}
		{!! Form::select('qualifications',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),],old('qualifications'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
	<div class="form-group">
		{!! Form::label('commercial_records',trans('admin.commercial_records')) !!}
		{!! Form::select('commercial_records',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),],old('commercial_records'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
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