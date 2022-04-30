<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
    @yield('css')
</head>

<body class="antialiased">

    <div class="top-header" style="background-color: #f6f6f6">
        <div class="container">
            <ul class="list-unstyled d-flex m-0">
                <li class="ms-4 position-relative">
                    <a href="#" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false"><img src="{{asset('assets/images/notification-nav.svg')}}" alt="" srcset="" />
                        <span class="red-circle"></span>
                    </a>
                    <ul class="dropdown-menu rri_o" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-iyems-center o_noti">
                                    <div>
                                        <img class="ms-3" style="width: 40px;height: 40px;border-radius: 50%;"
                                            src="{{asset('assets/images/user.svg')}}" alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="btw-flex w-100">
                                            <span style="color: #2B7B74;">محمد مصطفي</span>
                                            <span class=" ">
                                                <img src="{{asset('assets/images/o_cclo.svg')}}" alt="">
                                                <span style="color: #0995EB;">منذ 30 دقيقة</span>
                                            </span>
                                        </div>
                                        <p class="text-end my-1">قام بتقديم عرض علي منشورك اليوم</p>

                                    </div>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-iyems-center o_noti">
                                    <div>
                                        <img class="ms-3" style="width: 40px;height: 40px;border-radius: 50%;"
                                            src="{{asset('assets/images/user.svg')}}" alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="btw-flex w-100">
                                            <span style="color: #2B7B74;">محمد مصطفي</span>
                                            <span class=" ">
                                                <img src="{{asset('assets/images/o_cclo.svg')}}" alt="">
                                                <span style="color: #0995EB;">منذ 30 دقيقة</span>
                                            </span>
                                        </div>
                                        <p class="text-end my-1">قام بتقديم عرض علي منشورك اليوم</p>

                                    </div>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-iyems-center o_noti">
                                    <div>
                                        <img class="ms-3" style="width: 40px;height: 40px;border-radius: 50%;"
                                            src="{{asset('assets/images/user.svg')}}" alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="btw-flex w-100">
                                            <span style="color: #2B7B74;">محمد مصطفي</span>
                                            <span class=" ">
                                                <img src="{{asset('assets/images/o_cclo.svg')}}" alt="">
                                                <span style="color: #0995EB;">منذ 30 دقيقة</span>
                                            </span>
                                        </div>
                                        <p class="text-end my-1">قام بتقديم عرض علي منشورك اليوم</p>

                                    </div>

                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="ms-5 position-relative">
                    <a href="#"><img src="{{asset('assets/images/nav-message.svg')}}" alt="" srcset="" />
                        <span class="red-circle"></span>
                    </a>
                </li>
                <li class="d-flex">
                    <div class="ms-2 position-relative">
                        <input style="font-size: 13px; padding: 8px 30px" type="text" class="border-0 rounded"
                            placeholder="...بحث" />
                        <img style="width: 15px; position: absolute; right: 7px; top: 10px"
                            src="{{asset('assets/images/nav-search.svg')}}" alt="" />
                        <img style="width: 15px; position: absolute; left: 7px; top: 10px" src="{{asset('assets/images/nav-input.svg')}}"
                            alt="" />
                    </div>
                    <button style="
                border: 0;
                background-color: #048e81;
                color: #fff;
                font-size: 12px;
                padding: 0 40px;
              " class="rounded">
                        بحث
                    </button>
                </li>
                <li style="margin-right: auto">
                    <div class="dropdown">
                        <a style="background-color: #fff" class="btn dropdown-toggle" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img style="width: 25px; margin-left: 5px" src="{{asset('assets/images/dash-user.png')}}" alt="" srcset="" />
                            <span class="ms-5" style="color: #048e81; font-size: 13px">محمد مصطفى على</span>
                        </a>

                        <ul class="dropdown-menu profile" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{url('profile')}}">الملف الشخصي</a></li>
                            <li><a class="dropdown-item" href="#">الطلبات</a></li>
                            <li>
                                <a class="dropdown-item" href="#">المحفظة</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">الدعم الفني</a>
                            </li>
                            <li>
                                <a class="dropdown-item logout" href="#">تسجيل خروج</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
