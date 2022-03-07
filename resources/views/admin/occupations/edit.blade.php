@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#occupations"])
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
				<a href="{{aurl('occupations')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('occupations/'.$occupations->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('occupations/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$occupations->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$occupations->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$occupations->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['occupations.destroy', $occupations->id]
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
										
{!! Form::open(['url'=>aurl('/occupations/'.$occupations->id),'method'=>'put','id'=>'occupations','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('occupation_name_ar',trans('admin.occupation_name_ar'),['class'=>'control-label']) !!}
        {!! Form::text('occupation_name_ar', $occupations->occupation_name_ar ,['class'=>'form-control','placeholder'=>trans('admin.occupation_name_ar')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('occupation_name_en',trans('admin.occupation_name_en'),['class'=>'control-label']) !!}
        {!! Form::text('occupation_name_en', $occupations->occupation_name_en ,['class'=>'form-control','placeholder'=>trans('admin.occupation_name_en')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
		<div class="form-group">
				{!! Form::label('licenses',trans('admin.licenses'),['class'=>'control-label']) !!}
{!! Form::select('licenses',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),], $occupations->licenses ,['class'=>'form-control select2','placeholder'=>trans('admin.licenses')]) !!}
		</div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
		<div class="form-group">
				{!! Form::label('experiences',trans('admin.experiences'),['class'=>'control-label']) !!}
{!! Form::select('experiences',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),], $occupations->experiences ,['class'=>'form-control select2','placeholder'=>trans('admin.experiences')]) !!}
		</div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
		<div class="form-group">
				{!! Form::label('qualifications',trans('admin.qualifications'),['class'=>'control-label']) !!}
{!! Form::select('qualifications',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),], $occupations->qualifications ,['class'=>'form-control select2','placeholder'=>trans('admin.qualifications')]) !!}
		</div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
		<div class="form-group">
				{!! Form::label('commercial_records',trans('admin.commercial_records'),['class'=>'control-label']) !!}
{!! Form::select('commercial_records',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),], $occupations->commercial_records ,['class'=>'form-control select2','placeholder'=>trans('admin.commercial_records')]) !!}
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