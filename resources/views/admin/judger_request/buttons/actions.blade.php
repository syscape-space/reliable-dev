
 <div class="btn-group">
	<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> {{ trans('admin.actions') }}</button>
	<span class="caret"></span>
	<span class="sr-only"></span>
	</button>
	<div class="dropdown-menu" role="menu">
		<a href="{{ aurl('/users/create?membership_type=judger&judger_request_id='.$id)}}" class="dropdown-item" ><i class="fa fa-check"></i> تم التواصل مع المحكم و انشاء حساب</a>
		<div class="dropdown-divider"></div>
		<a data-toggle="modal" data-target="#refuse_record{{$id}}" href="#" class="dropdown-item">
		<i class="fas fa-trash"></i> رفض</a>
	</div>
</div>
<div class="modal fade" id="refuse_record{{$id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">رفض الطلب</h4>
				<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
				<i class="fa fa-exclamation-triangle"></i> هل انت متاكد من رفض {{trans('admin.id')}} ({{$id}})
				<div>
					{!! Form::open([
				'method' => 'PUT',
				'route' => ['admin.judger-requests.update', $id]
				]) !!}
					<input type="hidden" name="status" value="refused">
					<textarea name="note" class="form-control" placeholder="السبب"></textarea>
					{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
					<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
		