<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Normalize -->
    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/normalize.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/all.min.css" />
    <!-- Main Faile Css  -->
    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/style.css" />
    @livewireStyles
</head>
<body>
 
    <!-- Sttart Header -->
    <header class="togg-s">
        <div class="container">
            <div class="row align-items-center">
                <div
                    class="mb-4 gap-4 ps-xl-3 mb-xl-0 col-xl-3 text-center text-xl-end d-flex justify-content-between align-items-center"
                >
                    <div
                        class="logo justify-content-center justify-content-xl-end"
                    >
                        <img src="{{asset('tem_assets')}}/img/logo.png" alt="" />
                        <div class="text">
                            <h6>موثوق Reliable</h6>
                            <p>صنتاع الثقة Trust Makers</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="" class="icon-notice position-relative">
                            <i class="fa-solid fa-bell"></i
                            ><span class="notice"></span>
                        </a>
                        <a href="" class="icon-mssg position-relative">
                            <i class="fa-regular fa-comments"></i
                            ><span class="mssg"></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="row">
                        <div
                            class="col-md-6 mb-4 mb-md-0 pe-xl-0 d-flex align-items-center"
                        >
                            <form action="">
                                <span class="i-search togg-search">
                                    <i
                                        class="fa-solid fa-magnifying-glass"
                                    ></i>
                                </span>
                                <div class="inpts">
                                    <div class="search position-relative">
                                        <span class="i-search togg-search">
                                            <i
                                                class="fa-solid fa-magnifying-glass"
                                            ></i>
                                        </span>
                                        <input
                                            type="search"
                                            name=""
                                            id=""
                                            placeholder="بحث...."
                                        />
                                        <span class="i-filter">
                                            <i
                                                class="fa-solid fa-filter"
                                            ></i>
                                        </span>
                                    </div>
                                    <input
                                        id="sub"
                                        type="submit"
                                        value="بحث"
                                    />
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 text-center text-md-start">
                            <div
                                class="dropdown ms-auto ms-md-0 position-relative drop-d"
                            >
                                <button
                                    class="ms-auto ms-md-0 btn btn-secondary dropdown-toggle"
                                    type="button"
                                    id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <div
                                        class="d-flex gap-2 align-items-center"
                                    >
                                        <span class="photo">
                                            <img
                                                class="img-fluid"
                                                src="img/photo"
                                                alt=""
                                            />
                                        </span>

                                        محمد مصطفي علي
                                    </div>
                                </button>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton1"
                                >
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >تعديل الملف الشخصي</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >الاعدادات
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Start Section Orders-->
    <section class="offers overflow-hidden py-5">
        <div class="container">
            <div
                class="col-12 back mb-5 flex-wrap gap-5 d-flex align-items-center justify-content-between"
            >
                <div
                    class="link-sections flex-wrap d-flex align-items-center gap-4"
                >
                    الرئيسية / المشاريع / القسم الرئيسي / القسم الفرعي
                </div>
                <a href="" class="icon-back"> اغلاق المشروع </a>
            </div>
            <div class="level-and-status">
                <div class="row">
                    <div class="col-xl-3">
                        <div
                            class="status-parent text-center text-xl-end py-3"
                        >
                            <div class="status-child">
                                حالة المشروع:
                                <span class="open status">{{$order->order_status}}</span>
                            </div>
                            <div class="order-number">
                                طلب رقم:
                                <span>{{$order->id}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <ul class="level">
                            <li class="active">
                                <div class="icon">
                                    <i class="fa-regular fa-handshake"></i>
                                </div>
                                الأطلاع وتقديم العروض
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-regular fa-handshake"></i>
                                </div>
                                الأطلاع وتقديم العروض
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-regular fa-handshake"></i>
                                </div>
                                الأطلاع وتقديم العروض
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="boxes d-flex flex-column mb-5 gap-5">
                <div class="box-order">
                    <div class="info">
                        <div class="photo">
                            <img
                                class="img-fluid"
                                src="{{ $order->user->photo_profile }}"
                                alt=""
                            />
                        </div>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="name">{{ $order->user->name }}</p>
                        <p class="job">{{ $order->department->department_name_ar }}</p>
                    </div>
                    <div class="text">
                        <div
                            class="data flex-wrap d-flex justify-content-between align-items-center"
                        >
                            <div class="order-num mb-3 mb-lg-0">
                                طلب رقم : <span class="count">{{$order->id}}</span>
                            </div>
                            <div
                                class="d-flex flex-wrap align-items-center gap-3 gap-md-4"
                            >
                                <div class="deta">
                                    <i class="fa-solid fa-calendar-day"></i>
                                    {{ \Carbon\Carbon::create($order->created_at)->format('Y-m-d') }} 
                                </div>
                                <div class="view">
                                    <i class="fa-solid fa-eye"></i> {{$order->views}}

                                    مشاهده
                                </div>
                                <div class="deta">
                                    <i class="fa-solid fa-clock"></i>
                                    {{ \Carbon\Carbon::create($order->created_at)->diffForHumans() }} 
                                </div>
                                <div class="deta">
                                    <i class="fa-solid fa-money-bills"></i>
                                    عدد 5 عروض
                                </div>
                                <div class="deta">
                                    <i class="fa-solid fa-location-dot"></i>
                                    {{$order->city->city_name_ar}}
                                </div>
                                <div class="duration">
                                    <i class="fa-solid fa-clock"></i>

                                    مده التسليم {{ $order->execution_time }} يوم
                                </div>
                                <a href="" class="setting">
                                    <i
                                        class="fa-solid fa-ellipsis-vertical"
                                    ></i>
                                    <div class="report">
                                        <i class="fa-solid fa-flag"></i>
                                        ابلاغ عن الطلب
                                    </div>
                                </a>
                            </div>
                        </div>
                        <h5 class="title">
                            {{ $order->order_title }}
                        </h5>

                        <p class="content">
                            {{ $order->order_content }}
                        </p>
                        <div class="file-parent mt-4">
                            <p>ملف مرفق</p>
                            <a href="" class="file-child">
                                ملف الطلب بالكامل
                                <span>PDF File</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-search row d-flex align-items-center justify-content-between">
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
                @foreach ($order->offers as $offer)
                    <div class="box-offer">
                        <i class="fa-solid fa-star star-box"></i>
                        <div class="row">
                            <div class="col-7 info p-0">
                                <p class="name">{{ $offer->vendor->name }}</p>
                                <p class="specialty">
                                    <span class="color">محامي:</span>
                                    جميع الحالات
                                </p>
                                <p class="license-number">
                                    <span class="color">رخصة برقم:</span>
                                    @if ($offer->vendor->licenses->count() > 0)
                                    {{$offer->vendor->licenses[0]->license_name}}
                                    @endif
                                    
                                </p>
                                <p class="duration">
                                    <span class="color">مدة التسليم:</span>
                                    {{ $offer->execution_time }} يوم
                                </p>
                                <p class="price">
                                    <span class="color">القيمة:</span>
                                    ريال {{ $offer->price }}
                                </p>
                                <p class="deta">
                                    <span class="color">التاريخ:</span>
                                    {{ \Carbon\Carbon::create($offer->created_at)->format('Y-m-d') }}
                                </p>
                            </div>
                            <div class="col-5 photo p-0">
                                <div class="img-cont">
                                    <div class="active"></div>
                                    <img
                                        class="img-fluid"

                                        {{ asset($offer->vendor->photo_profile) }}
                                        alt=""
                                    />
                                </div>
                                <div class="star">
                                    {{$offer->vendor->rate_overall}}
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <a href="" class="profile">تصفح الملف الشخصي</a>
                            </div>
                            <div class="col-12 controll">
                                <a href="" class="btn view">العرض المقدم</a>

                                @if ($offer->negotiable)
                                    <a href="" class="btn negotiable">
                                        قابل للتفاوض
                                    </a>
                                @else
                                <a href="" class="btn non-negotiable">
                                    غير قابل للتفاوض
                                </a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                @endforeach
                
                {{-- {{ dd($order->offers) }} --}}
                {{-- <div class="box-offer">
                    <i class="fa-solid fa-star star-box"></i>

                    <div class="row">
                        <div class="col-7 info p-0">
                            <p class="name">محمد مصطفي علي</p>
                            <p class="specialty">
                                <span class="color">محامي:</span>
                                جميع الحالات
                            </p>
                            <p class="license-number">
                                <span class="color">رخصة برقم:</span>
                                21450364102
                            </p>
                            <p class="duration">
                                <span class="color">مدة التسليم:</span>
                                15 يوم
                            </p>
                            <p class="price">
                                <span class="color">القيمة:</span>
                                ريال 150
                            </p>
                            <p class="deta">
                                <span class="color">التاريخ:</span>
                                4/20/2022
                            </p>
                        </div>
                        <div class="col-5 photo p-0">
                            <div class="img-cont">
                                <div class="active"></div>
                                <img
                                    class="img-fluid"
                                    src="{{asset('tem_assets')}}/img/person.jpg"
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
                            <a href="" class="btn view">العرض المقدم</a>
                            <a href="" class="btn non-negotiable">
                                غير قابل للتفاوض
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-offer">
                    <i class="fa-solid fa-star star-box"></i>

                    <div class="row">
                        <div class="col-7 info p-0">
                            <p class="name">محمد مصطفي علي</p>
                            <p class="specialty">
                                <span class="color">محامي:</span>
                                جميع الحالات
                            </p>
                            <p class="license-number">
                                <span class="color">رخصة برقم:</span>
                                21450364102
                            </p>
                            <p class="duration">
                                <span class="color">مدة التسليم:</span>
                                15 يوم
                            </p>
                            <p class="price">
                                <span class="color">القيمة:</span>
                                ريال 150
                            </p>
                            <p class="deta">
                                <span class="color">التاريخ:</span>
                                4/20/2022
                            </p>
                        </div>
                        <div class="col-5 photo p-0">
                            <div class="img-cont">
                                <div class="active"></div>
                                <img
                                    class="img-fluid"
                                    src="{{asset('tem_assets')}}/img/person.jpg"
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
                            <a href="" class="btn inquiries"
                                >أستفسار وتفاوض
                                <div class="noti">2</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-offer">
                    <i class="fa-solid fa-star star-box"></i>

                    <div class="row">
                        <div class="col-7 info p-0">
                            <p class="name">محمد مصطفي علي</p>
                            <p class="specialty">
                                <span class="color">محامي:</span>
                                جميع الحالات
                            </p>
                            <p class="license-number">
                                <span class="color">رخصة برقم:</span>
                                21450364102
                            </p>
                            <p class="duration">
                                <span class="color">مدة التسليم:</span>
                                15 يوم
                            </p>
                            <p class="price">
                                <span class="color">القيمة:</span>
                                ريال 150
                            </p>
                            <p class="deta">
                                <span class="color">التاريخ:</span>
                                4/20/2022
                            </p>
                        </div>
                        <div class="col-5 photo p-0">
                            <div class="img-cont">
                                <div class="active"></div>
                                <img
                                    class="img-fluid"
                                    src="{{asset('tem_assets')}}/img/person.jpg"
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
                            <a href="" class="btn view">العرض المقدم</a>
                            <a href="" class="btn non-negotiable">
                                غير قابل للتفاوض
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-offer">
                    <i class="fa-solid fa-star star-box"></i>

                    <div class="row">
                        <div class="col-7 info p-0">
                            <p class="name">محمد مصطفي علي</p>
                            <p class="specialty">
                                <span class="color">محامي:</span>
                                جميع الحالات
                            </p>
                            <p class="license-number">
                                <span class="color">رخصة برقم:</span>
                                21450364102
                            </p>
                            <p class="duration">
                                <span class="color">مدة التسليم:</span>
                                15 يوم
                            </p>
                            <p class="price">
                                <span class="color">القيمة:</span>
                                ريال 150
                            </p>
                            <p class="deta">
                                <span class="color">التاريخ:</span>
                                4/20/2022
                            </p>
                        </div>
                        <div class="col-5 photo p-0">
                            <div class="img-cont">
                                <div class="active"></div>
                                <img
                                    class="img-fluid"
                                    src="{{asset('tem_assets')}}/img/person.jpg"
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
                            <a href="" class="btn inquiries"
                                >أستفسار وتفاوض
                                <div class="noti">2</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-offer">
                    <i class="fa-solid fa-star star-box"></i>
                    <div class="row">
                        <div class="col-7 info p-0">
                            <p class="name">محمد مصطفي علي</p>
                            <p class="specialty">
                                <span class="color">محامي:</span>
                                جميع الحالات
                            </p>
                            <p class="license-number">
                                <span class="color">رخصة برقم:</span>
                                21450364102
                            </p>
                            <p class="duration">
                                <span class="color">مدة التسليم:</span>
                                15 يوم
                            </p>
                            <p class="price">
                                <span class="color">القيمة:</span>
                                ريال 150
                            </p>
                            <p class="deta">
                                <span class="color">التاريخ:</span>
                                4/20/2022
                            </p>
                        </div>
                        <div class="col-5 photo p-0">
                            <div class="img-cont">
                                <div class="active"></div>
                                <img
                                    class="img-fluid"
                                    src="{{asset('tem_assets')}}/img/person.jpg"
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
                            <a href="" class="btn view">العرض المقدم</a>
                            <a href="" class="btn negotiable">
                                قابل للتفاوض
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End Section Orders-->
    <!-- Js Files -->
    <script src="{{asset('tem_assets')}}/js/all.min.js"></script>
    <script src="{{asset('tem_assets')}}/js/tickets.js"></script>
    <script src="{{asset('tem_assets')}}/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>