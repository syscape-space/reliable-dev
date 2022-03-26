@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#packagerequests",'query'=>""])
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
				<a href="{{aurl('packagerequests')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('packagerequests/'.$packagerequests->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('packagerequests/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$packagerequests->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$packagerequests->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$packagerequests->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['packagerequests.destroy', $packagerequests->id]
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
		{!! Form::open(['url'=>aurl('/packagerequests/'.$packagerequests->id),'method'=>'put','id'=>'packagerequests','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
			<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('package_id',trans('admin.package_id')) !!}
					{!! Form::select('package_id',App\Models\VendorPackage::pluck('package_title','id'),$packagerequests->package_id,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_id',trans('admin.user_id')) !!}
					{!! Form::select('user_id',App\Models\User::where('membership_type','user')->pluck('name','id'),$packagerequests->user_id,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('suspended_balance',trans('admin.suspended_balance')) !!}
					{!! Form::select('suspended_balance',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],$packagerequests->suspended_balance,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
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
					],$packagerequests->request_status,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('invoiced',trans('admin.invoiced')) !!}
					{!! Form::select('invoiced',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],$packagerequests->invoiced,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
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
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 {{ $packagerequests->request_status == 'refused'?'':'hidden' }} refused_reason ">
				<div class="form-group">
					{!! Form::label('refused_reason',trans('admin.refused_reason'),['class'=>'control-label']) !!}
					{!! Form::textarea('refused_reason',$packagerequests->refused_reason,['class'=>'form-control','placeholder'=>trans('admin.refused_reason')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('notes',trans('admin.notes'),['class'=>'control-label']) !!}
					{!! Form::textarea('notes',$packagerequests->notes,['class'=>'form-control','placeholder'=>trans('admin.notes')]) !!}
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