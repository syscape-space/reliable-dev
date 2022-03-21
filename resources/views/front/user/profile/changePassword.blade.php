<div class="col-xl-8 col-lg-12">
    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">{{ trans('admin.change_u_password') }}</span></h5>
            </div>
            <div class="card-body pb-4">
                {!! Form::open(['url'=>aurl('/users/'.$user->id),'method'=>'put','id'=>'users','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}

                <form action="" autocomplete="off">

                    <div class="row w-100 mx-0 px-0">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('current_password',trans('admin.current_password'), ['class' => 'mt-3 mb-1']) !!}
                                <div class="d-flex align-items-center">
                                    {!! Form::password('current_password',['class'=>'form-control', 'placeholder'=>trans('admin.current_password')]) !!}
                                    <button class="btn btn-secondary me-2">Enter</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('new_password',trans('admin.new_password'), ['class' => 'mt-3 mb-1']) !!}
                                {!! Form::password('new_password',['class'=>'form-control','placeholder'=>trans('admin.new_password')]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('confirm_new_password',trans('admin.confirm_new_password'), ['class' => 'mt-3 mb-1']) !!}
                                {!! Form::password('confirm_new_password',['class'=>'form-control','placeholder'=>trans('admin.confirm_new_password')]) !!}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-right mt-3">
                <button type="submit" class="btn btn-primary">تغيير </button>
            </div>
        </div>
    </div>
</div>
</div>

@push('js')
<script type="text/javascript">
    function verifyPassword() {
        setTimeout(() => {

        }, 2000);
    }
</script>
@endpush