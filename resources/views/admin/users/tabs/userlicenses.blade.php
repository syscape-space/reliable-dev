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
			<td>{{ $userlicense->comment }}</td>
			<td><a href="{{ aurl('userlicenses/'.$userlicense->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $userlicenses->appends(['tab'=>request('tab')])->render() !!}