@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#users",'query'=>'?membership_type'.request('?membership_type')])
@include('admin.ajax',[
'typeForm'=>'create',
'selectID'=>'country_id',
'outputClass'=>'city_id',
'url'=>aurl('users/get/city/id'),
])
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
				<a href="{{ aurl('users') }}"  style="color:#343a40"  class="dropdown-item">
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
		{!! Form::open(['url'=>aurl('/users'),'id'=>"users",'files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('first_name',trans('admin.first_name'),['class'=>' control-label']) !!}
					{!! Form::text('first_name',old('first_name'),['class'=>'form-control','placeholder'=>trans('admin.first_name')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('middle_name',trans('admin.middle_name'),['class'=>' control-label']) !!}
					{!! Form::text('middle_name',old('middle_name'),['class'=>'form-control','placeholder'=>trans('admin.middle_name')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('last_name',trans('admin.last_name'),['class'=>' control-label']) !!}
					{!! Form::text('last_name',old('last_name'),['class'=>'form-control','placeholder'=>trans('admin.last_name')]) !!}
				</div>
			</div>
@push('js')
<script type="text/javascript">
$(document).on('keyup','#first_name,#middle_name,#last_name',function(){
 var first_name = $('#first_name').val();
 var middle_name = $('#middle_name').val();
 var last_name = $('#last_name').val();
  $('#name').val(first_name+' '+middle_name+' '+last_name);
});
</script>
@endpush
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('name',trans('admin.name'),['class'=>' control-label']) !!}
					{!! Form::text('name',old('name'),['class'=>'form-control','readonly'=>'readonly','placeholder'=>trans('admin.name')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('email',trans('admin.email'),['class'=>'control-label']) !!}
					{!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('email_verify_code',trans('admin.email_verify_code'),['class'=>' control-label']) !!}
					{!! Form::text('email_verify_code',old('email_verify_code'),['class'=>'form-control','placeholder'=>trans('admin.email_verify_code')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('email_verify',trans('admin.email_verify')) !!}
					{!! Form::select('email_verify',['pending'=>trans('admin.pending'),'verified'=>trans('admin.verified'),],old('email_verify'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('country_id',trans('admin.country_id')) !!}
					{!! Form::select('country_id',App\Models\Country::pluck('country_name_ar','id'),old('country_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('city_id',trans('admin.city_id')) !!}
					<span class="city_id"></span>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('mobile',trans('admin.mobile'),['class'=>' control-label']) !!}
					{!! Form::text('mobile',old('mobile'),['class'=>'form-control','placeholder'=>trans('admin.mobile')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('mobile_verify',trans('admin.mobile_verify')) !!}
					{!! Form::select('mobile_verify',['pending'=>trans('admin.pending'),'verified'=>trans('admin.verified'),],old('mobile_verify'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('mobile_verify_code',trans('admin.mobile_verify_code'),['class'=>' control-label']) !!}
					{!! Form::text('mobile_verify_code',old('mobile_verify_code'),['class'=>'form-control','placeholder'=>trans('admin.mobile_verify_code')]) !!}
				</div>
			</div>
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
				<div class="form-group">
					{!! Form::label('account_type',trans('admin.account_type')) !!}
					{!! Form::select('account_type',['individual'=>trans('admin.individual'),'company'=>trans('admin.company'),],old('account_type'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 photo_profile">
				<div class="form-group">
					<label for="'photo_profile'">{{ trans('admin.photo_profile') }}</label>
					<div class="input-group">
						<div class="custom-file">
							{!! Form::file('photo_profile',['class'=>'custom-file-input','placeholder'=>trans('admin.photo_profile'),"accept"=>it()->acceptedMimeTypes("image"),"id"=>"photo_profile"]) !!}
							{!! Form::label('photo_profile',trans('admin.photo_profile'),['class'=>'custom-file-label']) !!}
						</div>
						<div class="input-group-append">
							<span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('password',trans('admin.password')) !!}
					{!! Form::password('password',['class'=>'form-control','placeholder'=>trans('admin.password')]) !!}
				</div>
			</div>

			<input type="hidden" name="membership_type" value="{{ request('membership_type') }}">

			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('id_number',trans('admin.id_number'),['class'=>' control-label']) !!}
					{!! Form::text('id_number',old('id_number'),['class'=>'form-control','placeholder'=>trans('admin.id_number')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('id_type',trans('admin.id_type')) !!}
					{!! Form::select('id_type',['national_id'=>trans('admin.national_id'),'iqama'=>trans('admin.iqama'),'passport'=>trans('admin.passport'),],old('id_type'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('id_status',trans('admin.id_status')) !!}
					{!! Form::select('id_status',['pending'=>trans('admin.pending'),'verified'=>trans('admin.verified'),'refused'=>trans('admin.refused'),],old('id_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<!-- Date range -->
				<div class="form-group">
					{!! Form::label('birth_date',trans('admin.birth_date')) !!}
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							</span>
						</div>
						{!! Form::text('birth_date',old('birth_date'),['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.birth_date'),'readonly'=>'readonly']) !!}
					</div>
					<!-- /.input group -->
				</div>
				<!-- /.form group -->
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('address',trans('admin.address'),['class'=>' control-label']) !!}
					{!! Form::text('address',old('address'),['class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
				</div>
			</div>

			{!! Form::hidden('lng',old('lng'),['class'=>'form-control lng','placeholder'=>trans('admin.lng')]) !!}
			{!! Form::hidden('lat',old('lat'),['class'=>'form-control lat','placeholder'=>trans('admin.lat')]) !!}
			<div class="map" id="map" style="width:100%;height:450px"></div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('rate_overall',trans('admin.rate_overall'),['class'=>' control-label']) !!}
					{!! Form::text('rate_overall',old('rate_overall'),['class'=>'form-control','placeholder'=>trans('admin.rate_overall')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('bio',trans('admin.bio'),['class'=>'control-label']) !!}
					{!! Form::textarea('bio',old('bio'),['class'=>'form-control','placeholder'=>trans('admin.bio')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('gender',trans('admin.gender')) !!}
					{!! Form::select('gender',['male'=>trans('admin.male'),'female'=>trans('admin.female'),],old('gender'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('account_status',trans('admin.account_status')) !!}
					{!! Form::select('account_status',['pending'=>trans('admin.pending'),'active'=>trans('admin.active'),'refused'=>trans('admin.refused'),'ban'=>trans('admin.ban'),],old('account_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
@push('js')
<script type="text/javascript">
$(document).on('change','#account_status', function(){
 var account_status = $('#account_status option:selected').val();
 if(account_status == 'refused'){
 	$('.refused_reason').removeClass('hidden');
 	$('.ban').addClass('hidden');
 }else if(account_status == 'ban'){
 	$('.ban').removeClass('hidden');
 	$('.refused_reason').addClass('hidden');
 }else{
 	$('.refused_reason,.ban').addClass('hidden');
 }
});
</script>
@endpush
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ban hidden">
				<!-- Date range -->
				<div class="form-group">
					{!! Form::label('ban_end_at',trans('admin.ban_end_at')) !!}
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							</span>
						</div>
						{!! Form::text('ban_end_at',old('ban_end_at'),['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.ban_end_at'),'readonly'=>'readonly']) !!}
					</div>
					<!-- /.input group -->
				</div>
				<!-- /.form group -->
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ban hidden">
				<div class="form-group">
					{!! Form::label('ban_reason',trans('admin.ban_reason'),['class'=>'control-label']) !!}
					{!! Form::textarea('ban_reason',old('ban_reason'),['class'=>'form-control','placeholder'=>trans('admin.ban_reason')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 refused_reason hidden">
				<div class="form-group">
					{!! Form::label('refused_reason',trans('admin.refused_reason'),['class'=>'control-label']) !!}
					{!! Form::textarea('refused_reason',old('refused_reason'),['class'=>'form-control','placeholder'=>trans('admin.refused_reason')]) !!}
				</div>
			</div>

			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('system_comment',trans('admin.system_comment'),['class'=>'control-label']) !!}
					{!! Form::textarea('system_comment',old('system_comment'),['class'=>'form-control','placeholder'=>trans('admin.system_comment')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<!-- Date range -->
				<div class="form-group">
					{!! Form::label('subscribe_end_at',trans('admin.subscribe_end_at')) !!}
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							</span>
						</div>
						{!! Form::text('subscribe_end_at',old('subscribe_end_at'),['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.subscribe_end_at'),'readonly'=>'readonly']) !!}
					</div>
					<!-- /.input group -->
				</div>
				<!-- /.form group -->
			</div>
			@if(request('membership_type') == 'employee')
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('company_id',trans('admin.company_id')) !!}
					{!! Form::select('company_id',App\Models\User::where('membership_type','vendor')->pluck('name','id'),old('company_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			@endif
@push('js')
<script type="text/javascript">
$(document).on('change','#add_offer,#add_request',function(){
	var add_request = $('#add_request option:selected').val();
	var add_offer = $('#add_offer option:selected').val();
	if(add_offer == 'disable'){
		$('.disable_adding_offer_reason').removeClass('hidden');
	}else{
		$('.disable_adding_offer_reason').addClass('hidden');
	}

	if(add_request == 'disable'){
		$('.disable_adding_request_reason').removeClass('hidden');
	}else{
		$('.disable_adding_request_reason').addClass('hidden');
	}
});
</script>
@endpush
@if (request('membership_type')=='vendor')
	
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('add_offer',trans('admin.add_offer')) !!}
					{!! Form::select('add_offer',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),],old('add_offer'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
@endif

			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('add_request',trans('admin.add_request')) !!}
					{!! Form::select('add_request',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable'),],old('add_request'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 disable_adding_offer_reason hidden">
				<div class="form-group">
					{!! Form::label('disable_adding_offer_reason',trans('admin.disable_adding_offer_reason'),['class'=>'control-label']) !!}
					{!! Form::textarea('disable_adding_offer_reason',old('disable_adding_offer_reason'),['class'=>'form-control','placeholder'=>trans('admin.disable_adding_offer_reason')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 disable_adding_request_reason hidden">
				<div class="form-group">
					{!! Form::label('disable_adding_request_reason',trans('admin.disable_adding_request_reason'),['class'=>'control-label']) !!}
					{!! Form::textarea('disable_adding_request_reason',old('disable_adding_request_reason'),['class'=>'form-control','placeholder'=>trans('admin.disable_adding_request_reason')]) !!}
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