@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#balancewithdrawals",'query'=>""])
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
				<a href="{{ aurl('balancewithdrawals') }}"  style="color:#343a40"  class="dropdown-item">
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
		{!! Form::open(['url'=>aurl('/balancewithdrawals'),'id'=>'balancewithdrawals','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">

			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_id',trans('admin.user_id')) !!}
				<select class="form-control" id="user_id" style="width:100%" name="user_id"></select>
			</div>
		</div>
		<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
			<div class="user_info"></div>
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
			<div class="form-group">
				{!! Form::label('amount',trans('admin.amount'),['class'=>' control-label']) !!}
				{!! Form::text('amount',old('amount'),['class'=>'form-control','placeholder'=>trans('admin.amount'),'readonly'=>'readonly']) !!}
			</div>
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
			<div class="form-group">
				{!! Form::label('receipt_via',trans('admin.receipt_via')) !!}
				{!! Form::select('receipt_via',['bank_transfer'=>trans('admin.bank_transfer'),'bank_account'=>trans('admin.bank_account'),'system'=>trans('admin.system'),],old('receipt_via'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
			</div>
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 transfer_picture hidden">
			<div class="form-group">
				<label for="'transfer_picture'">{{ trans('admin.transfer_picture') }}</label>
				<div class="input-group">
					<div class="custom-file">
						{!! Form::file('transfer_picture',['class'=>'custom-file-input','placeholder'=>trans('admin.transfer_picture'),"accept"=>it()->acceptedMimeTypes(""),"id"=>"transfer_picture"]) !!}
						{!! Form::label('transfer_picture',trans('admin.transfer_picture'),['class'=>'custom-file-label']) !!}
					</div>
					<div class="input-group-append">
						<span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div class="form-group">
				{!! Form::label('user_notes',trans('admin.user_notes'),['class'=>'control-label']) !!}
				{!! Form::textarea('user_notes',old('user_notes'),['class'=>'form-control','placeholder'=>trans('admin.user_notes')]) !!}
				<small style="color:#c33">{{ trans('admin.user_notes_msg') }}</small>
			</div>
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
			<div class="form-group">
				{!! Form::label('withdrawal_status',trans('admin.withdrawal_status')) !!}
				{!! Form::select('withdrawal_status',[
				'pending'=>trans('admin.pending'),
				'approved'=>trans('admin.approved'),
				'refused'=>trans('admin.refused'),],old('withdrawal_status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 reason_box hidden">
			<div class="form-group">
				{!! Form::label('reason',trans('admin.reason'),['class'=>'control-label']) !!}
				{!! Form::textarea('reason',old('reason'),['class'=>'form-control','placeholder'=>trans('admin.reason')]) !!}
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div class="form-group">
				{!! Form::label('system_notes',trans('admin.system_notes'),['class'=>'control-label']) !!}
				{!! Form::textarea('system_notes',old('system_notes'),['class'=>'form-control','placeholder'=>trans('admin.system_notes')]) !!}
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

@push('js')
<script type="text/javascript">
$(document).ready(function(){
// Load All Users From Function In header
loadUsers("#user_id",{_token:'{{ csrf_token() }}'});

$(document).on('change','#user_id',function(){
 var user_id = $('#user_id option:selected').val();
	 if(user_id  > 0){
	 	$.ajax({
	 		url:'{{ aurl('users/get/user/info') }}',
	 		dataType:'json',
	 		type:'post',
	 		data:{_token:'{{ csrf_token() }}',user_id:user_id,selected:''},
	 		beforeSend: function(){
	 			$('.user_info').html('<i class="fa fa-spinner fa-spin"></i>');
	 		},success: function(result){
	 			var user_data = result.data;
	 			if(user_data !== null){
	 			$('.user_info').html(`
	 				<div class="alert alert-info">
	 				<p><a href="{{ aurl('users') }}/`+user_data.id+`/edit" target="_blank"><i class="fa fa-edit"></i> {{ trans('admin.edit') }}</a><p>
	 				<i class="fa fa-info fa-2x"></i> - {{ trans('admin.current_balance') }} : `+user_data.current_balance+`  <span class="amount"></span> <span class="total"></span> <hr />
	 				 {{ trans('admin.balancewithdrawals_msg') }}
	 				</div>
	 				`);
		 			$('#amount').prop('readonly',false).on('keyup',function(){
		 				var amount = Number($('#amount').val());
		 				$('.amount').text('- '+amount);
		 				$('.total').text('= '+(Number(user_data.current_balance)-amount) + ' {{ trans('admin.sar') }}');
		 			});
	 			}
	 		}
	 	});
	 }
 });



 $(document).on('change','#receipt_via',function(){
 var receipt_via = $('#receipt_via option:selected').val();
 if(receipt_via == 'bank_transfer'){
 	$('.transfer_picture').removeClass('hidden');
 }else{
 	$('.transfer_picture').addClass('hidden');
 }
 });

 $(document).on('change','#withdrawal_status',function(){
 var withdrawal_status = $('#withdrawal_status option:selected').val();
 if(withdrawal_status == 'refused'){
 	$('.reason_box').removeClass('hidden');
 }else{
 	$('.reason_box').addClass('hidden');
 }
 });

});
</script>
@endpush
@endsection