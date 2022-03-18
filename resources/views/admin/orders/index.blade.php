@extends('admin.index')
@section('content')
<div class="d-flex flex-wrap">
	<button class="btn btn-sm m-1 btn-primary" type="button" name="button">
	<i class="fas fa-clipboard-list"></i> 	كل الطلبات
		<span class=" mr-2 badge bg-light text-dark">10</span>
	</button>
	<button class="btn btn-sm m-1 btn-success" type="button" name="button">
		<i class="fas fa-check-circle"></i> مقبول
		<span class="badge bg-light text-info">10</span>
	</button>
	<button class="btn btn-sm m-1 btn-danger" type="button" name="button">
		<i class="fas fa-ban"></i> مرفوض
		<span class=" mr-2 badge bg-light text-dark">10</span>
	</button>
	<button class="btn btn-sm m-1 btn-info" type="button" name="button">
		<i class="fas fa-handshake"></i> تفاوض
		<span class=" mr-2 badge bg-light text-dark">10</span>
	</button>
	<button class="btn btn-sm m-1 btn-warning" type="button" name="button">
		<i class="fas fa-balance-scale"></i> التحكيم
		<span class=" mr-2 badge bg-light text-dark">10</span>
	</button>
</div>
{!! Form::open(["method" => "post","url" => [aurl('/orders/multi_delete')]]) !!}
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">{{!empty($title)?$title:''}}</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="table-responsive">
			{!! $dataTable->table(["class"=> "table table-striped table-bordered table-hover table-checkable dataTable no-footer"],true) !!}
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
<div class="modal fade" id="multi_delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title">{{trans("admin.delete")}} </h4>
					<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
					<div class="delete_done"><i class="fa fa-exclamation-triangle"></i> {{trans("admin.ask-delete")}} <span id="count"></span> {{trans("admin.record")}} </div>
					<div class="check_delete">{{trans("admin.check-delete")}}</div>
			</div>
			<div class="modal-footer">
					{!! Form::submit(trans("admin.approval"), ["class" => "btn btn-danger btn-flat delete_done"]) !!}
					<a class="btn btn-default" data-dismiss="modal">{{trans("admin.cancel")}}</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@push('js')
{!! $dataTable->scripts() !!}
@endpush
		@endsection
