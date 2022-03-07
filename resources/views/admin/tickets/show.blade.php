@extends('admin.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a>{{ trans('admin.show') }}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('tickets')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('tickets/'.$tickets->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('tickets/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$tickets->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$tickets->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$tickets->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['tickets.destroy', $tickets->id]
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
				<b>{{trans('admin.id')}} :</b> {{$tickets->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.ticket_linked')}} :</b>
				{{ trans("admin.".$tickets->ticket_linked) }}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.ticket_department_id')}} :</b>
				{!! $tickets->ticket_department_id()->first()->{l('department_name')}??'' !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.link_id')}} :</b>
				{!! $tickets->link_id !!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.user_id')}} :</b>
				@if(!empty($tickets->user_id()->first()))
				{{ $tickets->user_id()->first()->name }}
				@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.ticket_status')}} :</b>
				{{ trans("admin.".$tickets->ticket_status) }}
			</div>
			@if(!empty($tickets->user_ticket_rate))
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<b>{{trans('admin.user_ticket_rate')}} :</b>
				{{ trans("admin.".$tickets->user_ticket_rate) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<b>{{trans('admin.user_ticket_comment')}} :</b>
				{!! $tickets->user_ticket_comment !!}
			</div>
			@endif
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<b>{{trans('admin.ticket_title')}} :</b>
				{!! $tickets->ticket_title !!}
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<span>{{trans('admin.ticket_content')}} :</span> {!! $tickets->ticket_content !!}
			</div>

			@if($tickets->files()->count() > 0)
		<table class="table table-bordered table-striped table-hover">
			@foreach($tickets->files()->get() as $tfile)
			<tr>
				<td style="vertical-align:middle;">{{ $tfile->name }}</td>
				<td style="vertical-align:middle;">{{ $tfile->size }}</td>
				<td style="vertical-align:middle;">
					<a href="{{ url($tfile->full_path) }}" target="_blank"><i class="fa fa-download fa-1x"></i></a>
				</td>
				<td style="vertical-align:middle;">
					@if(preg_match('/^image/i', $tfile->mimtype))
					@include('admin.show_image',['image'=>$tfile->full_path])
					@elseif(preg_match('/^video/i', $tfile->mimtype))
					@include('admin.show_video',['video'=>$tfile->full_path])
					@elseif(preg_match('/^audio/i', $tfile->mimtype))
					@include('admin.show_audio',['audio'=>$tfile->full_path])
					@endif
				</td>
			</tr>
			@endforeach
		</table>
		@endif

			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<div class="card-footer card-comments">
		@foreach($replays as $replay)
		@include('admin.tickets.replay',[
				'replay'=>$replay
			])
		@endforeach
@push('js')
<script type="text/javascript">
$(document).ready(function(){
 $(document).on('click','.deletereplay',function(){
 	var replay_id = $(this).attr('replay_id');
 	if(replay_id > 0){
 		var data = `<form method="post" action="{{ aurl('tickets/delete/replay') }}/`+replay_id+`">
  					@csrf
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
						</form>`;
	 	$('.replayfooterform').html(data);
	 	$('#deletereplay').modal('show');
 	}else{
	 	$('#deletereplay').modal('hide');
 	}
 });
});
</script>
<div class="modal fade" id="deletereplay">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del_ticket_replay')}}
					</div>
					<div class="modal-footer replayfooterform">

					</div>
				</div>
			</div>
</div>
@endpush
			<!-- /.card-footer -->

		</div>
@if($tickets->ticket_status == 'opened')
@push('js')
<script type="text/javascript">
$(document).on('keypress','.replay',function(e){
if(e.which == 13) {
	var replay = $('.replay').val();
	var close_ticket = $('input[name="close_ticket"]:checked').val();

	if(replay == ''){
		$('.replay_help').text('{{ trans('admin.write_replay') }}');
		return false;
	}
	var dz_type = $('input[name="dz_type"]').val();
	var dz_path = $('input[name="dz_path"]').val();
	var dz_id = $('input[name="dz_id"]').val();
       $.ajax({
	       	url:'{{ aurl('replay/tickets/'.$tickets->id) }}',
	       	dataType:'html',
	       	type:'post',
	       	data:{_token:'{{ csrf_token() }}',replay:replay,dz_id:dz_id,dz_path:dz_path,dz_type:dz_type,close_ticket:close_ticket},
	       	beforeSend: function(){
	       		$('.replay_help').text('');
	       		$('.replay').val('');
	       	},success: function(data){
	       		 $('.replay_help').text('');
	       		 $('.card-comments').prepend(data);
	       		 $('#previews_ticket_replay_dz').empty();
       			 $('.dz-message').show();
       			 if(close_ticket == 'yes'){
       			 	$('.ticketform').html('<center>{{ trans("admin.ticket_closed") }}</center>');
       			 	$('.replaycontrol').remove();
       			 }
	       	},error: function(xhr){
	       		if(xhr.responseJSON.errors.replay[0] !== undefined){
	       			 $('.replay_help').text(xhr.responseJSON.errors.replay[0]);
	       		}
	       	}
       });
		return false;
    }
});
</script>
@endpush
@endif
		<!-- /.col -->
		<div class="card-footer ticketform">
			@if($tickets->ticket_status == 'opened')

			<form action="#" method="post">
				{{ csrf_field() }}
				<img class="img-fluid img-circle img-sm" src="{{ it()->profile(admin()->user()->photo_profile) }}" alt="{{ admin()->user()->name }}">
				<!-- .img-push is used to add margin to elements next to floating images -->

				<div class="img-push">
					<input type="text" class="form-control replay form-control-sm" placeholder="{{ trans("admin.write_replay") }}">
					<span class="replay_help"></span>

				</div>
				<hr />
					<div class="form-group">
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input checkinput" name="close_ticket"
							value="yes" id="close_ticket">
							<label class="custom-control-label" for="close_ticket">{{ trans('admin.close_ticket') }}</label>
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
    "dz_param"=>"ticket_replay_dz",
    "type"=>"create",
    "route"=>"tickets",
    "path"=>"ticket_replays",
    ])
</div>
			</form>
			@else
			<center>{{ trans("admin.ticket_closed") }}</center>
			@endif
		</div>
		<!-- /.card-footer -->
	</div>
</div>
			{!! $replays->appends(['temp_id'=>request('temp_id')])->render() !!}
	</div>
</div>
@endsection