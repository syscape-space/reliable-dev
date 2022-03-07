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
			<td>{{ $commercial_record->comment }}</td>
			<td><a href="{{ aurl('usercommercials/'.$commercial_record->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $commercial_records->appends(['tab'=>request('tab')])->render() !!}