<div>
    <div class="justify-content-center">
        <button wire:click="$set('op','offer')" class="btn btn-success ">
            اضافة عرض
        </button>
        <a href="{{url('order/negotiation/'.$order->hash_code)}}" class="btn btn-info ">
            استفسار و تفاوض
        </a>
    </div>
    @if($op == 'offer')
        @if($canOffer)
        <h3 class="title mt-0 mb-4 fs-5 fw-bold">أضف عرضك</h3>
        <form action="{{route('front.offers.store')}}" method="POST">
            @csrf
            <div class="row gap-3">
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <div class="col-xl-3 mb-3">
                    <input class="w-100" name="price" type="text" placeholder="مبلغ العرض...">
                </div>
                <div class="col-xl-3 mb-3">
                    <input class="w-100" name="execution_time" type="text" placeholder="وقت التنفيذ...">
                </div>
                <div class="col-xl-3 mb-3">
                    <input class="" name="negotiable"  id="negotiable" type="checkbox" >
                    <label for="negotiable">قابل للتفاوض</label>
                </div>

                <div class="col-12 mb-3">
                    <textarea name="vendor_comment" placeholder=" تفاصيل العرض..."></textarea>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-end flex-wrap">
                    <button type="submit" class="btn btn-success">اضافة عرض</button>
                </div>
            </div>
        </form>
        @else
            <div class="alert alert-success">
                تم اضافة عرضك بالفعل
            </div>
        @endif
    @endif
</div>
