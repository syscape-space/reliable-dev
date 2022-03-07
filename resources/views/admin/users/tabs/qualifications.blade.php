<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>{{ trans('admin.qualification_name') }}</th>
			<th>{{ trans('admin.qualification_file') }}</th>
			<th>{{ trans('admin.comment') }}</th>
			<th>{{ trans('admin.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($qualifications as $qualification)
		<tr>
			<td>{{ $qualification->qualification_name }}</td>
			<td><a href="{{ it()->url($qualification->qualification_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a></td>
			<td>{{ $qualification->comment }}</td>
			<td><a href="{{ aurl('userqualifications/'.$qualification->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $qualifications->appends(['tab'=>request('tab')])->render() !!}