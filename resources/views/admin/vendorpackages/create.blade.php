@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#vendorpackages",'query'=>""])
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
				<a href="{{ aurl('vendorpackages') }}"  style="color:#343a40"  class="dropdown-item">
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

		{!! Form::open(['url'=>aurl('/vendorpackages'),'id'=>'vendorpackages','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">

			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('package_title',trans('admin.package_title'),['class'=>' control-label']) !!}
					{!! Form::text('package_title',old('package_title'),['class'=>'form-control','placeholder'=>trans('admin.package_title')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('package_price',trans('admin.package_price'),['class'=>' control-label']) !!}
					{!! Form::text('package_price',old('package_price'),['class'=>'form-control','placeholder'=>trans('admin.package_price')]) !!}
				</div>
			</div>


			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('duration_package_days',trans('admin.duration_package_days'),['class'=>' control-label']) !!}
					{!! Form::text('duration_package_days',old('duration_package_days'),['class'=>'form-control','placeholder'=>trans('admin.duration_package_days')]) !!}
				</div>
			</div>

			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('package_status',trans('admin.package_status')) !!}
					{!! Form::select('package_status',['show'=>trans('admin.show'),'hide'=>trans('admin.hide'),],old('package_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
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