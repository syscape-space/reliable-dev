<div class="col-12 col-md-8">

    @if (\Session::has('error'))
    <div class="alert alert-danger">{!! \Session::get('error') !!}</div>
    @endif

    @if (\Session::has('success'))
    <div class="alert alert-success">{!! \Session::get('success') !!}</div>
    @endif

    @if(!empty($license_status) && $license_status == "end")
    <div class="alert alert-warning" role="alert">
        <strong>الرخصة منتهية</strong> يرجي تجديد الرخصة
    </div>
    @endif

    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">الرخصة المهنية</span></h5>
            </div>
            <form action="profile/license" name="edit_user" id="edit_user" autocomplete="off" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="csrf_token" value="ebd97b854219e3339845763cb1846258" />
                <input type="hidden" name="token" value="NI0eiHSJ6I26pSIAihHjG1lCkUVK983_ofqxWxD2HEs" style="display:none;" />
                <input type="hidden" name="user_id" value="{{$user->id}}" />

                @php
                $editable = $license_status == "end" || $license_status == "unset";
                @endphp
                <div class="card-body">
                    <div class="row w-100 mx-0 px-0">
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="my-1" for="specialtie_id">التخصص<span class="text-danger">*</span> </label>
                                <select class="form-control" name="specialtie_id" id="specialtie_id" {{$editable ? '' : 'disabled' }}>
                                    <option value=0>{{trans('admin.choose')}}</option>
                                    @foreach($specialties as $sp)

                                    <option value="{{$sp->id}}" {{ $sp->id == old('specialtie_id', (!empty($license) ? ($license->specialtie_id ?? '') : '')) ? 'selected' : '' }}>{{$sp->specialty_name_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="my-1" for="license_name">رقم الرخصة<span class="text-danger">*</span> </label>
                                <input class="form-control" placeholder="رقم الرخصة" name="license_name" type="text" value="{{old('license_name', !empty($license) ? ($license->license_name ?? '') : '')}}" {{$editable ? '' : 'disabled' }}>
                            </div>
                        </div>
                        <div class="col-sm-12  col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label class="my-1" for="license_end_at">تاريخ نهاية الترخيص<span class="text-danger">*</span> </label>
                                <input class="form-control" placeholder="تاريخ نهاية الترخيص" name="license_end_at" type="date" value="{{old('license_end_at', !empty($license) ? ($license->license_end_at ?? '') : '')}}" {{$editable ? '' : 'disabled' }}>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="my-1" for="license_file">رفع صورة الرخصة<span class="text-danger">*</span> </label>
                                <input class="form-control" name="license_file" type="{{$editable ? 'file' : 'text' }}" value="{{!empty($license) ? $license->license_file : '' }}" {{$editable ? '' : 'disabled' }}>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="mt-2 mb-1" for="comment">معلومات اضافية</label>
                                <textarea name="comment" class="form-control" style="height: 100px;" id="" rows="5" {{$editable ? '' : 'disabled' }}>{{old('comment', !empty($license) ? ($license->comment ?? '') : '') }}</textarea>
                            </div>
                        </div>
                        @if(!empty($license) && $license->license_file)
                        <div class="col-md-4 mt-4">
                            <!-- <div class="form-group"> -->
                            <!-- <label class="mt-2 mb-2" for="address_2"> </label> -->
                            <img src="{{it()->url($license->license_file)}}" class="d-block mt-2" height="100px" />
                            <!-- </div> -->
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary {{$editable ? '' : 'btn-muted' }}" type="submit" {{$editable ? '' : 'disabled' }}>حفظ </button>
                </div>
                <div style="display:none"><label>Bot Will Fill This Field</label><input type="text" name="ciapp_check" value="" /></div>
            </form>
        </div>
    </div>
</div>
</div>