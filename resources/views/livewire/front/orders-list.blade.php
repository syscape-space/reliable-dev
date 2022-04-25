<div>
    <div class="row m-2">
        <div class="col-3">
            <div class="form-group">
                <label for="">قسم رئيسي</label>
                <select id="" wire:model="selected_main_id" class="form-control">
                    <option value="">قسم رئيسي</option>
                    @foreach ($main_categories as $depart)
                        <option value="{{$depart->id}}">{{$depart->department_name_ar}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if($sub_categories and $sub_categories->count())
            <div class="col-3">
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
    </div>
    <div class="boxes d-flex flex-column gap-5">
        @forelse($orders as $order)
            <x-order.card :order="$order" />
        @empty
            <h4>لا يوجد طلبات</h4>
        @endforelse
    </div>
</div>
