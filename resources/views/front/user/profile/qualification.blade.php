<div class="col-12 col-md-8">

    @if (\Session::has('error'))
    <div class="alert alert-danger">{!! \Session::get('error') !!}</div>
    @endif

    @if (\Session::has('success'))
    <div class="alert alert-success">{!! \Session::get('success') !!}</div>
    @endif

    <div class="card tab-content">
        <div class="tab-pane fade active show" id="user-edit-account">
            <div class="card-header">
                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">المؤهلات</span></h5>
            </div>
            <form action="profile/qualification" name="edit_user" id="edit_user" autocomplete="off" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="csrf_token" value="ebd97b854219e3339845763cb1846258" />
                <input type="hidden" name="token" value="NI0eiHSJ6I26pSIAihHjG1lCkUVK983_ofqxWxD2HEs" style="display:none;" />
                <input type="hidden" name="user_id" value="{{$user->id}}" />

                @php
                $editable = true;
                @endphp
                <div class="card-body py-4">
                    <div class="row w-100 mx-0 px-0">
                        <div class="col-sm-12  col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="my-1" for="specialtie_id">التخصص<span class="text-danger">*</span> </label>
                                <select class="form-control" name="specialtie_id" id="specialtie_id" {{$editable ? '' : 'disabled' }}>
                                    <option value=0>{{trans('admin.choose')}}</option>
                                    @foreach($specialties as $sp)

                                    <option value="{{$sp->id}}" {{ $sp->id == old('specialtie_id', (!empty($qualification) ? ($qualification->specialtie_id ?? '') : '')) ? 'selected' : '' }}>{{$sp->specialty_name_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12  col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="my-1" for="qualification_name">اسم المؤهل<span class="text-danger">*</span> </label>
                                <input class="form-control" placeholder="اسم المؤهل" name="qualification_name" type="text" value="{{old('qualification_name', !empty($qualification) ? ($qualification->qualification_name ?? '') : '')}}" {{$editable ? '' : 'disabled' }}>
                            </div>
                        </div>
                        <div class="col-sm-12  col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="my-1" for="qualification_file">المؤهل<span class="text-danger">*</span> </label>
                                <input class="form-control" name="qualification_file" type="{{$editable ? 'file' : 'text' }}" value="{{!empty($qualification) ? $qualification->qualification_file : '' }}" {{$editable ? '' : 'disabled' }}>
                            </div>
                        </div>
                        <!-- @if(!empty($qualification) && $qualification->qualification_file)
                        <div class="col-sm-12  col-lg-6 col-xl-6">
                            <div class="form-group">
                                <p class="my-1 text-wrap" for="qualification_file">{{$qualification->qualification_file}}</p>
                            </div>
                        </div>
                        @endif -->

                        <!-- @if(!empty($qualification) && $qualification->qualification_file)
                        <div class="col-md-4 mt-4">
                            <img src="{{it()->url($qualification->qualification_file)}}" class="d-block mt-2" height="100px" />
                        </div>
                        @endif -->
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