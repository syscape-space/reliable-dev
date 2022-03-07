<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('number_days_objection',trans('admin.number_days_objection'),['class'=>'control-label']) !!}
        {!! Form::text('number_days_objection',setting()->number_days_objection,['class'=>'form-control','placeholder'=>trans('admin.number_days_objection')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('rate_orders_status',trans('admin.rate_orders_status'),['class'=>'control-label']) !!}
        {!! Form::select('rate_orders_status',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->rate_orders_status,['class'=>'form-control','placeholder'=>trans('admin.rate_orders_status')]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('rate_review_status',trans('admin.rate_review_status'),['class'=>'control-label']) !!}
        {!! Form::select('rate_review_status',['auto'=>trans('admin.auto'),'under_review'=>trans('admin.under_review')],setting()->rate_review_status,['class'=>'form-control','placeholder'=>trans('admin.rate_review_status')]) !!}
    </div>
</div>