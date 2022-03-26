
@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#usercommercials",'query'=>''])
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
				<a href="{{ aurl('usercommercials') }}"  style="color:#343a40"  class="dropdown-item">
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

{!! Form::open(['url'=>aurl('/usercommercials'),'id'=>'usercommercials','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('commercial_id',trans('admin.commercial_id'),['class'=>' control-label']) !!}
            {!! Form::text('commercial_id',old('commercial_id'),['class'=>'form-control','placeholder'=>trans('admin.commercial_id')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 commercial_file">
    <div class="form-group">
        <label for="'commercial_file'">{{ trans('admin.commercial_file') }}</label>
        <div class="input-group">
            <div class="custom-file">
                {!! Form::file('commercial_file',['class'=>'custom-file-input','placeholder'=>trans('admin.commercial_file'),"accept"=>it()->acceptedMimeTypes("pdf"),"id"=>"commercial_file"]) !!}
                {!! Form::label('commercial_file',trans('admin.commercial_file'),['class'=>'custom-file-label']) !!}
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        {!! Form::label('commercial_end_at',trans('admin.commercial_end_at')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            {!! Form::text('commercial_end_at',old('commercial_end_at'),['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.commercial_end_at'),'readonly'=>'readonly']) !!}
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('user_id',trans('admin.user_id')) !!}
		{!! Form::select('user_id',App\Models\User::where('membership_type','!=','user')->pluck('name','id'),!empty(request('user_id'))?request('user_id'):old('user_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
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