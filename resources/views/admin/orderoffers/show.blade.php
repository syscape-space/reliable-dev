@extends('admin.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a>{{!empty($title)?$title:''}}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('orderoffers')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('orderoffers/'.$orderoffers->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('orderoffers/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$orderoffers->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$orderoffers->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$orderoffers->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['orderoffers.destroy', $orderoffers->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
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
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				<b>{{trans('admin.id')}} :</b> {{$orderoffers->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			@if(!empty($orderoffers->vendor_id()->first()))
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.vendor_id')}} :</b>
				{{ $orderoffers->vendor_id()->first()->name }}
			</div>
			@endif
			@if(!empty($orderoffers->order_id()->first()))
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.order_id')}} :</b>
				<a href="{{ aurl('orders/'.$orderoffers->order_id) }}" target="_blank">{{ $orderoffers->order_id()->first()->order_title }}
				</a>
			</div>
			@endif
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<b>{{trans('admin.vendor_comment')}} :</b>
				{!! $orderoffers->vendor_comment !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.price')}} :</b>
				{!! $orderoffers->price !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.execution_time')}} :</b>
				{!! $orderoffers->execution_time !!}
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div id="card-attachments">
					<div class="card">
						<div class="card-header">
							<a class="collapsed card-link" data-toggle="collapse" data-parent="#card-attachments" href="#attachments"><i class="fa fa-file"></i> {{ trans('admin.attachments') }}</a>
						</div>
						<div id="attachments" class="collapse">
							<div class="card-body">
								<table class="table table-bordered table-hover">
									@foreach(\App\Models\Files::where('type_id',$orderoffers->id)->where('type_file','orderoffers')->get() as $forders)
									<tr>
										<td><a href="{{ it()->url($forders->full_path) }}" target="_blank" title="{{ $forders->name }}"><i class="fa fa-download"></i></a></td>
										<td>
											@if(preg_match('/^image/i',$forders->mimtype))
											@include('admin.show_image',[
											'image'=>$forders->full_path
											])
											@elseif(preg_match('/^video/i',$forders->mimtype))
											@include('admin.show_video',[
											'video'=>$forders->full_path
											])
											@elseif(preg_match('/^audio/i',$forders->mimtype))
											@include('admin.show_audio',[
											'audio'=>$forders->full_path
											])
											@endif
										</td>
										<td>{{ $forders->name }}</td>
										<td>{{ $forders->size }}</td>
									</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.offer_status')}} :</b>
				{{ trans("admin.".$orderoffers->offer_status) }}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.requester_rate')}} :</b>
				{{ trans("admin.".$orderoffers->requester_rate) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.requester_feedback')}} :</b>
				{!! $orderoffers->requester_feedback !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.feedback_requester_status_by_admin')}} :</b>
				{{ trans("admin.".$orderoffers->feedback_requester_status_by_admin) }}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.user_offer_objected_status')}} :</b>
				{{ trans("admin.".$orderoffers->user_offer_objected_status) }}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.user_offer_objected_endat')}} :</b>
				{!! $orderoffers->user_offer_objected_endat !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.user_offer_rate')}} :</b>
				{{ trans("admin.".$orderoffers->user_offer_rate) }}
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<b>{{trans('admin.user_offer_comment')}} :</b>
				{!! $orderoffers->user_offer_comment !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.feedback_user_offer_status_by_admin')}} :</b>
				{{ trans("admin.".$orderoffers->feedback_user_offer_status_by_admin) }}
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.requester_objected_status')}} :</b>
				{{ trans("admin.".$orderoffers->requester_objected_status) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.requester_objected_endat')}} :</b>
				{!! $orderoffers->requester_objected_endat !!}
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection