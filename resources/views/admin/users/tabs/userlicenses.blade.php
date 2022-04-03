<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>{{ trans('admin.license_name') }}</th>
			<th>{{ trans('admin.license_file') }}</th>
			<th>{{ trans('admin.license_end_at') }}</th>
			<th>{{ trans('admin.comment') }}</th>
			<th>{{ trans('admin.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($userlicenses as $userlicense)
		<tr>
			<td>{{ $userlicense->license_name }}</td>
			<td><a href="{{ it()->url($userlicense->license_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a></td>
			<td>{{ $userlicense->license_end_at }}</td>
			<td>
				@if($userlicense->status === 0)
					<a class="btn btn-success btn-sm" href="{{aurl('/update-document-status/user_licenses')}}?id={{$userlicense->id}}&status=1">قبول</a>
					<a class="btn btn-danger btn-sm" href="#rejectForm{{$userlicense->id}}" data-toggle="modal" data-target="#rejectModal{{$userlicense->id}}">رفض</a>
					<div class="modal fade" id="rejectModal{{$userlicense->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">هل انت متأكد من الرفض</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form id="rejectForm{{$userlicense->id}}" action="{{aurl('/update-document-status/user_licenses')}}">
										<input name="id" type="hidden" value="{{$userlicense->id}}">
										<input name="status" type="hidden" value="2">
										<label>
											سبب الرفض
										</label>
										<textarea class="form-control" style="resize: none" name="comment" rows="10"></textarea>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
									<button type="submit" form="rejectForm{{$userlicense->id}}" class="btn btn-danger">رفض</button>
								</div>
							</div>
						</div>
					</div>
				@else
					<span class="btn btn-sm btn-primary">
						{{$userlicense->status == 1 ? "مقبول":"مرفوض"}}
					</span>
				@endif
			</td>
			<td><a href="{{ aurl('userlicenses/'.$userlicense->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $userlicenses->appends(['tab'=>request('tab')])->render() !!}