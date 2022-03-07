<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('sms_sender',trans('admin.sms_sender'),['class'=>'control-label']) !!}
        {!! Form::text('sms_sender',setting()->sms_sender,['class'=>'form-control','placeholder'=>trans('admin.sms_sender')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('sms_mobile',trans('admin.sms_mobile'),['class'=>'control-label']) !!}
        {!! Form::text('sms_mobile',setting()->sms_mobile,['class'=>'form-control','placeholder'=>trans('admin.sms_mobile')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('sms_password',trans('admin.sms_password'),['class'=>'control-label']) !!}
        {!! Form::text('sms_password',setting()->sms_password,['class'=>'form-control','placeholder'=>trans('admin.sms_password')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('phone_verification_status',trans('admin.phone_verification_status'),['class'=>'control-label']) !!}
        {!! Form::select('phone_verification_status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->phone_verification_status,['class'=>'form-control','placeholder'=>trans('admin.phone_verification_status')]) !!}
    </div>
</div>