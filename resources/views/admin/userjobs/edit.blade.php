@extends('admin.index')
@section('content')
@include('admin.ajax',[
'typeForm'=>'edit',
'selectID'=>'occupation_id',
'parentValue'=>$userjobs->occupation_id,
'outputClass'=>'specialtie_id',
'selectedvalue'=>$userjobs->specialtie_id,
'url'=>aurl('userjobs/get/specialtie/id'),
])
@include("admin.layouts.components.submit_form_ajax",["form"=>"#userjobs"])
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
				<a href="{{aurl('userjobs')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('userjobs/'.$userjobs->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('userjobs/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$userjobs->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$userjobs->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$userjobs->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['userjobs.destroy', $userjobs->id]
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

		{!! Form::open(['url'=>aurl('/userjobs/'.$userjobs->id),'method'=>'put','id'=>'userjobs','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_id',trans('admin.user_id'),['class'=>'control-label']) !!}
					{!! Form::select('user_id',App\Models\User::where('membership_type','vendor')->pluck('name','id'), $userjobs->user_id ,['class'=>'form-control select2','placeholder'=>trans('admin.user_id')]) !!}
				</div>
			</div>

			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('occupation_id',trans('admin.occupation_id')) !!}
					<select name="occupation_id" id="occupation_id" class="form-control select2">
						<option>{{ trans('admin.choose') }}</option>
						@foreach(App\Models\Occupation::get() as $occupation)
						<option value="{{ $occupation->id }}"
							{{ $userjobs->occupation_id == $occupation->id?'selected':'' }}
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
					{!! Form::label('specialtie_id',trans('admin.specialtie_id'),['class'=>'control-label']) !!}
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

				prepareUploadsForms('licenses');
				prepareUploadsForms('experiences');
				prepareUploadsForms('qualifications');
				prepareUploadsForms('commercial_records');

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
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
		<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
		{!! Form::close() !!}
	</div>
</div>
@endsection