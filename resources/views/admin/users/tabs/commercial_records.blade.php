<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>{{ trans('admin.commercial_id') }}</th>
			<th>{{ trans('admin.commercial_file') }}</th>
			<th>{{ trans('admin.commercial_end_at') }}</th>
			<th>{{ trans('admin.comment') }}</th>
			<th>{{ trans('admin.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($commercial_records as $commercial_record)
		<tr>
			<td>{{ $commercial_record->commercial_id }}</td>
			<td><a href="{{ it()->url($commercial_record->commercial_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a></td>
			<td>{{ $commercial_record->commercial_end_at }}</td>
			<td>
				@if($commercial_record->status === 0)
					<a class="btn btn-success btn-sm" href="{{aurl('/update-document-status/user_commercials')}}?id={{$commercial_record->id}}&status=1">قبول</a>
					<a class="btn btn-danger btn-sm" href="#rejectForm{{$commercial_record->id}}" data-toggle="modal" data-target="#rejectModal{{$commercial_record->id}}">رفض</a>
					<div class="modal fade" id="rejectModal{{$commercial_record->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">هل انت متأكد من الرفض</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form id="rejectForm{{$commercial_record->id}}" action="{{aurl('/update-document-status/user_commercials')}}">
										<input name="id" type="hidden" value="{{$commercial_record->id}}">
										<input name="status" type="hidden" value="2">
										<label>
											سبب الرفض
										</label>
										<textarea class="form-control" style="resize: none" name="comment" rows="10"></textarea>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
									<button type="submit" form="rejectForm{{$commercial_record->id}}" class="btn btn-danger">رفض</button>
								</div>
							</div>
						</div>
					</div>
				@else
					<span class="btn btn-sm btn-primary">
						{{$commercial_record->status == 1 ? "مقبول":"مرفوض"}}
					</span>
				@endif
			</td>
			<td><a href="{{ aurl('usercommercials/'.$commercial_record->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $commercial_records->appends(['tab'=>request('tab')])->render() !!}