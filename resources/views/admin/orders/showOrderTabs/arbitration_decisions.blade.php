<div class="row">
	<div class="col-12">
		@foreach($arbitration_decisions as $arbitration)
		<div class="post clearfix">
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
			<div class="user-block float-left">
				<span class="description">
					<a href="{{ aurl('orderarbitrators/'.$arbitration->id) }}" target="_blank">{{ trans('admin.offer_id') }} : #{{ $arbitration->id }}</a>
				</span>
				@include('admin.show_image',['image'=>$arbitration->arbitrator_id()->first()->photo_profile])
				<span class="username">
					<a href="{{ aurl('users/'.$arbitration->arbitrator_id) }}" target="_blank">{{ $arbitration->arbitrator_id()->first()->name }}</a>
				</span>
				{{-- <span class="description timeago" datetime="{{ $arbitration->created_at }}"></span> --}}
				<i class="fa fa-clock d-inline"></i> <time class="description timeago d-inline" datetime="{{ $arbitration->created_at }}" title="{{ $arbitration->created_at }}"></time>
			</div>
			<!-- /.user-block -->
			</div>
			<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 float-right">
				<p class="mt-3">
					{{ trans('admin.arbitrator_decision') }} : {{ $arbitration->arbitrator_decision }}
					<hr />
					<table class="table table-border table-striped table-hovered">
						<tr>
							<td>
								{{ trans('admin.user_accept_decision') }} :
								<span class="badge
									{{ $arbitration->user_accept_decision == 'pending'?'bg-warning':'' }}
									{{ $arbitration->user_accept_decision == 'accept'?'bg-success':'' }}
									{{ $arbitration->user_accept_decision == 'reject'?'bg-danger':'' }}
									">
									{{ trans('admin.'.$arbitration->user_accept_decision) }}
								</span>
							</td>
							<td>
								{{ trans('admin.vendor_accept_decision') }} :
								<span class="badge
									{{ $arbitration->vendor_accept_decision == 'pending'?'bg-warning':'' }}
									{{ $arbitration->vendor_accept_decision == 'accept'?'bg-success':'' }}
									{{ $arbitration->vendor_accept_decision == 'reject'?'bg-danger':'' }}
									">
									{{ trans('admin.'.$arbitration->vendor_accept_decision) }}
								</span>
							</td>
						</tr>
					</table>

				</p>
			</div>

			<table class="table table-border table-striped table-hovered">
				<tr>
					<td>{{ trans('admin.arbitrator_amount') }} : {{ number_format($arbitration->arbitrator_amount) }}</td>
					{{-- <td>{{ trans('admin.arbitrator_add_amount') }} : {{ trans('admin.'.$arbitration->arbitrator_add_amount) }}</td> --}}
					<td>{{ trans('admin.user_accept_amount') }} :
						<span class="badge
							{{ $arbitration->user_accept_amount == 'pending'?'bg-warning':'' }}
							{{ $arbitration->user_accept_amount == 'accept'?'bg-success':'' }}
							{{ $arbitration->user_accept_amount == 'reject'?'bg-danger':'' }}
							">
							{{ trans('admin.'.$arbitration->user_accept_amount) }}
						</span>
					</td>
					<td>{{ trans('admin.vendor_accept_amount') }} :
						<span class="badge
							{{ $arbitration->vendor_accept_amount == 'pending'?'bg-warning':'' }}
							{{ $arbitration->vendor_accept_amount == 'accept'?'bg-success':'' }}
							{{ $arbitration->vendor_accept_amount == 'reject'?'bg-danger':'' }}
							">
							{{ trans('admin.'.$arbitration->vendor_accept_amount) }}
						</span>
					</td>
					<td><a href="{{ aurl('orderarbitrators/'.$arbitration->id.'/edit') }}" target="_blank"><i class="fa fa-edit"></i> {{ trans('admin.edit') }}</a></td>
				</tr>
			</table>
		</div>
		@endforeach
		{!! $arbitration_decisions->appends(['tab'=>request('tab')])->render() !!}
	</div>
</div>