<div>
    <div class="row m-2">
        <div class="col-md-3 mb-3">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
              <div class="form-group ms-2 my-2">
                  <label for="" class="mb-2" style="font-size:16px;">قسم رئيسي</label>
                  <div class="position-relative">
                    <select id="" wire:model="selected_main_id" class="form-control" style="background-color: var(--light-green-color);
                          padding: 5px 10px !important;
                          border: 0.5px solid #0491e8;
                          display: flex;
                          border-radius: 7px;
                          align-items: center;
                          justify-content: space-between;
                          font-size: 17px;
                          cursor: pointer;
                          min-width: 200px;">
                        <option value="">قسم رئيسي</option>
                        @foreach ($main_categories as $depart)
                            <option value="{{$depart->id}}">{{$depart->department_name_ar}}</option>
                        @endforeach
                    </select>
                    <span class="i-filter" style="position: absolute; top: 50%; transform: translateY(-50%); left: 10px; color: #0491e8;">
                        <i class="fa-solid fa-filter"></i>
                    </span>
                  </div>
              </div>
            </div>
        </div>
        @if($sub_categories and $sub_categories->count())
            <div class="col-md-3">
                <div class="form-group ms-2 my-2">
                    <label for="">فرعي من</label>
                    <div class="position-relative">
                      <select name="parent" id="" wire:model="parent" class="form-control">
                          <option value="">قسم فرعي منه</option>
                          @foreach ($sub_categories as $depart)
                              <option value="{{$depart->id}}">{{$depart->department_name_ar}}</option>
                          @endforeach
                      </select>
                      <span class="i-filter" style="position: absolute; top: 50%; transform: translateY(-50%); left: 10px; color: #0491e8;">
                          <i class="fa-solid fa-filter"></i>
                      </span>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <section class="orders ">

    <div class="boxes d-flex flex-column gap-3">
        @forelse($orders as $order)
            <x-order.card :order="$order" />
        @empty
            <h4>لا يوجد طلبات</h4>
        @endforelse
    </div>

  </section>

</div>
