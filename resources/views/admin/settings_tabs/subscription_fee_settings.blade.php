<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('customer_membership_fee',trans('admin.customer_membership_fee'),['class'=>'control-label']) !!}
        {!! Form::text('customer_membership_fee',setting()->customer_membership_fee,['class'=>'form-control','placeholder'=>trans('admin.customer_membership_fee')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('vendor_membership_fee',trans('admin.vendor_membership_fee'),['class'=>'control-label']) !!}
        {!! Form::text('vendor_membership_fee',setting()->vendor_membership_fee,['class'=>'form-control','placeholder'=>trans('admin.vendor_membership_fee')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('customer_membership_fee_status',trans('admin.customer_membership_fee_status'),['class'=>'control-label']) !!}
        {!! Form::select('customer_membership_fee_status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->customer_membership_fee_status,['class'=>'form-control','placeholder'=>trans('admin.customer_membership_fee_status')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('vendor_membership_fee_status',trans('admin.vendor_membership_fee_status'),['class'=>'control-label']) !!}
        {!! Form::select('vendor_membership_fee_status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->vendor_membership_fee_status,['class'=>'form-control','placeholder'=>trans('admin.vendor_membership_fee_status')]) !!}
    </div>
</div>