@extends('admin.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a>{{!empty($title)?$title:''}}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('userjobs')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('userjobs/'.$userjobs->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('userjobs/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$userjobs->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$userjobs->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$userjobs->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['userjobs.destroy', $userjobs->id]
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
				<b>{{trans('admin.id')}} :</b> {{$userjobs->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.occupation_id')}} :</b>
				@if(!empty($userjobs->occupation_id()->first()))
				{{ $userjobs->occupation_id()->first()->occupation_name_ar }}
				@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.specialtie_id')}} :</b>
				@if(!empty($userjobs->specialtie_id()->first()))
				{{ $userjobs->specialtie_id()->first()->specialty_name_ar }}
				@endif
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<b>{{trans('admin.user_id')}} :</b>
				@if(!empty($userjobs->user_id()->first()))
				{{ $userjobs->user_id()->first()->name }}
				@endif
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<hr />
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
							<td>{{ $userjobs->id }}</td>
							<td>{{ $userjobs->occupation_id()->first()->{l('occupation_name')}??'' }}</td>
							<td>{{ $userjobs->specialtie_id()->first()->{l('specialty_name')}??'' }}</td>
							<td><a href="{{ aurl('userjobs/'.$userjobs->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
						</tr>
						<tr>
							<td colspan="4">

								@if($userjobs->user_commercials()->count() > 0)
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
										@foreach($userjobs->user_commercials()->get() as $commercial_records)
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
								@if($userjobs->user_licenses()->count() > 0)
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
										@foreach($userjobs->user_licenses()->get() as $license)
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
								@if($userjobs->user_qualifications()->count() > 0)
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
										@foreach($userjobs->user_qualifications()->get() as $qualifications)
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
								@if($userjobs->user_experiences()->count() > 0)
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
										@foreach($userjobs->user_experiences()->get() as $experiences)
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
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection