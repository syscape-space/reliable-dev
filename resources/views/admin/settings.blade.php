@extends('admin.index')
@section('content')
@include("admin.layouts.components.submit_form_ajax",["form"=>"#settings"])
<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">{{ !empty(request('type'))?trans('admin.'.request('type')):'' }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {!! Form::open(['url'=>aurl('/settings'),'id'=>'settings','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
        @if(empty(request('type')))
        @include('admin.settings_tabs.home_settings')
        @else
         @include('admin.settings_tabs.'.request('type'))
        @endif
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
<input type="hidden" name="type" value="{{ request('type') }}">
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection