<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('minimum_amount_add_order',trans('admin.minimum_amount_add_order'),['class'=>'control-label']) !!}
        {!! Form::text('minimum_amount_add_order',setting()->minimum_amount_add_order,['class'=>'form-control','placeholder'=>trans('admin.minimum_amount_add_order')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('amount_add_order_vat',trans('admin.amount_add_order_vat'),['class'=>'control-label']) !!}
        {!! Form::text('amount_add_order_vat',setting()->amount_add_order_vat,['class'=>'form-control','placeholder'=>trans('admin.amount_add_order_vat')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('arbitration_amount_tax',trans('admin.arbitration_amount_tax'),['class'=>'control-label']) !!}
        {!! Form::text('arbitration_amount_tax',setting()->arbitration_amount_tax,['class'=>'form-control','placeholder'=>trans('admin.arbitration_amount_tax')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('add_order',trans('admin.add_order'),['class'=>'control-label']) !!}
        {!! Form::select('add_order',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->add_order,['class'=>'form-control','placeholder'=>trans('admin.add_order')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('offers_order',trans('admin.offers_order'),['class'=>'control-label']) !!}
        {!! Form::select('offers_order',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->offers_order,['class'=>'form-control','placeholder'=>trans('admin.offers_order')]) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('review_order_status',trans('admin.review_order_status'),['class'=>'control-label']) !!}
        {!! Form::select('review_order_status',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->review_order_status,['class'=>'form-control','placeholder'=>trans('admin.review_order_status')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('review_offers_status',trans('admin.review_offers_status'),['class'=>'control-label']) !!}
        {!! Form::select('review_offers_status',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->review_offers_status,['class'=>'form-control','placeholder'=>trans('admin.review_offers_status')]) !!}
    </div>

</div>