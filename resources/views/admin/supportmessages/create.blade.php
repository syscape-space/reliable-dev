@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#supportmessages",'query'=>''])
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
				<a href="{{ aurl('supportmessages') }}"  style="color:#343a40"  class="dropdown-item">
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
								
{!! Form::open(['url'=> aurl('/supportmessages'), 'id'=>'supportmessages','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('department_id',trans('admin.department_id')) !!}
		{{-- <select id="department_id" class="form-control select2" placeholder="{{trans('admin.choose')}}">
			@foreach($departments as $department)
				<option value="{{ $department->id }}">
					{{ $department->{"department_name_" . app()->getLocale()} }}
				</option>
			@endforeach
		</select> --}}

		{!! Form::select('department_id', $departments, old('department_id'),['class'=>'form-control select2','placeholder' => trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('message_ar',trans('admin.message_ar'),['class'=>'control-label']) !!}
            {!! Form::textarea('message_ar',old('message_ar'),['class'=>'form-control','placeholder'=>trans('admin.message_ar')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('message_en',trans('admin.message_en'),['class'=>'control-label']) !!}
            {!! Form::textarea('message_en',old('message_en'),['class'=>'form-control','placeholder'=>trans('admin.message_en')]) !!}
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