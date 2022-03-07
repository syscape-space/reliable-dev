<div class="row">
    @php
    $attachment_exts = [
    'attachment_orders_exts',
    'attachment_qualifications_exts',
    'attachment_experience_exts',
    'attachment_license_exts',
    'attachment_commercial_exts',
    'attachment_ticket_exts',
    'attachment_comment_ticket_exts',
    ];
    @endphp
    @foreach($attachment_exts as $exts_name)
    @include('admin.settings_tabs.attachment_exts',[
    'name'=>$exts_name
    ])
    @endforeach
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('attachment_orders_files_timeout',trans('admin.attachment_orders_files_timeout'),['class'=>'control-label']) !!}
            {!! Form::text('attachment_orders_files_timeout',setting()->attachment_orders_files_timeout,['class'=>'form-control','placeholder'=>trans('admin.attachment_orders_files_timeout')]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('attachment_ticket_status',trans('admin.attachment_ticket_status'),['class'=>'control-label']) !!}
            {!! Form::select('attachment_ticket_status',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->attachment_ticket_status,['class'=>'form-control','placeholder'=>trans('admin.attachment_ticket_status')]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('attachment_comment_ticket_status',trans('admin.attachment_comment_ticket_status'),['class'=>'control-label']) !!}
            {!! Form::select('attachment_comment_ticket_status',['enable'=>trans('admin.enable'),'disable'=>trans('admin.disable')],setting()->attachment_comment_ticket_status,['class'=>'form-control','placeholder'=>trans('admin.attachment_comment_ticket_status')]) !!}
        </div>
    </div>