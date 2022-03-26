@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#subscriptionfees",'query'=>''])
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>{{!empty($title)?$title:''}}</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('subscriptionfees')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('subscriptionfees/'.$subscriptionfees->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('subscriptionfees/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$subscriptionfees->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$subscriptionfees->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$subscriptionfees->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['subscriptionfees.destroy', $subscriptionfees->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
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

{!! Form::open(['url'=>aurl('/subscriptionfees/'.$subscriptionfees->id),'method'=>'put','id'=>'subscriptionfees','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('user_id',trans('admin.user_id'),['class'=>'control-label']) !!}
{!! Form::select('user_id',App\Models\User::pluck('name','id'), $subscriptionfees->user_id ,['class'=>'form-control select2','placeholder'=>trans('admin.user_id')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('amount',trans('admin.amount'),['class'=>'control-label']) !!}
        {!! Form::text('amount', $subscriptionfees->amount ,['class'=>'form-control','placeholder'=>trans('admin.amount')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('payment_method',trans('admin.payment_method'),['class'=>'control-label']) !!}
{!! Form::select('payment_method',['electronic_payment'=>trans('admin.electronic_payment'),'bank_transfer'=>trans('admin.bank_transfer'),], $subscriptionfees->payment_method ,['class'=>'form-control select2','placeholder'=>trans('admin.payment_method')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('payment_status',trans('admin.payment_status'),['class'=>'control-label']) !!}
{!! Form::select('payment_status',[
			'pending'=>trans('admin.pending'),
			'approved'=>trans('admin.approved'),
			'refused'=>trans('admin.refused')], $subscriptionfees->payment_status ,['class'=>'form-control select2','placeholder'=>trans('admin.payment_status')]) !!}
		</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('refused_reason',trans('admin.refused_reason'),['class'=>'control-label']) !!}
        {!! Form::textarea('refused_reason', $subscriptionfees->refused_reason ,['class'=>'form-control','placeholder'=>trans('admin.refused_reason')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('electronic_payment_ref',trans('admin.electronic_payment_ref'),['class'=>'control-label']) !!}
        {!! Form::text('electronic_payment_ref', $subscriptionfees->electronic_payment_ref ,['class'=>'form-control','placeholder'=>trans('admin.electronic_payment_ref')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('user_note',trans('admin.user_note'),['class'=>'control-label']) !!}
        {!! Form::textarea('user_note', $subscriptionfees->user_note ,['class'=>'form-control','placeholder'=>trans('admin.user_note')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>'control-label']) !!}
        {!! Form::textarea('comment', $subscriptionfees->comment ,['class'=>'form-control','placeholder'=>trans('admin.comment')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
{!! Form::close() !!}
</div>
</div>
@endsection