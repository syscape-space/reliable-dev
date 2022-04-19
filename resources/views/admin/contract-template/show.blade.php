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
				<a href="{{aurl('contract-templates')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('contract-templates/' . $show->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('contract-templates/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
			</div>
		</div>
		</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="col-12">
				<h4>النسخة العربية</h4>
				<h5>{{$show->title_ar}}</h5>
				<br>
				{!! $show->content_ar !!}
			</div>
			<div class="col-12">
				<hr>
			</div>
			<div class="col-12">
				<h4>النسخة الانجليزية</h4>
				<h5>{{$show->title_en}}</h5>
				<br>
				<div dir="ltr" class="text-left">
					{!! $show->content_en !!}
				</div>
			</div>
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection