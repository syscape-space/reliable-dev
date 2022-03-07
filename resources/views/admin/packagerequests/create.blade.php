@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#packagerequests"])
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
				<a href="{{ aurl('packagerequests') }}"  style="color:#343a40"  class="dropdown-item">
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
		{!! Form::open(['url'=>aurl('/packagerequests'),'id'=>'packagerequests','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('package_id',trans('admin.package_id')) !!}
					{!! Form::select('package_id',App\Models\VendorPackage::pluck('package_title','id'),old('package_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_id',trans('admin.user_id')) !!}
					{!! Form::select('user_id',App\Models\User::where('membership_type','user')->pluck('name','id'),old('user_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('suspended_balance',trans('admin.suspended_balance')) !!}
					{!! Form::select('suspended_balance',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],old('suspended_balance'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('request_status',trans('admin.request_status')) !!}
					{!! Form::select('request_status',[
					'pending'=>trans('admin.pending'),
					'approved'=>trans('admin.approved'),
					'refused'=>trans('admin.refused'),
					'done'=>trans('admin.done'),
					'recovered'=>trans('admin.recovered'),
					],old('request_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('invoiced',trans('admin.invoiced')) !!}
					{!! Form::select('invoiced',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],old('invoiced'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			@push('js')
			<script type="text/javascript">
			$(document).on('change','#request_status',function(){
			var request_status = $('#request_status option:selected').val();
			if(request_status == 'refused'){
				$('.refused_reason').removeClass('hidden');
			}else{
				$('.refused_reason').addClass('hidden');
			}
			});
			</script>
			@endpush
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 refused_reason hidden">
				<div class="form-group">
					{!! Form::label('refused_reason',trans('admin.refused_reason'),['class'=>'control-label']) !!}
					{!! Form::textarea('refused_reason',old('refused_reason'),['class'=>'form-control','placeholder'=>trans('admin.refused_reason')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('notes',trans('admin.notes'),['class'=>'control-label']) !!}
					{!! Form::textarea('notes',old('notes'),['class'=>'form-control','placeholder'=>trans('admin.notes')]) !!}
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