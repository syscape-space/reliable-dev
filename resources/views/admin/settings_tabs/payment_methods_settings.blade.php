<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('mada_vat',trans('admin.mada_vat'),['class'=>'control-label']) !!}
        {!! Form::text('mada_vat',setting()->mada_vat,['class'=>'form-control','placeholder'=>trans('admin.mada_vat')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('mada_status',trans('admin.mada_status'),['class'=>'control-label']) !!}
        {!! Form::select('mada_status',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->mada_status,['class'=>'form-control','placeholder'=>trans('admin.mada_status')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('paypal_vat',trans('admin.paypal_vat'),['class'=>'control-label']) !!}
        {!! Form::text('paypal_vat',setting()->paypal_vat,['class'=>'form-control','placeholder'=>trans('admin.paypal_vat')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('paypal_status',trans('admin.paypal_status'),['class'=>'control-label']) !!}
        {!! Form::select('paypal_status',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->paypal_status,['class'=>'form-control','placeholder'=>trans('admin.paypal_status')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('sadad_vat',trans('admin.sadad_vat'),['class'=>'control-label']) !!}
        {!! Form::text('sadad_vat',setting()->sadad_vat,['class'=>'form-control','placeholder'=>trans('admin.sadad_vat')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('sadad_status',trans('admin.sadad_status'),['class'=>'control-label']) !!}
        {!! Form::select('sadad_status',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->sadad_status,['class'=>'form-control','placeholder'=>trans('admin.sadad_status')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('bank_transfer_vat',trans('admin.bank_transfer_vat'),['class'=>'control-label']) !!}
        {!! Form::text('bank_transfer_vat',setting()->bank_transfer_vat,['class'=>'form-control','placeholder'=>trans('admin.bank_transfer_vat')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('bank_transfer_status',trans('admin.bank_transfer_status'),['class'=>'control-label']) !!}
        {!! Form::select('bank_transfer_status',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->bank_transfer_status,['class'=>'form-control','placeholder'=>trans('admin.bank_transfer_status')]) !!}
    </div>
</div>