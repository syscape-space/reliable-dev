<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>{{ trans('admin.experience_name') }}</th>
			<th>{{ trans('admin.experience_file') }}</th>
			<th>{{ trans('admin.comment') }}</th>
			<th>{{ trans('admin.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($experiences as $experience)
		<tr>
			<td>{{ $experience->experience_name }}</td>
			<td><a href="{{ it()->url($experience->experience_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a></td>
			<td>{{ $experience->comment }}</td>
			<td><a href="{{ aurl('userexperiences/'.$experience->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $experiences->appends(['tab'=>request('tab')])->render() !!}