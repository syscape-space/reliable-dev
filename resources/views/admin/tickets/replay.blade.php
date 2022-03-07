@php
$admin_replay = $replay->admin_id()->first();
$user_replay = $replay->user_id()->first();
@endphp
<div class="card-comment">
	@if(!empty($admin_replay))
	<!-- User image -->
	<img class="img-circle img-sm" src="{{ it()->profile($admin_replay->photo_profile) }}" alt="{{ $admin_replay->name }}">
	@elseif(!empty($user_replay))
	<!-- User image -->
	<img class="img-circle img-sm" src="{{ it()->profile($user_replay->photo_profile) }}" alt="{{ $user_replay->name }}">
	@endif
	@if(!empty($admin_replay) && $admin_replay->id == admin()->id() && $tickets->ticket_status == 'opened')
		<div class="float-right replaycontrol">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				{{-- <a class="dropdown-item edit_replay" replay_id="{{ $replay->id }}"  style="color:#343a40" href="#edit" >
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a> --}}
				{{-- <div class="dropdown-divider"></div> --}}
				<a replay_id="{{$replay->id}}" class="dropdown-item deletereplay"
						style="color:#343a40" href="#deletereplay">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>

	@endif

	<div class="comment-text">


		<span class="username">
			@if(!empty($admin_replay))
			{{ $admin_replay->name }}
			@elseif(!empty($user_replay))
			{{ $user_replay->name }}
			@endif
			<span class="text-muted float-right">
				{{ ago($replay->created_at) }}
			</span>
		</span>

		<!-- /.username -->
		{!! nl2br($replay->replay) !!}
		@if($replay->files()->count() > 0)
		<table class="table table-bordered table-striped table-hover">
			@foreach($replay->files()->get() as $file)
			<tr>
				<td style="vertical-align:middle;">{{ $file->name }}</td>
				<td style="vertical-align:middle;">{{ $file->size }}</td>
				<td style="vertical-align:middle;">
					<a href="{{ url($file->full_path) }}" target="_blank"><i class="fa fa-download fa-1x"></i></a>
				</td>
				<td style="vertical-align:middle;">
					@if(preg_match('/^image/i', $file->mimtype))
					@include('admin.show_image',['image'=>$file->full_path])
					@elseif(preg_match('/^video/i', $file->mimtype))
					@include('admin.show_video',['video'=>$file->full_path])
					@elseif(preg_match('/^audio/i', $file->mimtype))
					@include('admin.show_audio',['audio'=>$file->full_path])
					@endif
				</td>
			</tr>
			@endforeach
		</table>
		@endif
	</div>
	<!-- /.comment-text -->
</div>
