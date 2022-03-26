@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#orderoffers",'query'=>""])
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
				<a href="{{ aurl('orderoffers') }}"  style="color:#343a40"  class="dropdown-item">
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
		{!! Form::open(['url'=>aurl('/orderoffers'),'id'=>'orderoffers','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('order_id',trans('admin.order_id')) !!}
					{!! Form::select('order_id',App\Models\Order::pluck('order_title','id'),old('order_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('vendor_id',trans('admin.vendor_id')) !!}
					{!! Form::select('vendor_id',App\Models\User::where('membership_type','!=','user')->pluck('name','id'),old('vendor_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('vendor_comment',trans('admin.vendor_comment'),['class'=>'control-label']) !!}
					{!! Form::textarea('vendor_comment',old('vendor_comment'),['class'=>'form-control','placeholder'=>trans('admin.vendor_comment')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('price',trans('admin.price'),['class'=>' control-label']) !!}
					{!! Form::text('price',old('price'),['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('execution_time',trans('admin.execution_time'),['class'=>' control-label']) !!}
					{!! Form::text('execution_time',old('execution_time'),['class'=>'form-control','placeholder'=>trans('admin.execution_time')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				@include("admin.dropzone",[
				"thumbnailWidth"=>"80",
				"thumbnailHeight"=>"80",
				"parallelUploads"=>"20",
				"maxFiles"=>"30",
				"maxFileSize"=>"",
				"acceptedMimeTypes"=>it()->acceptedMimeTypes(""),
				"autoQueue"=>true,
				"dz_param"=>"dz_offer",
				"type"=>"create",
				"route"=>"orderoffers",
				"path"=>"orderoffers",
				])
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('offer_status',trans('admin.offer_status')) !!}
					{!! Form::select('offer_status',['pending'=>trans('admin.pending'),'approved'=>trans('admin.approved'),'refused'=>trans('admin.refused'),'cancelled'=>trans('admin.cancelled')],old('offer_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('requester_rate',trans('admin.requester_rate')) !!}
					{!! Form::select('requester_rate',['1'=>trans('admin.1'),'2'=>trans('admin.2'),'3'=>trans('admin.3'),'4'=>trans('admin.4'),'5'=>trans('admin.5'),],old('requester_rate'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('requester_feedback',trans('admin.requester_feedback'),['class'=>'control-label']) !!}
					{!! Form::textarea('requester_feedback',old('requester_feedback'),['class'=>'form-control','placeholder'=>trans('admin.requester_feedback')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('feedback_requester_status_by_admin',trans('admin.feedback_requester_status_by_admin')) !!}
					{!! Form::select('feedback_requester_status_by_admin',['pending'=>trans('admin.pending'),'approved'=>trans('admin.approved'),'refused'=>trans('admin.refused')],old('feedback_requester_status_by_admin'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_offer_objected_status',trans('admin.user_offer_objected_status')) !!}
					{!! Form::select('user_offer_objected_status',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),'ended'=>trans('admin.ended'),],old('user_offer_objected_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<!-- Date range -->
				<div class="form-group">
					{!! Form::label('user_offer_objected_endat',trans('admin.user_offer_objected_endat')) !!}
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							</span>
						</div>
						{!! Form::text('user_offer_objected_endat',old('user_offer_objected_endat'),['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.user_offer_objected_endat'),'readonly'=>'readonly']) !!}
					</div>
					<!-- /.input group -->
				</div>
				<!-- /.form group -->
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_offer_rate',trans('admin.user_offer_rate')) !!}
					{!! Form::select('user_offer_rate',['1'=>trans('admin.1'),'2'=>trans('admin.2'),'3'=>trans('admin.3'),'4'=>trans('admin.4'),'5'=>trans('admin.5'),],old('user_offer_rate'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_offer_comment',trans('admin.user_offer_comment'),['class'=>'control-label']) !!}
					{!! Form::textarea('user_offer_comment',old('user_offer_comment'),['class'=>'form-control','placeholder'=>trans('admin.user_offer_comment')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('feedback_user_offer_status_by_admin',trans('admin.feedback_user_offer_status_by_admin')) !!}
					{!! Form::select('feedback_user_offer_status_by_admin',['pending'=>trans('admin.pending'),'approved'=>trans('admin.approved'),'refused'=>trans('admin.refused')],old('feedback_user_offer_status_by_admin'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('requester_objected_status',trans('admin.requester_objected_status')) !!}
					{!! Form::select('requester_objected_status',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),'ended'=>trans('admin.ended'),],old('requester_objected_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<!-- Date range -->
				<div class="form-group">
					{!! Form::label('requester_objected_endat',trans('admin.requester_objected_endat')) !!}
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							</span>
						</div>
						{!! Form::text('requester_objected_endat',old('requester_objected_endat'),['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.requester_objected_endat'),'readonly'=>'readonly']) !!}
					</div>
					<!-- /.input group -->
				</div>
				<!-- /.form group -->
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