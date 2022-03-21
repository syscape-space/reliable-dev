<div class="col-12 col-md-8">
    @if(!empty($commercial_status) && $commercial_status == "end")
    <div class="alert alert-warning" role="alert">
        <strong>السجل منتهي</strong> يرجي تجديد السجل
    </div>
    @endif
    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">السجلات التجارية</span></h5>
            </div>
            <form action="" name="edit_user" id="edit_user" autocomplete="off" method="post" accept-charset="utf-8">
                <input type="hidden" name="csrf_token" value="ebd97b854219e3339845763cb1846258" />
                <input type="hidden" name="token" value="NI0eiHSJ6I26pSIAihHjG1lCkUVK983_ofqxWxD2HEs" style="display:none;" />
                <div class="card-body">
                    <div class="row w-100 mx-0 px-0">
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="my-1" for="commercial_id">رقم السجل<span class="text-danger">*</span> </label>
                                <input class="form-control" placeholder="رقم السجل" name="commercial_id" type="text" value="{{!empty($commercial) ? $commercial->commercial_id : '' }}">
                            </div>
                        </div>
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="my-1" for="commercial_end_at">تاريخ نهاية السجل<span class="text-danger">*</span> </label>
                                <input class="form-control" placeholder="تاريخ نهاية الترخيص" name="commercial_end_at" type="date" value="{{!empty($commercial) ? $commercial->commercial_end_at : '' }}">
                            </div>
                        </div>
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="my-1" for="commercial_file">رفع صورة السجل<span class="text-danger">*</span> </label>
                                <input class="form-control" name="license_file" type="file" value="{{!empty($commercial) ? $commercial->commercial_file : '' }}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="mt-2 mb-1" for="address_2">معلومات اضافية</label>
                                <textarea name="" class="form-control" style="height: 100px;" id="" rows="5">{{!empty($commercial) ? $commercial->comment : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <!-- <div class="form-group"> -->
                            <!-- <label class="mt-2 mb-2" for="address_2"> </label> -->
                            <img src="{{!empty($commercial) ? $commercial->commercial_file : 'https://sjl.const-tech.biz/HRM/public/uploads/users/thumb/sar11.png' }}" class="d-block mt-2" height="100px" />
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">حفظ </button>
                </div>
                <div style="display:none"><label>Bot Will Fill This Field</label><input type="text" name="ciapp_check" value="" /></div>
            </form>
        </div>
    </div>
</div>
</div>