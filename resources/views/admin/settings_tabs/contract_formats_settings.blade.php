<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('maximum_arbitrators',trans('admin.maximum_arbitrators'),['class'=>'control-label']) !!}
        {!! Form::text('maximum_arbitrators',setting()->maximum_arbitrators,['class'=>'form-control','placeholder'=>trans('admin.maximum_arbitrators')]) !!}
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li>{{ trans('admin.user_order_name') }} :  <b style="color:#c33">{user_order_name}</b></li>
                    <li>{{ trans('admin.user_order_id') }} :  <b style="color:#c33">{user_order_id}</b></li>
                    <li>{{ trans('admin.user_order_mobile') }} :  <b style="color:#c33">{user_order_mobile}</b></li>
                    <li>{{ trans('admin.user_order_email') }} :  <b style="color:#c33">{user_order_email}</b></li>
                    <li>{{ trans('admin.user_offer_name') }} :  <b style="color:#c33">{user_offer_name}</b></li>
                    <li>{{ trans('admin.user_offer_id') }} :  <b style="color:#c33">{user_offer_id}</b></li>
                    <li>{{ trans('admin.user_offer_mobile') }} :  <b style="color:#c33">{user_offer_mobile}</b></li>
                    <li>{{ trans('admin.user_offer_email') }} :  <b style="color:#c33">{user_offer_email}</b></li>
                    <li>{{ trans('admin.all_order_users') }} :  <b style="color:#c33">{all_order_users}</b></li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul>
                    <li>{{ trans('admin.order_id') }} :  <b style="color:#c33">{order_id}</b></li>
                    <li>{{ trans('admin.total_order_price') }} : <b style="color:#c33">{total_order_price}</b></li>
                    <li>{{ trans('admin.arbitrators') }} : <b style="color:#c33">{arbitrators}</b></li>
                    <li>{{ trans('admin.order_current_date') }} : <b style="color:#c33">{order_current_date}</b></li>
                    <li>{{ trans('admin.offer_date') }} : <b style="color:#c33">{offer_date}</b></li>
                    <li>{{ trans('admin.order_day') }} : <b style="color:#c33">{order_day}</b></li>
                    <li>{{ trans('admin.order_hour') }} : <b style="color:#c33">{order_hour}</b></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('contract_form',trans('admin.contract_form'),['class'=>'control-label']) !!}
            {!! Form::textarea('contract_form',setting()->contract_form,['class'=>'form-control ckeditor','placeholder'=>trans('admin.contract_form')]) !!}
        </div>
    </div>
</div>