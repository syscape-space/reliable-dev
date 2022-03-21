<div class="col-12 col-md-8">

    @if (\Session::has('error'))
    <div class="alert alert-danger">{!! \Session::get('error') !!}</div>
    @endif
    @if (\Session::has('success'))
    <div class="alert alert-success">{!! \Session::get('success') !!}</div>
    @endif
    @if(!empty($subscribtion_end) && $subscribtion_end)
    <div class="alert alert-warning" role="alert">
        يرجي تجديد الاشتراك
    </div>
    @endif
    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">اعدادات الحساب </span></h5>
            </div>

            <div class="card-body container">
                {!! Form::open(['url'=>'profile?id='.$user->id, 'method'=>'post', 'id'=>'personal_info','class'=>'form-horizontal form-row-seperated']) !!}
                <div class="row w-100 mx-0 px-0">
                    {!! Form::text('id',$user->id,['class'=>'form-control', 'hidden'=>'hidden']) !!}
                    {!! Form::text('add_offer',$user->add_offer,['class'=>'form-control', 'hidden'=>'hidden']) !!}
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('first_name',trans('admin.first_name'),['class'=>' control-label mt-2 mb-1']) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('first_name',$user->first_name,['class'=>'form-control','placeholder'=>trans('admin.first_name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('middle_name',trans('admin.middle_name'),['class'=>' control-label mt-2 mb-1']) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('middle_name',$user->middle_name,['class'=>'form-control','placeholder'=>trans('admin.middle_name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('last_name',trans('admin.last_name'),['class'=>' control-label mt-2 mb-1']) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('last_name',$user->last_name,['class'=>'form-control','placeholder'=>trans('admin.last_name')]) !!}
                        </div>
                    </div>


                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('name',trans('admin.name'),['class'=>' control-label mt-3 mb-1']) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('email',trans('admin.email'),['class'=>'control-label mt-3 mb-1']) !!}
                            {!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>trans('admin.email'), 'readonly'=>'readonly']) !!}
                        </div>
                    </div>

                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('email_verify',trans('admin.email_verify'), ['class' => 'mt-3 mb-1']) !!}
                            {!! Form::select('email_verify',['pending'=>trans('admin.pending'),'verified'=>trans('admin.verified'),],$user->email_verify,['class'=>'form-control select2', 'disabled'=>'disabled', 'placeholder'=>trans('admin.choose')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('gender',trans('admin.gender'), ['class' => 'mt-3 mb-1']) !!}
                            <span class="text-danger">*</span>
                            {!! Form::select('gender',['male'=>trans('admin.male'),'female'=>trans('admin.female'),],$user->gender,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('mobile',trans('admin.mobile'),['class'=>' control-label mt-3 mb-1']) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('mobile',$user->mobile,['class'=>'form-control','placeholder'=>trans('admin.mobile'), ($user->mobile_verify == 'verified' ? 'readonly':'')=>'']) !!}
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('mobile_verify',trans('admin.mobile_verify'), ['class'=>'mt-3 mb-1']) !!}
                            {!! Form::select('mobile_verify',['pending'=>trans('admin.pending'),'verified'=>trans('admin.verified'),],$user->mobile_verify,['class'=>'form-control select2', 'disabled'=>'disabled', 'placeholder'=>trans('admin.choose')]) !!}
                        </div>
                    </div>


                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::label('country_id',trans('admin.country_id'), ['class'=>' control-label mt-3 mb-1']) !!}
                            <span class="text-danger">*</span>
                            {!! Form::select('country_id',App\Models\Country::pluck('country_name_ar','id'),$user->country_id,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('city_id',trans('admin.city_id'), ['class' => 'mt-3 mb-1']) !!}
                            <span class="text-danger">*</span>
                            {!! Form::select('city_id',App\Models\City::pluck('city_name_ar','id'),$user->city_id,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            {!! Form::label('address',trans('admin.address'),['class'=>' control-label mt-3 mb-1']) !!}
                            {!! Form::text('address',$user->address,['class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('account_type',trans('admin.account_type'), ['class'=>'mt-3 mb-1']) !!}
                            {!! Form::select('account_type',['individual'=>trans('admin.individual'),'company'=>trans('admin.company'),],$user->account_type,['class'=>'form-control select2', 'disabled'=>'disabled', 'placeholder'=>trans('admin.choose')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-6 col-xl-4">
                        <div class="form-group">
                            {!! Form::label('subscribe_end_at',trans('admin.subscribe_end_at'), ['class'=>'mt-3 mb-1']) !!}
                            {!! Form::text('subscribe_end_at',$user->subscribe_end_at,['class'=>'form-control datepicker','placeholder'=>trans('admin.subscribe_end_at'),'readonly'=>'readonly']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('bio',trans('admin.bio'),['class'=>'control-label mt-3 mb-1']) !!}
                            {!! Form::textarea('bio',$user->bio,['class'=>'form-control','placeholder'=>trans('admin.bio'), 'rows'=>"5"],) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right mt-3 mb-1">
                <button type="submit" name="save_back" class="btn btn-primary">{{ trans('admin.save') }}</button>
                {!! Form::close() !!}
            </div>
        </div>
        <div style="display:none"><label>Bot Will Fill This Field</label><input type="text" name="ciapp_check" value="" /></div>
    </div>
</div>
</div>
</div>