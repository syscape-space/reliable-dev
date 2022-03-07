<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('age_limit_vendor',trans('admin.age_limit_vendor'),['class'=>'control-label']) !!}
        {!! Form::text('age_limit_vendor',setting()->age_limit_vendor,['class'=>'form-control','placeholder'=>trans('admin.age_limit_vendor')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('age_limit_customer',trans('admin.age_limit_customer'),['class'=>'control-label']) !!}
        {!! Form::text('age_limit_customer',setting()->age_limit_customer,['class'=>'form-control','placeholder'=>trans('admin.age_limit_customer')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('expiry_license_alarm',trans('admin.expiry_license_alarm'),['class'=>'control-label']) !!}
        {!! Form::text('expiry_license_alarm',setting()->expiry_license_alarm,['class'=>'form-control','placeholder'=>trans('admin.expiry_license_alarm')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('expiry_commercial_alarm',trans('admin.expiry_commercial_alarm'),['class'=>'control-label']) !!}
        {!! Form::text('expiry_commercial_alarm',setting()->expiry_commercial_alarm,['class'=>'form-control','placeholder'=>trans('admin.expiry_commercial_alarm')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('register_new_customer',trans('admin.register_new_customer'),['class'=>'control-label']) !!}
        {!! Form::select('register_new_customer',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->register_new_customer,['class'=>'form-control','placeholder'=>trans('admin.register_new_customer')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('register_new_vendor',trans('admin.register_new_vendor'),['class'=>'control-label']) !!}
        {!! Form::select('register_new_vendor',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->register_new_vendor,['class'=>'form-control','placeholder'=>trans('admin.register_new_vendor')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('register_customer_status',trans('admin.register_customer_status'),['class'=>'control-label']) !!}
        {!! Form::select('register_customer_status',['under_review'=>trans('admin.under_review'),'auto'=>trans('admin.auto')],setting()->register_customer_status,['class'=>'form-control','placeholder'=>trans('admin.register_customer_status')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('register_vendor_status',trans('admin.register_vendor_status'),['class'=>'control-label']) !!}
        {!! Form::select('register_vendor_status',['under_review'=>trans('admin.under_review'),'auto'=>trans('admin.auto')],setting()->register_vendor_status,['class'=>'form-control','placeholder'=>trans('admin.register_vendor_status')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('license_status',trans('admin.license_status'),['class'=>'control-label']) !!}
        {!! Form::select('license_status',['under_review'=>trans('admin.under_review'),'auto'=>trans('admin.auto')],setting()->license_status,['class'=>'form-control','placeholder'=>trans('admin.license_status')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('commercial_status',trans('admin.commercial_status'),['class'=>'control-label']) !!}
        {!! Form::select('commercial_status',['under_review'=>trans('admin.under_review'),'auto'=>trans('admin.auto')],setting()->commercial_status,['class'=>'form-control','placeholder'=>trans('admin.commercial_status')]) !!}
    </div>
</div>