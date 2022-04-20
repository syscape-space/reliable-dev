@extends('admin.index')
@section('content')
@include('admin.ajax',[
'typeForm'=>'edit',
'selectID'=>'country_id',
'parentValue'=>$orders->country_id,
'outputClass'=>'city_id',
'selectedvalue'=>$orders->city_id,
'url'=>aurl('orders/get/city/id'),
])
@include("admin.layouts.components.submit_form_ajax",["form"=>"#orders",'query'=>""])
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
				<a href="{{aurl('orders')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('orders/'.$orders->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('orders/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$orders->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$orders->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$orders->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['orders.destroy', $orders->id]
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

		{!! Form::open(['url'=>aurl('/orders/'.$orders->id),'method'=>'put','id'=>'orders','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('department_id',trans('admin.department_id')) !!}
					<div class="jstree_list"></div>
					<input type="hidden" name="department_id" class="department_id" value="{{ $orders->department_id }}">
				</div>
				<span class="loading"></span>
			</div>
			<div class="row show_form hidden">
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('user_id',trans('admin.user_id')) !!}
					{!! Form::select('user_id',App\Models\User::pluck('name','id'),$orders->user_id,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					{!! Form::label('order_type_id',trans('admin.order_type_id')) !!}
					{!! Form::select('order_type_id',App\Models\OrderType::pluck('type_name_ar','id'),$orders->order_type_id,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 hidden linked_order">
						<div class="form-group">
							{!! Form::label('linked_order',trans('admin.linked_order')) !!}
							{!! Form::select('linked_order',['yes'=>trans('admin.yes'),'no'=>trans('admin.no')],$orders->linked_order,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
						</div>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 main_order_id linked_order_box hidden">
						<div class="form-group">
							{!! Form::label('main_order_id',trans('admin.main_order_id')) !!}
							<span class="user_orders"></span>
						</div>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 linked_order_box hidden">
						<div class="form-group">
							{!! Form::label('show_order_data',trans('admin.show_order_data')) !!}
							{!! Form::select('show_order_data',['yes'=>trans('admin.yes'),'no'=>trans('admin.no')],$orders->show_order_data,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('order_title',trans('admin.order_title'),['class'=>' control-label']) !!}
					{!! Form::text('order_title',$orders->order_title,['class'=>'form-control','placeholder'=>trans('admin.order_title')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{!! Form::label('order_content',trans('admin.order_content'),['class'=>'control-label']) !!}
					{!! Form::textarea('order_content',$orders->order_content,['class'=>'form-control ckeditor','placeholder'=>trans('admin.order_content')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 filter">
			  <div class="row">
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="form-group">
						{!! Form::label('choose_service_provider',trans('admin.choose_service_provider')) !!}
						{!! Form::select('choose_service_provider',[
						'all'=>trans('admin.all'),
						'by_city'=>trans('admin.by_city'),
						'by_filter'=>trans('admin.by_filter'),
						//'by_occupation'=>trans('admin.by_occupation'),
						],$orders->choose_service_provider,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
					</div>
				</div>
				@include('admin.orders.tabs.choose_service_provider')
			 </div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('execution_time',trans('admin.execution_time'),['class'=>' control-label']) !!}
					{!! Form::text('execution_time',$orders->execution_time,['class'=>'form-control','placeholder'=>trans('admin.execution_time')]) !!}
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('amount',trans('admin.amount'),['class'=>' control-label']) !!}
					{!! Form::text('amount',$orders->amount,['class'=>'form-control','placeholder'=>trans('admin.amount')]) !!}
					@if($orders->refunded == 'yes')
					<div class="invalid-feedback">
						{{ trans('admin.amount_is_refuned') }}
					</div>
					@endif
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
			<div class="form-group">
			        <div class="custom-control custom-switch mt-4">
			            <input type="checkbox" class="custom-control-input checkinput" name="negotiable" value="yes" {{ $orders->negotiable == 'yes'?'checked':'' }} id="negotiable">
			            <label class="custom-control-label" for="negotiable">
			                {{ trans('admin.negotiable') }}
			            </label>
			        </div>
			    </div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('receive_offers',trans('admin.receive_offers')) !!}
					{!! Form::select('receive_offers',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],$orders->receive_offers,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>

			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="col-md-12"><b>{{ trans('admin.case_against') }}</b></div>
				@include('admin.orders.tabs.case_against')
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('assigning_arbitration',trans('admin.assigning_arbitration')) !!}
					{!! Form::select('assigning_arbitration',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],$orders->assigning_arbitration,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 arbitrators_list_box hidden">
				@include('admin.orders.tabs.arbitrators')
			</div>


			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('decisions_status',trans('admin.decisions_status')) !!}
					{!! Form::select('decisions_status',['pending'=>trans('admin.pending'),'accept'=>trans('admin.accept'),'refused'=>trans('admin.refused'),],$orders->decisions_status,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>

			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 decisions_refused_reason hidden">
				<div class="form-group">
					{!! Form::label('decisions_refused_reason',trans('admin.decisions_refused_reason'),['class'=>'control-label']) !!}
					{!! Form::textarea('decisions_refused_reason',$orders->decisions_refused_reason,['class'=>'form-control','placeholder'=>trans('admin.decisions_refused_reason')]) !!}
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
				"dz_param"=>"dz_order_attachments",
				"type"=>"edit",
				"id"=>$orders->id,
				"route"=>"orders",
				"path"=>"orders/".$orders->id,
				])
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<div class="form-group">
					{!! Form::label('order_status',trans('admin.order_status')) !!}
					{!! Form::select('order_status',['under_review'=>trans('admin.under_review'),'open'=>trans('admin.open'),'ongoing'=>'تحت التنفيذ','done'=>'مكتملة','closed'=>trans('admin.closed'),'close_and_refund'=>trans('admin.close_and_refund'),'refused'=>trans('admin.refused'),],$orders->order_status,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 reason_box {{ !in_array($orders->order_status,['close_and_refund','refused'])?'hidden':'' }}">
				<div class="form-group">
					{!! Form::label('system_messages',trans('admin.systemmessages')) !!}
					{!! Form::select('system_messages',App\Models\SystemMessage::where('special_for','orders')->pluck(l('message'),l('message')),$orders->system_messages,['class'=>'form-control system_message select2','placeholder'=>trans('admin.choose')]) !!}
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 reason_box {{ !in_array($orders->order_status,['close_and_refund','refused'])?'hidden':'' }}">
				<div class="form-group">
					{!! Form::label('reason',trans('admin.reason'),['class'=>'control-label']) !!}
					{!! Form::textarea('reason',$orders->reason,['class'=>'form-control','placeholder'=>trans('admin.reason')]) !!}
				</div>
			</div>

			</div> <!-- /.end form after select department -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
		<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
		{!! Form::close() !!}
	</div>
</div>
@push('js')
<script type="text/javascript">
$(document).ready(function(){

$(document).on('change','#system_messages',function(){
 var system_messages = $('#system_messages option:selected').val();
 $('#reason').val(system_messages);
});
$(document).on('change','#order_status',function(){
 var order_status = $('#order_status option:selected').val();
 if(order_status == 'close_and_refund' || order_status == 'refused'){
 	$('.reason_box').removeClass('hidden');
 }else{
 	$('.reason_box').removeClass('hidden');
 }
});


// Link With Main Order Start//
$(document).on('change','#user_id',function(){
	var user_id = $('#user_id option:selected').val();
	if(user_id > 0){
		$.ajax({
			url:'{{ aurl('orders/get/user/orders') }}',
			dataType:'html',
			type:'post',
			data:{_token:'{{ csrf_token() }}',user_id:user_id,selected:''},
			beforeSend:function(){
				$('.user_orders').html('<i class="fa fa-spinner fa-spin"></i>');
			},success:function(data){
				$('.linked_order').removeClass('hidden');
				$('.user_orders').html(data);
				$('select[name="main_order_id"]').select2({ width: 'resolve' }).css('width','100%');
			},error:function(){
				$('.user_orders').html('');
			}
		});
	}
});

		$.ajax({
			url:'{{ aurl('orders/get/user/orders') }}',
			dataType:'html',
			type:'post',
			data:{_token:'{{ csrf_token() }}',user_id:'{{ $orders->user_id }}',selected:'{{ $orders->main_order_id }}',without_order:'{{ $orders->id }}'},
			beforeSend:function(){
				$('.user_orders').html('<i class="fa fa-spinner fa-spin"></i>');
			},success:function(data){
				$('.linked_order').removeClass('hidden');
				$('.user_orders').html(data);
				$('select[name="main_order_id"]').select2({ width: 'resolve' }).css('width','100%');
			},error:function(){
				$('.user_orders').html('');
			}
		});

$(document).on('change','#linked_order',function(){
	var linked_order = $('#linked_order option:selected').val();
	if(linked_order == 'yes'){
		$('.linked_order_box').removeClass('hidden');
	}else{
		$('.linked_order_box').addClass('hidden');
	}
});

@if($orders->linked_order == 'yes')
		$('.linked_order_box').removeClass('hidden');
@else
		$('.linked_order_box').addClass('hidden');
@endif

// Link With Main Order End //

$(document).on('change','#decisions_status',function(){
 var decisions_status = $('#decisions_status option:selected').val();
  if(decisions_status == 'refused'){
  	$('.decisions_refused_reason').removeClass('hidden');
  }else{
  	$('.decisions_refused_reason').addClass('hidden');
  }
});

if('{{ $orders->decisions_status }}' == 'refused'){
  	$('.decisions_refused_reason').removeClass('hidden');
  }else{
  	$('.decisions_refused_reason').addClass('hidden');
  }

// Check If Button Available With Event//
$('.jstree_list').jstree({
"core" : {
'data' : {!! load_dep($orders->department_id) !!},
"themes" : {
"multiple" : false,
"animation" : 0,
"variant" : "large"
}
},
 'types': {
            // 'selectable': {
            //     'icon': 'https://img.favpng.com/9/20/2/categories-icon-configuration-icon-document-icon-png-favpng-08ksTSTWmWu1hwYrd3MPLUf8L.jpg'
            // },
            // 'default': {
            //     'icon': 'https://img.favpng.com/9/20/2/categories-icon-configuration-icon-document-icon-png-favpng-08ksTSTWmWu1hwYrd3MPLUf8L.jpg'
            // }
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

var department_id = r.join(', ');
$('.department_id').val(department_id);
//show_form
//card-footer
$.ajax({
 url:'{{ aurl('departments/check/available/add/order') }}',
 data:{_token:'{{ csrf_token() }}',department_id:department_id},
 dataType:'json',
 type:'post',
 beforeSend: function(){
 	$('.loading').html('<i class="fa fa-spinner fa-spin"></i>');
 		$('.show_form,.card-footer').addClass('hidden');
 },
 success: function(data){
 	$('.loading').html('');
 	if(data.enable_post){
 		$('.show_form,.card-footer').removeClass('hidden');
 		$('.select2-container').css('width','100% !important');
 	}else{
 		$('.show_form,.card-footer').addClass('hidden');
 	const Sweet2 = Swal.mixin({
      //input: 'text',
      toast: true,
      position: 'middle',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
    });
 	  Sweet2.fire({
        icon: 'error',
        type: 'error',
        title: ' {{ trans('admin.alert') }} :',
        text: ' {{ trans('admin.cannot_add_post_to_this_department') }} '
      });
 	}
 }
});
})
// create the instance
.jstree();

});
</script>
@endpush
@endsection