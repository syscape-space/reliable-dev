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
        <div class="box-offer overflow-hidden mb-5">
            <div class="add-offer position-relative">
                <h3 class="title mt-0 mb-4 fs-5 fw-bold">أضف عرضك</h3>
                <form action="">
                    <div class="row gap-3">
                        <div class="col-xl-3 mb-3">
                            <input class="w-100" type="text" placeholder="مبلغ العرض...">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <input class="w-100" type="text" placeholder="طريقة التنفيذ...">
                        </div>

                        <div class="col-12 mb-3">
                            <textarea name="" placeholder=" تفاصيل العرض..."></textarea>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-end flex-wrap">
                            <a href="" class="btn">اضافة عرض</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <div style="
                                background-color: #ecf8ff;
                                border-radius: 10px;
                                transition: 500ms;
                                transform: translateX(100%);

                                border: 1px solid #0491e8;
                            " class="negotiation p-2">
                    <div class="d-flex">
                                <span style="
                                        display: flex;
                                        align-items: center;
                                        justify-content: space-around;
                                        min-width: 70px;
                                    ">
                                    <span>
                                        <svg style="color: rgb(111, 111, 111);" class="svg-inline--fa fa-folder" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="folder" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48h-416C21.5 480 0 458.5 0 432v-352C0 53.5 21.5 32 48 32h160l64 64h192C490.5 96 512 117.5 512 144z"></path></svg><!-- <i style="color: rgb(111, 111, 111)" class="fas fa-folder"></i> Font Awesome fontawesome.com -->
                                    </span>
                                    <span>
                                        <svg style="color: rgb(111, 111, 111);" class="svg-inline--fa fa-microphone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="microphone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M192 352c53.03 0 96-42.97 96-96v-160c0-53.03-42.97-96-96-96s-96 42.97-96 96v160C96 309 138.1 352 192 352zM344 192C330.7 192 320 202.7 320 215.1V256c0 73.33-61.97 132.4-136.3 127.7c-66.08-4.169-119.7-66.59-119.7-132.8L64 215.1C64 202.7 53.25 192 40 192S16 202.7 16 215.1v32.15c0 89.66 63.97 169.6 152 181.7V464H128c-18.19 0-32.84 15.18-31.96 33.57C96.43 505.8 103.8 512 112 512h160c8.222 0 15.57-6.216 15.96-14.43C288.8 479.2 274.2 464 256 464h-40v-33.77C301.7 418.5 368 344.9 368 256V215.1C368 202.7 357.3 192 344 192z"></path></svg><!-- <i style="color: rgb(111, 111, 111)" class="fas fa-microphone"></i> Font Awesome fontawesome.com -->
                                    </span>
                                </span>
                        <textarea style="padding: 12px 10px 0; height: 50px" placeholder="اكتب تعليقك هنا" name="" id="" cols="30" rows="2" class="form-control bg-transparent border-0"></textarea>
                        <div style="
                                        display: flex;
                                        align-items: center;
                                        justify-content: space-around;
                                        min-width: 70px;
                                    ">
                            <span><svg class="svg-inline--fa fa-ellipsis-vertical" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-vertical" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" data-fa-i2svg=""><path fill="currentColor" d="M64 360C94.93 360 120 385.1 120 416C120 446.9 94.93 472 64 472C33.07 472 8 446.9 8 416C8 385.1 33.07 360 64 360zM64 200C94.93 200 120 225.1 120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200zM64 152C33.07 152 8 126.9 8 96C8 65.07 33.07 40 64 40C94.93 40 120 65.07 120 96C120 126.9 94.93 152 64 152z"></path></svg><!-- <i class="fas fa-ellipsis-v"></i> Font Awesome fontawesome.com --></span>
                            <img style="width: 40px; height: 40px" src="./img/telegram.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection