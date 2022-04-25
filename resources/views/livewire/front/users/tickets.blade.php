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
   <header>
        <div class="container">
            <div class="row align-items-center">
                <div
                    class="mb-4 ps-xl-3 mb-xl-0 col-xl-3 text-center text-xl-end d-flex justify-content-between align-items-center"
                >
                    <div
                        class="logo justify-content-center justify-content-xl-end"
                    >
                        <img src="{{asset('tem_assets')}}//img/logo.png" alt="" />
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
                            class="col-md-6 pe-xl-0 d-flex justify-content-center justify-content-md-start align-items-center mb-4 mb-md-0"
                        >
                            <form action="">
                                <div class="inpts">
                                    <div class="search position-relative">
                                        <span class="i-search">
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
                        <div
                            class="col-md-6 d-flex align-items-center text-center text-md-start flex-column flex-lg-row justify-content-end gap-3"
                        >
                            <a href="" class="new-order btn">
                                <i class="fa-solid fa-user-group"></i>
                                طلب جديد
                            </a>
                            <div
                                class="dropdown position-relative me-0 drop-d"
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
    <!-- Start Section tickets -->
    <section class="tickets py-5">
        <div class="container">
            <div class="row">
                <div
                    class="col-12 back mb-5 d-flex align-items-center justify-content-end"
                >
                    <div class="row w-100 justify-content-end">
                        <div
                            class="col-xl-9 d-flex align-items-center justify-content-between"
                        >
                            <h4>تذاكري</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 r-bar text-center text-xl-end ps-xl-5">
                    <div class="row parent-boxes">
                        <div class="col-md-6 col-xl-12 mb-5">
                            <div class="box box-info">
                                <div class="photo">
                                    <img
                                        class="img-fluid"
                                        src="{{asset('tem_assets')}}//img/person.jpg"
                                        alt=""
                                    />
                                </div>
                                <h4>محمد مصطفي</h4>
                                <p>عميل أفراد</p>
                                <img src="{{asset('tem_assets')}}//img/done.svg" alt="" />
                                <!-- <i class="fa-solid fa-circle-check"></i> -->
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-12 mb-5">
                            <div class="box box-welcome">
                                <h6>مرحبا مجددا محمد</h6>
                                <p>
                                    حسابك مكتمل بنسبة
                                    <span class="count">80%</span>
                                </p>
                                <div class="progress prog">
                                    <div
                                        class="progress-bar prog-bar"
                                        role="progressbar"
                                        style="width: 80%"
                                        aria-valuenow="80"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                                <a href="" class="btn">أكمل بيانات حسابك</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-12 mb-5">
                            <div class="box box-package">
                                <i class="fa-solid fa-ribbon"></i>
                                <h6>الباقة الفضية</h6>
                                <p>
                                    ينتهي اشتراكك في
                                    <span class="deta">4/15/2022</span>
                                </p>
                                <p>متبقي علي انتهاء اشتراكك</p>
                                <p>10 أيام</p>
                                <div class="progress prog">
                                    <div
                                        class="progress-bar prog-bar"
                                        role="progressbar"
                                        style="width: 80%"
                                        aria-valuenow="80"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                                <a href="" class="btn">أكمل بيانات حسابك</a>
                            </div>
                        </div>
                        <div class="col-12 col-xl-12 mb-5">
                            <a href="" class="support">
                                الدعم
                                <i class="fa-solid fa-comments"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div
                        class="d-flex align-items-center flex-wrap gap-2 justify-content-between"
                    >
                        <div class="m-auto m-md-0 count-tickets">
                            <div class="logo">
                                <img
                                    class="img-fluid"
                                    src="{{asset('tem_assets')}}//img/logo.png"
                                    alt=""
                                />
                                <div class="text-logo">
                                    <h6>موثوق Reliable</h6>
                                    <p>صنتاع الثقة Trust Makers</p>
                                </div>
                            </div>
                            <div class="count">لديك {{$tickets->count()}} تذكرة</div>
                        </div>
                        <div class="new-ticket m-auto m-md-0 btn">
                            تذكرة جديدة
                        </div>
                    </div>
                    <div class="all-tickets d-flex flex-column gap-3">

                        @foreach ($tickets as $ticket)
                        <div class="ticket">
                            <div class="date">
                                <i class="fa-regular fa-clock"></i>
                                {{$ticket->created_at->diffForHumans()}}
                            </div>
                            <p class="text">
                                {{$ticket->ticket_title}}
                            </p>
                            @if ($ticket->ticket_status == 'opened')
                                <div class="status open">تذكرة مفتوحة</div>
                            @else
                                <div class="status close">تذكرة مغلقة</div>
                            @endif
                        </div>
                        @endforeach
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section  tickets-->
    <!-- Js Files -->


    <script src="{{asset('tem_assets')}}/js/all.min.js"></script>
    <script src="{{asset('tem_assets')}}/js/tickets.js"></script>
    <script src="{{asset('tem_assets')}}/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>