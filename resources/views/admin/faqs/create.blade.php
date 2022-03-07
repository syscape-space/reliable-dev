@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#faqs"])
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
				<a href="{{ aurl('faqs') }}"  style="color:#343a40"  class="dropdown-item">
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
								
{!! Form::open(['url'=>aurl('/faqs'),'id'=>'faqs','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('question_ar',trans('admin.question_ar'),['class'=>' control-label']) !!}
            {!! Form::text('question_ar',old('question_ar'),['class'=>'form-control','placeholder'=>trans('admin.question_ar')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('answer_ar',trans('admin.answer_ar'),['class'=>'control-label']) !!}
            {!! Form::textarea('answer_ar',old('answer_ar'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.answer_ar')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('question_en',trans('admin.question_en'),['class'=>' control-label']) !!}
            {!! Form::text('question_en',old('question_en'),['class'=>'form-control','placeholder'=>trans('admin.question_en')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('answer_en',trans('admin.answer_en'),['class'=>'control-label']) !!}
            {!! Form::textarea('answer_en',old('answer_en'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.answer_en')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('show_to',trans('admin.show_to')) !!}
		{!! Form::select('show_to',['all'=>trans('admin.all'),'users'=>trans('admin.users'),'visitors'=>trans('admin.visitors'),'customer'=>trans('admin.customer'),'vendor'=>trans('admin.vendor'),],old('show_to'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('question_status',trans('admin.question_status')) !!}
		{!! Form::select('question_status',['show'=>trans('admin.show'),'hide'=>trans('admin.hide'),],old('question_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
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