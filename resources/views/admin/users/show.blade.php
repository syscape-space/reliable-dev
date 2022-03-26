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
					<a href="{{aurl('users')}}" class="dropdown-item" style="color:#343a40">
						<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
					<a class="dropdown-item" style="color:#343a40" href="{{aurl('users/'.$users->id.'/edit')}}">
						<i class="fas fa-edit"></i> {{trans('admin.edit')}}
					</a>
					<a class="dropdown-item" style="color:#343a40" href="{{aurl('users/create')}}">
						<i class="fas fa-plus"></i> {{trans('admin.create')}}
					</a>
					<div class="dropdown-divider"></div>
					<a data-toggle="modal" data-target="#deleteRecord{{$users->id}}" class="dropdown-item" style="color:#343a40" href="#">
						<i class="fas fa-trash"></i> {{trans('admin.delete')}}
					</a>
				</div>
			</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$users->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$users->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['users.destroy', $users->id]
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
			@if(!empty($users->admin_id()->first()))
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<b>{{trans('admin.admin_id')}} :</b>
				{{ $users->admin_id()->first()->name }}
			</div>
			@endif
			<div class="clearfix"></div>
			<hr />
			<div class="col-md-4 col-lg-4 col-xs-4">
				<b>{{trans('admin.id')}} :</b> {{$users->id}}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.photo_profile')}} :</b>
				@include("admin.show_image",["image"=>$users->photo_profile])
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.first_name')}} :</b>
				{!! $users->first_name !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.middle_name')}} :</b>
				{!! $users->middle_name !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.last_name')}} :</b>
				{!! $users->last_name !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.name')}} :</b>
				{!! $users->name !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.email')}} :</b>
				{!! $users->email !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.mobile')}} :</b>
				{!! $users->mobile !!}
			</div>
			{{-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<b>{{trans('admin.email_verify_code')}} :</b>
			{!! $users->email_verify_code !!}
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<b>{{trans('admin.mobile_verify_code')}} :</b>
			{!! $users->mobile_verify_code !!}
		</div> --}}
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<b>{{trans('admin.address')}} :</b>
			{!! $users->address !!}
			<hr />
		</div>
		{{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.lng')}} :</b>
		{!! $users->lng !!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<b>{{trans('admin.lat')}} :</b>
		{!! $users->lat !!}
	</div> --}}
	@if($users->account_status == 'ban')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<b>{{trans('admin.ban_reason')}} :</b>
		{!! $users->ban_reason !!}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.ban_end_at')}} :</b>
		{!! $users->ban_end_at !!}
	</div>
	@elseif($users->account_status == 'refused')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<b>{{trans('admin.refused_reason')}} :</b>
		{!! $users->refused_reason !!}
	</div>
	@endif
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.birth_date')}} :</b>
		{!! $users->birth_date !!}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.subscribe_end_at')}} :</b>
		{!! $users->subscribe_end_at !!}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.add_offer')}} :</b>
		{{ trans("admin.".$users->add_offer) }}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.add_request')}} :</b>
		{{ trans("admin.".$users->add_request) }}
	</div>
	@if($users->add_offer == 'disable')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<b>{{trans('admin.disable_adding_offer_reason')}} :</b>
		{!! $users->disable_adding_offer_reason !!}
	</div>
	@endif
	@if($users->add_request == 'disable')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<b>{{trans('admin.disable_adding_request_reason')}} :</b>
		{!! $users->disable_adding_request_reason !!}
	</div>
	@endif
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.current_balance')}} :</b>
		{!! $users->current_balance !!}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.suspended_balance')}} :</b>
		{!! $users->suspended_balance !!}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.membership_type')}} :</b>
		{{ trans("admin.".$users->membership_type) }}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.account_type')}} :</b>
		{{ trans("admin.".$users->account_type) }}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.id_number')}} :</b>
		{!! $users->id_number !!}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.id_type')}} :</b>
		{{ trans("admin.".$users->id_type) }}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.id_status')}} :</b>
		{{ trans("admin.".$users->id_status) }}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.account_status')}} :</b>
		{{ trans("admin.".$users->account_status) }}
	</div>
	@if(!empty($users->company_id()->first()))
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.company_id')}} :</b>
		{{ $users->company_id()->first()->name }}
	</div>
	@endif
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<b>{{trans('admin.gender')}} :</b>
		{{ trans("admin.".$users->gender) }}
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<hr />
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<b>{{trans('admin.unseen_msg')}} :</b>
		{!! $users->unseen_msg !!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<b>{{trans('admin.unseen_notification')}} :</b>
		{!! $users->unseen_notification !!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<b>{{trans('admin.rate_overall')}} :</b>
		{!! $users->rate_overall !!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<b>{{trans('admin.email_verify')}} :</b>
		{{ trans("admin.".$users->email_verify) }}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<b>{{trans('admin.mobile_verify')}} :</b>
		{{ trans("admin.".$users->mobile_verify) }}
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<b>{{trans('admin.system_comment')}} :</b>
		{!! $users->system_comment !!}
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<b>{{trans('admin.bio')}} :</b>
		{!! $users->bio !!}
	</div>
	<!-- /.row -->
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="tabbable" id="tabs-10620">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link {{ empty(request('tab')) || request('tab') == 'orders'?'active':'' }}" href="{{ url()->current() }}?tab=orders"><span class="badge badge-danger">0</span> {{ trans('admin.orders') }} <i class="fa fa-file"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ request('tab') == 'offers'?'active':'' }}" href="{{ url()->current() }}?tab=offers"><span class="badge badge-danger">0</span> {{ trans('admin.offers') }} <i class="fa fa-file"></i></a>
					</li>
					@if($users->membership_type == 'vendor')
					<li class="nav-item">
						<a class="nav-link {{ request('tab') == 'jobs'?'active':'' }}" href="{{ url()->current() }}?tab=jobs"><span class="badge badge-danger">{{ $jobs_count }}</span> {{ trans('admin.jobs') }} <i class="fa fa-user-tie"></i> </a>
					</li>
					<li class="nav-item">
						<a class="nav-link  {{ request('tab') == 'commercial_records'?'active':'' }}" href="{{ url()->current() }}?tab=commercial_records"><span class="badge badge-danger">{{ $commercial_records_count }}</span> {{ trans('admin.commercial_records') }} <i class="fa fa-receipt"></i> </a>
					</li>
					<li class="nav-item">
						<a class="nav-link  {{ request('tab') == 'qualifications'?'active':'' }}" href="{{ url()->current() }}?tab=qualifications"><span class="badge badge-danger">{{ $qualifications_count }}</span> {{ trans('admin.qualifications') }} <i class="fa fa-certificate"></i> </a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ request('tab') == 'experiences'?'active':'' }}" href="{{ url()->current() }}?tab=experiences"><span class="badge badge-danger">{{ $experiences_count }}</span> {{ trans('admin.experiences') }} <i class="fa fa-file-alt"></i> </a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ request('tab') == 'userlicenses'?'active':'' }}" href="{{ url()->current() }}?tab=userlicenses"><span class="badge badge-danger">{{ $userlicenses_count }}</span> {{ trans('admin.userlicenses') }} <i class="fa fa-address-card"></i> </a>
					</li>

					@endif
					<li class="nav-item">
						<a class="nav-link {{ request('tab') == 'useridentity'?'active':'' }}" href="{{ url()->current() }}?tab=useridentity"><span class="badge badge-danger">{{ $useridentity_count }}</span> {{ trans('admin.useridentity') }} <i class="far fa-id-card"></i> </a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-303817">
						@if(request('tab') == 'commercial_records')
						@include('admin.users.tabs.commercial_records')
						@elseif(request('tab') == 'qualifications')
						@include('admin.users.tabs.qualifications')
						@elseif(request('tab') == 'experiences')
						@include('admin.users.tabs.experiences')
						@elseif(request('tab') == 'userlicenses')
						@include('admin.users.tabs.userlicenses')
						@elseif(request('tab') == 'useridentity')
						@include('admin.users.tabs.useridentity')
						@elseif(request('tab') == 'jobs')
						@include('admin.users.tabs.user_jobs')
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.card-body -->
<div class="card-footer">
</div>
</div>
@endsection