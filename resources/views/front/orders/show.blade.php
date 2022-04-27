@extends('front.orders.show-layout')
@section('order-page')
    @if($order->isActiveUser())
        <div
                class="box-search row d-flex align-items-center justify-content-between"
        >
            <div class="col-xl-8 d-flex align-items-center gap-3">
                <span class="titl-search">العروص المقدمة</span>
                <form class="flex-fill" action="">
                    <div class="box-inpt position-relative">
                        <input
                                type="search"
                                placeholder="أبحث بالأسم....."
                                name="search-offers"
                                id=""
                        />
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </form>
            </div>
            <div
                    class="btns mt-3 mt-xl-0 col-xl-4 d-flex align-items-center gap-1 justify-content-between"
            >
                <a href="" class="btn new"> الأحدث </a>
                <a href="" class="btn old"> الأقدم </a>

                <a href="" class="btn favorite">
                    المفضلة: <span>5</span>
                </a>
            </div>
        </div>
        <div class="boxes-offers d-flex flex-wrap">
            @foreach($order->offers->unique(function ($item){return $item->vendor->id;}) as $offer)
                <x-order.vendor-card :item="$offer" :isOffer="true"  />
            @endforeach
            @foreach($order->negotiations->unique(function ($item){return $item->vendor->id;}) as $offer)
                <x-order.vendor-card :item="$offer" :isOffer="true"  />
            @endforeach
        </div>
    @else
        <div class="group-btn flex-wrap mb-5 d-flex align-items-center justify-content-center">
            <a href="" class="btn btn-one">تقديم عرض</a>
            <a href="" class="btn btn-two">استفسار وتفاوض </a>
        </div>
    @endif
@endsection