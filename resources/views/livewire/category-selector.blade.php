<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="">قسم رئيسي</label>
            <select id="" wire:model="selected_main_id" name="{{$sub_categories->count()?"":"parent"}}" class="form-control">
                <option value="">قسم رئيسي</option>
                @foreach ($main_categories as $depart)
                    <option value="{{$depart->id}}">{{$depart->department_name_ar}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if($sub_categories->count() or $parent)
    <div class="col-6">
        <div class="form-group">
            <label for="">فرعي من</label>
            <select name="parent" id="" wire:model="parent" class="form-control">
                <option value="">قسم فرعي منه</option>
                @foreach ($sub_categories as $depart)
                    <option value="{{$depart->id}}">{{$depart->department_name_ar}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
    @if($parent == null)
        <input type="hidden" name="parent" value="{{$selected_main_id}}">
    @endif
</div>
