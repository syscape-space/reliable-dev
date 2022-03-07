@foreach($jobs as $job)
<div id="card-{{ $job->id }}">
	<div class="card">
		<div class="card-header">
			<a class="card-link collapsed" data-toggle="collapse" data-parent="#card-{{ $job->id }}" href="#card-element-{{ $job->id }}">
				#{{ $job->id }}
				- {{ trans('admin.occupation_id') }} ({{ $job->occupation_id()->first()->{l('occupation_name')}??'' }} - {{ $job->specialtie_id()->first()->{l('specialty_name')}??'' }})
			</a>
		</div>
		<div id="card-element-{{ $job->id }}" class="collapse">
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>{{ trans('admin.occupation_id') }}</th>
							<th>{{ trans('admin.specialtie_id') }}</th>
							<th>{{ trans('admin.actions') }}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $job->id }}</td>
							<td>{{ $job->occupation_id()->first()->{l('occupation_name')}??'' }}</td>
							<td>{{ $job->specialtie_id()->first()->{l('specialty_name')}??'' }}</td>
							<td><a href="{{ aurl('userjobs/'.$job->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
						</tr>
						<tr>
							<td colspan="4">

								@if($job->user_commercials()->count() > 0)
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
										@foreach($job->user_commercials()->get() as $commercial_records)
										<tr>
											<td>{{ $commercial_records->commercial_id }}</td>
											<td><a href="{{ it()->url($commercial_records->commercial_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a></td>
											<td>{{ $commercial_records->commercial_end_at }}</td>
											<td>{{ $commercial_records->comment }}</td>
											<td><a href="{{ aurl('usercommercials/'.$commercial_records->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<hr />
								@endif
								@if($job->user_licenses()->count() > 0)
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
										@foreach($job->user_licenses()->get() as $license)
										<tr>
											<td>{{ $license->license_name }}</td>
											<td><a href="{{ it()->url($license->license_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a></td>
											<td>{{ $license->license_end_at }}</td>
											<td>{{ $license->comment }}</td>
											<td><a href="{{ aurl('userlicenses/'.$license->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<hr />
								@endif
								@if($job->user_qualifications()->count() > 0)
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
										@foreach($job->user_qualifications()->get() as $qualifications)
										<tr>
											<td>{{ $qualifications->qualification_name }}</td>
											<td><a href="{{ it()->url($qualifications->qualification_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a></td>
											<td>{{ $qualifications->comment }}</td>
											<td><a href="{{ aurl('userqualifications/'.$qualifications->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<hr />
								@endif
								@if($job->user_experiences()->count() > 0)
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
										@foreach($job->user_experiences()->get() as $experiences)
										<tr>
											<td>{{ $experiences->experience_name }}</td>
											<td><a href="{{ it()->url($experiences->experience_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a></td>
											<td>{{ $experiences->comment }}</td>
											<td><a href="{{ aurl('userexperiences/'.$experiences->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								@endif
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endforeach
{!! $jobs->appends(['tab'=>request('tab')])->render() !!}