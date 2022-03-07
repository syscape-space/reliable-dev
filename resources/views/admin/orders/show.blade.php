@extends('admin.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a>{{ trans('admin.show')}}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('orders')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('orders/'.$orders->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('orders/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$orders->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
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
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$orders->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['orders.destroy', $orders->id]
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
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mb-3">
				<div class="row">
					<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
						<b>{{trans('admin.id')}} :</b> {{$orders->id}}
					</div>
					@if(!empty($orders->admin_id()->first()))
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
						<b>{{trans('admin.admin_id')}} :</b>
						{{ $orders->admin_id()->first()->name }}
					</div>
					@endif
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-3"></div>
					@if($orders->linked_order == 'yes')
					 	 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					 		<b>{{ trans('admin.linked_order') }}</b> : {{ trans('admin.yes') }}
						 </div>
					 	@if($orders->main_order_id()->first())
					 	<div class="col-md-4">
					 		<b>{{ trans('admin.main_order_id') }}</b> : <a href="{{ aurl('orders/'.$orders->main_order_id) }}" target="_blank">
					 			{{ $orders->main_order_id()->first()->order_title }}
					 		</a>
					 	</div>
					 	@endif
					 	 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					 		<b>{{ trans('admin.show_order_data') }}</b> : {{ trans('admin.'.$orders->show_order_data) }}
						 </div>

					 @else
					 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					 	<b>{{ trans('admin.linked_order') }}</b> : {{ trans('admin.no') }}
					 </div>
					@endif
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
				<b>{{trans('admin.department_id')}} :</b>
				@if(!empty($orders->department_id()->first()))
				{{ $orders->department_id()->first()->department_name_ar }}
				@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.user_id')}} :</b>
				@if(!empty($orders->user_id()->first()))
				<b><a href="{{ aurl('users/'.$orders->user_id) }}" target="_blank">{{ $orders->user_id()->first()->name }}</a></b>
				@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.order_type_id')}} :</b>
				@if(!empty($orders->order_type_id()->first()))
				{{ $orders->order_type_id()->first()->{l('type_name')} }}
				@endif
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3 mb-3">
				<b>{{trans('admin.order_title')}} :</b>
				{!! $orders->order_title !!}
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="card-order_content">
					<div class="card">
						<div class="card-header">
							<a class="collapsed card-link" data-toggle="collapse" data-parent="#card-order_content" href="#order_content"><i class="fa fa-file"></i> {{ trans('admin.order_content') }}</a>
						</div>
						<div id="order_content" class="collapse">
							<div class="card-body">
								{!! $orders->order_content !!}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.choose_service_provider')}} :</b>
				{{ trans("admin.".$orders->choose_service_provider) }}
			</div>
			@if($orders->choose_service_provider == 'by_city')
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.country_id')}} :</b>
				@if(!empty($orders->country_id()->first()))
				{{ $orders->country_id()->first()->country_name_ar }}
				@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.city_id')}} :</b>
				@if(!empty($orders->city_id()->first()))
				{{ $orders->city_id()->first()->city_name_ar }}
				@endif
			</div>
			@endif
			@if(!empty($orders->order_vendors()->get()))
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="form-group">
					{{ trans('admin.vendors') }} :
					@foreach($orders->order_vendors()->get() as $vendor)
					<b><a href="{{ aurl('users/'.$vendor->user_id) }}" target="_blank">{{ $vendor->user_id()->first()->name }}</a></b> ,
					@endforeach
				</div>
				<hr />
			</div>
			@endif
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.execution_time')}} :</b>
				{!! $orders->execution_time !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.amount')}} :</b>
				{!! $orders->amount !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.negotiable')}} :</b>
				{!! trans('admin.'.$orders->negotiable) !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.receive_offers')}} :</b>
				{{ trans("admin.".$orders->receive_offers) }}
			</div>

			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-3">
				{{-- <div class="col-md-12"><b>{{ trans('admin.case_against') }}</b></div> --}}
				<div id="card-case_against">
					<div class="card">
						<div class="card-header">
							<a class="collapsed card-link" data-toggle="collapse" data-parent="#card-case_against" href="#card-element-case_against"><i class="fa fa-users"></i> {{ trans('admin.case_against') }} </a>
						</div>
						<div id="card-element-case_against" class="collapse">
							<div class="card-body">
								<table class="table table-borderd table-hoverd table-striped">
									<tr>
										<td>{{ trans('admin.name') }}</td>
										<td>{{ trans('admin.id_number') }}</td>
										<td>{{ trans('admin.nationality') }}</td>
									</tr>
									@foreach($orders->order_case_againsts()->get() as $against)
									<tr>
										<td>{{ $against->name }}</td>
										<td>{{ $against->id_number }}</td>
										<td>{{ $against->nationality }}</td>
									</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.assigning_arbitration')}} :</b>
				{{ !is_null($orders->assigning_arbitration)?trans("admin.".$orders->assigning_arbitration):trans('admin.no') }}
			</div>
			@if(!empty($orders->arbitrators()->get()) && $orders->arbitrators()->count() > 0)
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mb-3">
				<div class="form-group">
					{{ trans('admin.arbitrators') }} :
					@foreach($orders->arbitrators()->get() as $arbitrator)
					<b><a href="{{ aurl('users/'.$arbitrator->arbitrator_id) }}" target="_blank">{{ $arbitrator->arbitrator_id()->first()->name }}</a></b> ,
					@endforeach
				</div>
			</div>
			@endif
			@if(!empty($orders->decisions_status))
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.decisions_status')}} :</b>
				{{ trans("admin.".$orders->decisions_status) }}
			</div>
			@endif
			@if(!empty($orders->decisions_refused_reason))
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<b>{{trans('admin.decisions_refused_reason')}} :</b>
				{!! $orders->decisions_refused_reason !!}
			</div>
			@endif
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div id="card-attachments">
					<div class="card">
						<div class="card-header">
							<a class="collapsed card-link" data-toggle="collapse" data-parent="#card-attachments" href="#attachments"><i class="fa fa-file"></i> {{ trans('admin.attachments') }}</a>
						</div>
						<div id="attachments" class="collapse">
							<div class="card-body">
								<table class="table table-bordered table-hover">
									@foreach(\App\Models\Files::where('type_id',$orders->id)->where('type_file','orders')->get() as $forders)
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
			@if(!is_null($orders->refunded))
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.refunded')}} :</b>
				{{ trans("admin.".$orders->refunded) }}
			</div>
			@endif
			<div class="col-lg-4 col-md-4 col-sm-4 m-2 col-xs-12">
				<b>{{trans('admin.order_status')}} :</b>
				{{ trans("admin.".$orders->order_status) }}
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-3 {{ !in_array($orders->order_status,['close_and_refund','refused'])?'hidden':'' }}">
				<b>{{trans('admin.reason')}} :</b>
				{{ $orders->reason }}
			</div>

			</div> <!-- /.end form after select department -->
			@include('admin.orders.showOrderTabs.offers_and_invoice')
			</div>
		</div>
		<!-- /.row -->
	</div>
</div>
<!-- /.card-body -->
<div class="card-footer">
</div>
</div>
@endsection