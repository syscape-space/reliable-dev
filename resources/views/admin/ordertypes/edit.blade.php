@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#ordertypes"])
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
				<a href="{{aurl('ordertypes')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('ordertypes/'.$ordertypes->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('ordertypes/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$ordertypes->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$ordertypes->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$ordertypes->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['ordertypes.destroy', $ordertypes->id]
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
										
{!! Form::open(['url'=>aurl('/ordertypes/'.$ordertypes->id),'method'=>'put','id'=>'ordertypes','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('type_name_ar',trans('admin.type_name_ar'),['class'=>'control-label']) !!}
        {!! Form::text('type_name_ar', $ordertypes->type_name_ar ,['class'=>'form-control','placeholder'=>trans('admin.type_name_ar')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('type_name_en',trans('admin.type_name_en'),['class'=>'control-label']) !!}
        {!! Form::text('type_name_en', $ordertypes->type_name_en ,['class'=>'form-control','placeholder'=>trans('admin.type_name_en')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('type_desc_ar',trans('admin.type_desc_ar'),['class'=>'control-label']) !!}
        {!! Form::textarea('type_desc_ar', $ordertypes->type_desc_ar ,['class'=>'form-control','placeholder'=>trans('admin.type_desc_ar')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('type_desc_en',trans('admin.type_desc_en'),['class'=>'control-label']) !!}
        {!! Form::textarea('type_desc_en', $ordertypes->type_desc_en ,['class'=>'form-control','placeholder'=>trans('admin.type_desc_en')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 type_icon">
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="'type_icon'">{{ trans('admin.type_icon') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        {!! Form::file('type_icon',['class'=>'custom-file-input','placeholder'=>trans('admin.type_icon'),"accept"=>it()->acceptedMimeTypes("image"),"id"=>"type_icon"]) !!}
                        {!! Form::label('type_icon',trans('admin.type_icon'),['class'=>'custom-file-label']) !!}
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2" style="padding-top: 30px;">
            @include("admin.show_image",["image"=>$ordertypes->type_icon])
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('type_status',trans('admin.type_status'),['class'=>'control-label']) !!}
{!! Form::select('type_status',['show'=>trans('admin.show'),'hide'=>trans('admin.hide'),], $ordertypes->type_status ,['class'=>'form-control select2','placeholder'=>trans('admin.type_status')]) !!}
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