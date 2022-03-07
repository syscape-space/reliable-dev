<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('iam_public_key',trans('admin.iam_public_key'),['class'=>'control-label']) !!}
        {!! Form::text('iam_public_key',setting()->iam_public_key,['class'=>'form-control','placeholder'=>trans('admin.iam_public_key')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('iam_secret',trans('admin.iam_secret'),['class'=>'control-label']) !!}
        {!! Form::text('iam_secret',setting()->iam_secret,['class'=>'form-control','placeholder'=>trans('admin.iam_secret')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('iam_ip',trans('admin.iam_ip'),['class'=>'control-label']) !!}
        {!! Form::text('iam_ip',setting()->iam_ip,['class'=>'form-control','placeholder'=>trans('admin.iam_ip')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('iam_status',trans('admin.iam_status'),['class'=>'control-label']) !!}
        {!! Form::select('iam_status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->iam_status,['class'=>'form-control','placeholder'=>trans('admin.iam_status')]) !!}
    </div>
</div>