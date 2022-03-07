@extends('admin.index')
@section('content')
@include('admin.ajax',[
'typeForm'=>'create',
'selectID'=>'occupation_id',
'outputClass'=>'specialtie_id',
'url'=>aurl('userjobs/get/specialtie/id'),
])
@include("admin.layouts.components.submit_form_ajax",["form"=>"#userjobs"])
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
				<a href="{{ aurl('userjobs') }}"  style="color:#343a40"  class="dropdown-item">
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
		{!! Form::open(['url'=>aurl('/userjobs'),'id'=>'userjobs','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_id',trans('admin.user_id')) !!}
					{!! Form::select('user_id',App\Models\User::where('membership_type','vendor')->pluck('name','id'),old('user_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('occupation_id',trans('admin.occupation_id')) !!}
					<select name="occupation_id" id="occupation_id" class="form-control select2">
						<option>{{ trans('admin.choose') }}</option>
						@foreach(App\Models\Occupation::get() as $occupation)
						<option value="{{ $occupation->id }}"
							licenses="{{ $occupation->licenses }}"
							experiences="{{ $occupation->experiences }}"
							qualifications="{{ $occupation->qualifications }}"
							commercial_records="{{ $occupation->commercial_records }}"
						>{{ $occupation->{l('occupation_name')} }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('specialtie_id',trans('admin.specialtie_id')) !!}
					<span class="specialtie_id"></span>
				</div>
			</div>

			@push('js')
			<script type="text/javascript">
			function prepareUploadsForms(className){
				var val = $('#occupation_id option:selected').attr(className);
				if(val == 'enable'){
					$('.'+className).removeClass('hidden');
				}else{
					$('.'+className).addClass('hidden');
				}
			}
			$(document).on('change','#occupation_id',function(){
				$('.licenses,.experiences,.experiences,.qualifications,.commercial_records').addClass('hidden');
			});
			$(document).on('change','#specialtie_id',function(){
			var specialtie_id = $('#specialtie_id option:selected').val();
			if(specialtie_id > 0){
				prepareUploadsForms('licenses');
				prepareUploadsForms('experiences');
				prepareUploadsForms('qualifications');
				prepareUploadsForms('commercial_records');
			}
			});
			</script>
			@endpush
			<div class="col-md-12 col-lg-12 col-sm-12">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 hidden licenses">
						@include('admin.userjobs.upload_file',['file_name'=>'licenses'])
					</div>
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 hidden experiences">
						@include('admin.userjobs.upload_file',['file_name'=>'experiences'])
					</div>
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 hidden qualifications">
						@include('admin.userjobs.upload_file',['file_name'=>'qualifications'])
					</div>
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 hidden commercial_records">
						@include('admin.userjobs.upload_file',['file_name'=>'commercial_records'])
					</div>
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