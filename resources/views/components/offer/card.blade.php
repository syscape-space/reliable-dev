<div class="box-order service-provider">
    <div class="info">
        <div class="photo">
            <img class="img-fluid" src="{{ cloudUrl($offer->vendor->photo_profile) }}" alt="">
        </div>

        <p class="name">{{ $offer->vendor->name }}</p>
        <p class="job">مقدم الخدمة</p>
    </div>
    <div class="text">
        <div class="data flex-wrap d-flex justify-content-end align-items-center">
            <div class="d-flex flex-wrap align-items-center gap-3 gap-md-4">
                <div class="item">
                    <svg class="svg-inline--fa fa-clock" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z">
                        </path>
                    </svg><!-- <i class="fa-solid fa-clock"></i> Font Awesome fontawesome.com -->
                    مدة التسليم:
                    {{ $offer->execution_time }}
                    يوم
                </div>
                <div class="item price">
                    <svg class="svg-inline--fa fa-coins" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="coins" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M512 80C512 98.01 497.7 114.6 473.6 128C444.5 144.1 401.2 155.5 351.3 158.9C347.7 157.2 343.9 155.5 340.1 153.9C300.6 137.4 248.2 128 192 128C183.7 128 175.6 128.2 167.5 128.6L166.4 128C142.3 114.6 128 98.01 128 80C128 35.82 213.1 0 320 0C426 0 512 35.82 512 80V80zM160.7 161.1C170.9 160.4 181.3 160 192 160C254.2 160 309.4 172.3 344.5 191.4C369.3 204.9 384 221.7 384 240C384 243.1 383.3 247.9 381.9 251.7C377.3 264.9 364.1 277 346.9 287.3C346.9 287.3 346.9 287.3 346.9 287.3C346.8 287.3 346.6 287.4 346.5 287.5L346.5 287.5C346.2 287.7 345.9 287.8 345.6 288C310.6 307.4 254.8 320 192 320C132.4 320 79.06 308.7 43.84 290.9C41.97 289.9 40.15 288.1 38.39 288C14.28 274.6 0 258 0 240C0 205.2 53.43 175.5 128 164.6C138.5 163 149.4 161.8 160.7 161.1L160.7 161.1zM391.9 186.6C420.2 182.2 446.1 175.2 468.1 166.1C484.4 159.3 499.5 150.9 512 140.6V176C512 195.3 495.5 213.1 468.2 226.9C453.5 234.3 435.8 240.5 415.8 245.3C415.9 243.6 416 241.8 416 240C416 218.1 405.4 200.1 391.9 186.6V186.6zM384 336C384 354 369.7 370.6 345.6 384C343.8 384.1 342 385.9 340.2 386.9C304.9 404.7 251.6 416 192 416C129.2 416 73.42 403.4 38.39 384C14.28 370.6 .0003 354 .0003 336V300.6C12.45 310.9 27.62 319.3 43.93 326.1C83.44 342.6 135.8 352 192 352C248.2 352 300.6 342.6 340.1 326.1C347.9 322.9 355.4 319.2 362.5 315.2C368.6 311.8 374.3 308 379.7 304C381.2 302.9 382.6 301.7 384 300.6L384 336zM416 278.1C434.1 273.1 452.5 268.6 468.1 262.1C484.4 255.3 499.5 246.9 512 236.6V272C512 282.5 507 293 497.1 302.9C480.8 319.2 452.1 332.6 415.8 341.3C415.9 339.6 416 337.8 416 336V278.1zM192 448C248.2 448 300.6 438.6 340.1 422.1C356.4 415.3 371.5 406.9 384 396.6V432C384 476.2 298 512 192 512C85.96 512 .0003 476.2 .0003 432V396.6C12.45 406.9 27.62 415.3 43.93 422.1C83.44 438.6 135.8 448 192 448z">
                        </path>
                    </svg><!-- <i class="fa-solid fa-coins"></i> Font Awesome fontawesome.com -->المبلغ:
                    {{ $offer->price }}$
                </div>
                <div class="deta ms-4">
                    <span> {{ \Carbon\Carbon::parse($offer->created_at)->toTimeString() }} </span>
                    <span> {{ \Carbon\Carbon::parse($offer->created_at)->toDateString() }} </span>
                </div>
                <a href="" class="setting">
                    <svg class="svg-inline--fa fa-ellipsis-vertical" aria-hidden="true" focusable="false"
                        data-prefix="fas" data-icon="ellipsis-vertical" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 128 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M64 360C94.93 360 120 385.1 120 416C120 446.9 94.93 472 64 472C33.07 472 8 446.9 8 416C8 385.1 33.07 360 64 360zM64 200C94.93 200 120 225.1 120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200zM64 152C33.07 152 8 126.9 8 96C8 65.07 33.07 40 64 40C94.93 40 120 65.07 120 96C120 126.9 94.93 152 64 152z">
                        </path>
                    </svg><!-- <i class="fa-solid fa-ellipsis-vertical"></i> Font Awesome fontawesome.com -->
                    <div class="report">
                        <svg class="svg-inline--fa fa-flag" aria-hidden="true" focusable="false" data-prefix="fas"
                            data-icon="flag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M64 496C64 504.8 56.75 512 48 512h-32C7.25 512 0 504.8 0 496V32c0-17.75 14.25-32 32-32s32 14.25 32 32V496zM476.3 0c-6.365 0-13.01 1.35-19.34 4.233c-45.69 20.86-79.56 27.94-107.8 27.94c-59.96 0-94.81-31.86-163.9-31.87C160.9 .3055 131.6 4.867 96 15.75v350.5c32-9.984 59.87-14.1 84.85-14.1c73.63 0 124.9 31.78 198.6 31.78c31.91 0 68.02-5.971 111.1-23.09C504.1 355.9 512 344.4 512 332.1V30.73C512 11.1 495.3 0 476.3 0z">
                            </path>
                        </svg><!-- <i class="fa-solid fa-flag"></i> Font Awesome fontawesome.com -->
                        ابلاغ عن الطلب
                    </div>
                </a>
            </div>
        </div>

        <p class="content">
            {!! $offer->vendor_comment !!}
        </p>

        <div class="btns d-flex align-items-center justify-content-end gap-2">
            @if ($offer->offer_status == 'approved')
                <span class="text-success">تم قبول العرض</span>
            @else
                @if ($offer->order->isActiveUser())
                    <form action="{{ route('front.offer.accept', $offer) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn acceptance btn-success">قبول العرض</button>
                    </form>

                    @if ($offer->negotiable)
                        <a href="" class="btn acceptance btn-success">تفاوض</a>
                    @endif
                @endif
            @endif
        </div>

    </div>
    {{-- ------------------------------------------ pop ----------------------------------- --}}
    @if ($offer->order->active_vendor == active_user())
        @if (!$offer->order->pending_judger and !$offer->order->active_judger)
            <div class="pop">
                <div class="close"><i class="fa-solid fa-xmark"></i></div>
                <a href="{{ route('front.orders.select-judger', $offer->order) }}" class="btn">عرض كل
                    المحكمين</a>
                <p class="mb-5">
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
                    هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو
                    العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                    التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص
                    العربى زيادة عدد الفقرات كما تريد
                </p>
                <div class="btn btn-nominated">رشح محكم من الخارج</div>
                <p class="m-0">
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
                    هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو
                    العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                    التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص
                    العربى زيادة عدد الفقرات كما تريد
                </p>
            </div>
        @endif
    @endif


    @if ($offer->order->pending_judger and $offer->order->user_id == auth()->id())
        @php
            $judger = $offer->order->pending_judger;
        @endphp
        <div class="acceptTheOffer2-pop pop">
            <div class="close"><i class="fa-solid fa-xmark"></i></div>
            <h3 class="title fw-bold fs-6 text-center mt-5 mb-4 position-relative">
                لقد تم اختيار المحكم من قبل المحامي
                <div class="time">
                    الوقت المتبقي:
                    <img src="./img/time-pop.PNG" alt="" />
                </div>
            </h3>
            <div class="info d-flex flex-column flex-lg-row align-items-center justify-content-between flex-wrap">
                <div class="text">
                    <p class="name">{{ $judger->name }}</p>
                    <p>.محكم جميع المجالات</p>
                    <p>رخصة برقم: 15415415415</p>
                    <p>عدد العقود المنفذة: 25</p>
                    <p>مكان العمل: جميع المدن</p>
                </div>
                <div class="photo">
                    <div class="cont-img">
                        <img src="./img/photo" alt="" />
                    </div>
                    <div class="star">
                        4.5
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
            <a href="" class="profile"> تصفح الملف الشخصي </a>
            <div class="group-btn d-flex align-items-center justify-content-center gap-4">
                <form action="{{ route('front.accept_judger_by_user', $offer->order->id) }}" method="POST">
                    @csrf
                    <button class="btn m-0">قبول المحكم</button>
                </form>
                <a href="" class="refusal btn m-0">رفض المحكم</a>
            </div>
            <div class="chat w-75 mx-auto">
                <div style="
                    background-color: #ecf8ff;
                    border-radius: 10px;

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
                                <i style="color: rgb(111, 111, 111)" class="fas fa-folder"></i>
                            </span>
                            <span>
                                <i style="color: rgb(111, 111, 111)" class="fas fa-microphone"></i>
                            </span>
                        </span>
                        <textarea style="padding: 12px 10px 0; height: 50px" placeholder="اكتب تعليقك هنا" name="" id="" cols="30" rows="2"
                            class="form-control bg-transparent border-0"></textarea>
                        <div style="
                            display: flex;
                            align-items: center;
                            justify-content: space-around;
                            min-width: 70px;
                        ">
                            <span><i class="fas fa-ellipsis-v"></i></span>
                            <img style="width: 40px; height: 40px" src="./img/telegram.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
