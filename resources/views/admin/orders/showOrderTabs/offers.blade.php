<div class="row">
	<div class="col-12">
		@foreach($offers as $offer)
		<div class="post clearfix">
			<div class="user-block float-left">
				<span class="description">
					<a href="{{ aurl('orderoffers/'.$offer->id) }}" target="_blank">{{ trans('admin.offer_id') }} : #{{ $offer->id }}</a>
				</span>
				@include('admin.show_image',['image'=>$offer->vendor->photo_profile])
				<span class="username">
					<a href="{{ aurl('users/'.$offer->vendor_id) }}" target="_blank">{{ $offer->vendor->name }}</a>
				</span>
				{{-- <span class="description timeago" datetime="{{ $offer->created_at }}"></span> --}}
				<i class="fa fa-clock d-inline"></i> <time class="description timeago d-inline" datetime="{{ $offer->created_at }}" title="{{ $offer->created_at }}"></time>
			</div>
			<!-- /.user-block -->
			<p class="mt-3">{{-- {{ trans('admin.vendor_comment') }} : --}} {{ $offer->vendor_comment }}</p>
			@if(!empty($offer->requester_rate) || !empty($offer->user_offer_rate))
			<p class="border-top col-md-9 offset-3">
				@if(!empty($offer->requester_rate))
				<p>
					<small>
					{{ trans('admin.requester_rate') }} :  @include('admin.layouts.components.rate',['rate'=>$offer->requester_rate])  {{ !empty($offer->requester_feedback)?'/'.$offer->requester_feedback:'' }}
					</small>
				</p>
				@endif
				@if(!empty($offer->user_offer_rate))
				<p>
					<small>
					{{ trans('admin.user_offer_rate') }} :  @include('admin.layouts.components.rate',['rate'=>$offer->user_offer_rate])
					{{ !empty($offer->user_offer_comment)?'/'.$offer->user_offer_comment:'' }}
					</small>
				</p>
				@endif
			</p>
			@endif
			<table class="table table-border table-striped table-hovered">
				<tr>
					<td>{{ trans('admin.price') }} : {{ number_format($offer->price) }}</td>
					<td>{{ trans('admin.execution_time') }} : {{ $offer->execution_time }}</td>
					<td>{{ trans('admin.offer_status') }} :
						<span class="badge
							{{ $offer->offer_status == 'pending'?'bg-warning':'' }}
							{{ $offer->offer_status == 'approved'?'bg-success':'' }}
							{{ $offer->offer_status == 'refused'?'bg-danger':'' }}
							">
							{{ trans('admin.'.$offer->offer_status) }}
						</span>
					</td>
					<td><a href="{{ aurl('orderoffers/'.$offer->id.'/edit') }}" target="_blank"><i class="fa fa-edit"></i> {{ trans('admin.edit') }}</a></td>
					{{-- 		<td>{{ trans('admin.requester_rate') }}</td>
					<td>{{ trans('admin.requester_feedback') }}</td>
					<td>{{ trans('admin.feedback_requester_status_by_admin') }}</td>
					<td>{{ trans('admin.user_offer_objected_status') }}</td>
					<td>{{ trans('admin.user_offer_objected_endat') }}</td>
					<td>{{ trans('admin.user_offer_rate') }}</td>
					<td>{{ trans('admin.user_offer_comment') }}</td>
					<td>{{ trans('admin.feedback_user_offer_status_by_admin') }}</td>
					<td>{{ trans('admin.requester_objected_status') }}</td>
					<td>{{ trans('admin.requester_objected_endat') }}</td>
					<td>{{ trans('admin.created_at') }}</td> --}}
				</tr>
			</table>
			<p>
				@foreach(\App\Models\Files::where('type_id',$offer->id)->where('type_file','orderoffers')->get() as $file)
				<bdi>
				<a href="{{ it()->url($file->full_path) }}" target="_blank" title="{{ $file->name }}" class="link-black text-sm"><i class="fas fa-link mr-1"></i> {{ $file->name }} - {{ $file->size }}</a>
				</bdi>
				@endforeach
			</p>
		</div>
		@endforeach
		{!! $offers->appends(['tab'=>request('tab')])->render() !!}
	</div>
</div>