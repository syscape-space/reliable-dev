<div class="box-offer">
    <livewire:favorite-button :item="$item"/>
    <div class="row">
        <div class="col-7 info p-0">
            <p class="name">{{$item->vendor->name}}</p>
            <p class="specialty">
                {{$item->vendor->department->department_name_ar ?? ""}}
            </p>
            <p class="license-number">
                <span class="color">رخصة برقم:</span>
                21450364102
            </p>
            @if($isOffer)
            <p class="duration">
                <span class="color">مدة التسليم:</span>
                {{$item->execution_time}}
                 يوم
            </p>
            <p class="price">
                <span class="color">القيمة:</span>
                ريال {{$item->amount}}
            </p>
            <p class="deta">
                <span class="color">التاريخ:</span>
                {{$item->created_at}}
            </p>
            @else

            @endif
        </div>
        <div class="col-5 photo p-0">
            <div class="img-cont">
                @if($item->vendor->is_online)
                <div class="active"></div>
                @endif
                <img
                        class="img-fluid"
                        src="{{cloudUrl($item->vendor->photo_profile)}}"
                        alt=""
                />
            </div>
            <div class="star">
                4.5
                <i class="fa-solid fa-star"></i>
            </div>
            <a href="" class="profile">تصفح الملف الشخصي</a>
        </div>
        <div class="col-12 controll">
            @if($isOffer)
                <a href="{{route('front.order.offers.show',['hash_code'=>$item->order->hash_code,'id'=>$item->id])}}" class="btn view">العرض المقدم</a>
                @if($item->negotiable)
                <span class="btn negotiable">
                    قابل للتفاوض
                </span>
                @else
                <span class="btn  btn-outline-danger">
                    غير قابل للتفاوض
                </span>
                @endif
            @else
                <a href="{{route('front.negotiations.show',['id'=>$item->id])}}" class="btn view">
                    الاستفسار و التفاوض
                    <span class="badge badge-danger bg-danger text-white badge">{{$item->messages()->count()}}</span>
                </a>
            @endif
        </div>
    </div>
</div>