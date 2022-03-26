@extends('admin.index')
@section('content')

    @include("admin.layouts.components.submit_form_ajax",["form"=>"#our-services",'query'=>""])
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <div class="">
			<span>
			{{ !empty($title)?$title:'' }}
			</span>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a href="{{ aurl('supportmessages') }}" style="color:#343a40" class="dropdown-item">
                            <i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
                    </div>
                </div>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            {!! Form::open(['url'=> aurl('/our-services'), 'id'=>'our-services','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('title',trans('admin.title')) !!}
                        {!! Form::text('title', old('title'), ['class'=>'form-control','placeholder' => trans('admin.title')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('logo',"شعار الخدمة") !!}
                        {!! Form::file('logo', old('logo'), ['class'=>'form-control']) !!}
                    </div>
                </div>


            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="add" class="btn btn-primary btn-flat"><i
                        class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
            {!! Form::close() !!}    </div>
    </div>
@endsection