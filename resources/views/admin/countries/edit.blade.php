@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#countries"])
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
				<a href="{{aurl('countries')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('countries/'.$countries->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('countries/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$countries->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$countries->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$countries->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['countries.destroy', $countries->id]
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

{!! Form::open(['url'=>aurl('/countries/'.$countries->id),'method'=>'put','id'=>'countries','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_name_ar',trans('admin.country_name_ar'),['class'=>'control-label']) !!}
        {!! Form::text('country_name_ar', $countries->country_name_ar ,['class'=>'form-control','placeholder'=>trans('admin.country_name_ar')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_name_en',trans('admin.country_name_en'),['class'=>'control-label']) !!}
        {!! Form::text('country_name_en', $countries->country_name_en ,['class'=>'form-control','placeholder'=>trans('admin.country_name_en')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_key',trans('admin.country_key'),['class'=>'control-label']) !!}
        {!! Form::text('country_key', $countries->country_key ,['class'=>'form-control','placeholder'=>trans('admin.country_key')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_iso',trans('admin.country_iso'),['class'=>'control-label']) !!}
        {!! Form::text('country_iso', $countries->country_iso ,['class'=>'form-control','placeholder'=>trans('admin.country_iso')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 country_flag">
    <div class="row">
        <div class="col-md-9">
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
        <div class="col-md-2" style="padding-top: 30px;">
            @include("admin.show_image",["image"=>$countries->country_flag])
        </div>
    </div>
</div>

<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_currency',trans('admin.country_currency'),['class'=>' control-label']) !!}
            {!! Form::text('country_currency',$countries->country_currency,['class'=>'form-control','placeholder'=>trans('admin.country_currency')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_symbol',trans('admin.country_symbol'),['class'=>' control-label']) !!}
            {!! Form::text('country_symbol',$countries->country_symbol,['class'=>'form-control','placeholder'=>trans('admin.country_symbol')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('country_currency_exchange',trans('admin.country_currency_exchange'),['class'=>' control-label']) !!}
            {!! Form::text('country_currency_exchange',$countries->country_currency_exchange,['class'=>'form-control','placeholder'=>trans('admin.country_currency_exchange')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('country_status',trans('admin.country_status'),['class'=>'control-label']) !!}
{!! Form::select('country_status',['show'=>trans('admin.show'),'hide'=>trans('admin.hide'),], $countries->country_status ,['class'=>'form-control select2','placeholder'=>trans('admin.country_status')]) !!}
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