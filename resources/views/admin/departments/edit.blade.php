@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#departments",'query'=>''])
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
				<a href="{{ aurl('departments') }}"  style="color:#343a40"  class="dropdown-item">
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

{!! Form::open(['url'=>aurl('/departments/'.$department->id),'id'=>'departments','files'=>true,'class'=>'form-horizontal form-row-seperated','method'=>'put']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('department_name_ar',trans('admin.department_name_ar'),['class'=>' control-label']) !!}
            {!! Form::text('department_name_ar',$department->department_name_ar,['class'=>'form-control','placeholder'=>trans('admin.department_name_ar')]) !!}
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('department_name_en',trans('admin.department_name_en'),['class'=>' control-label']) !!}
            {!! Form::text('department_name_en',$department->department_name_en,['class'=>'form-control','placeholder'=>trans('admin.department_name_en')]) !!}
    </div>
</div>

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('parent',trans('admin.parent'),['class'=>' control-label']) !!}

				<div class="jstree_list col-lg-12 col-md-12"></div>
				<input type="hidden" name="parent" value="" class="parent">

    </div>
</div>

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<div class="alert alert-info">
	<center>{{ trans('admin.available_occupations') }}</center>
		@foreach(App\Models\Occupation::all() as $occupation)
		<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<hr />
			<center>{{ $occupation->{l('occupation_name')} }}</center>
		</div>
			@foreach($occupation->specialties()->get() as $specialtie)
			 <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				 	<div class="form-group">
			        <div class="custom-control custom-switch mt-4">
			            <input type="checkbox" class="custom-control-input checkinput" name="specialtie_id[]" value="{{ $specialtie->id }}"
			            {{ $department->specialties()->where('specialtie_id',$specialtie->id)->count() > 0 ? 'checked':'' }}
			            id="specialtie_id{{ $specialtie->id }}">
			            <label class="custom-control-label" for="specialtie_id{{ $specialtie->id }}">
			                {{ $specialtie->{l('specialty_name')} }}
			            </label>
			        </div>
			    </div>
			 </div>
			@endforeach

		</div>
		@endforeach
</div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('department_desc_ar',trans('admin.department_desc_ar'),['class'=>' control-label']) !!}
            {!! Form::textarea('department_desc_ar',$department->department_desc_ar,['class'=>'form-control','placeholder'=>trans('admin.department_desc_ar')]) !!}
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('department_desc_en',trans('admin.department_desc_en'),['class'=>' control-label']) !!}
            {!! Form::textarea('department_desc_en',$department->department_desc_en,['class'=>'form-control','placeholder'=>trans('admin.department_desc_en')]) !!}
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
	<div class="custom-control custom-switch">
		<input type="checkbox" class="custom-control-input checkinput"
					name="enable_post" {{ $department->enable_post == 'yes'?'checked':'' }}
 		 value="yes" id="enable_post" >
	  <label class="custom-control-label" for="enable_post">{{ trans('admin.enable_post') }}</label>
	</div>
	</div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('department_status',trans('admin.department_status')) !!}
		{!! Form::select('department_status',['show'=>trans('admin.show'),'hide'=>trans('admin.hide'),],$department->department_status,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.save') }}</button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.save_back') }}</button>
{!! Form::close() !!}	</div>
</div>


@push('js')
<script type="text/javascript">
$(function () {
$('.jstree_list').jstree({
"core" : {
'data' : {!! load_dep($department->parent) !!},
"themes" : {
"multiple" : false,
"animation" : 0,
"variant" : "large"
}
},
"checkbox" : {
"keep_selected_style" : true
},
"plugins" : [ "changed","types","conditionalselect","dnd","massload","wholerow", "radio" ]
});
$('.jstree_list')
// listen for event
.on('changed.jstree', function (e, data) {
var i, j, r = [];
var t = [];
for(i = 0, j = data.selected.length; i < j; i++) {
r.push(data.instance.get_node(data.selected[i]).id);
t.push(data.instance.get_node(data.selected[i]).text);
}
$('.parent').val(r.join(', '));
})
// create the instance
.jstree();
});
</script>
@endpush
@endsection