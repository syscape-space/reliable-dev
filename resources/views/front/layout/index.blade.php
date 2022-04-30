<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('front.layout.head')
</head>

<body class="position-relative">
    <!-- ============================================================================================================
  ===================================== Start Header ==============================================================
  ============================================================================================================= -->

      <header>
        <div class="container">
            <div class="row align-items-center">
                <div
                    class="mb-4 ps-xl-3 mb-xl-0 col-xl-3 text-center text-xl-end d-flex justify-content-between align-items-center"
                >
                    <div
                        class="logo justify-content-center justify-content-xl-end"
                    >
                        <img src="{{asset('assets/img/logo.png')}}" alt="" />
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
                            class="col-md-5 pe-xl-0 d-flex align-items-center mb-4 mb-md-0"
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
                        <div class="col-md-5 text-center text-md-start">
                            <div
                                class="dropdown ms-auto ms-lg-0 position-relative drop-d"
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
                                                src="{{cloudUrl(auth()->user()->photo_profile)}}"
                                                alt=""
                                            />
                                        </span>

                                        {{auth()->user()->name}}
                                    </div>
                                </button>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton1"
                                >
                                    <li>
                                        <a class="dropdown-item" href="{{url('profile')}}"
                                            >الملف الشخصي</a
                                        >
                                    </li>
                                    <li>
                                    </li>
                                </ul>
                            </div>


                        </div>

                        <div class="col-md-2 text-center text-md-start">
                            <form action="{{route('web.logout')}}" method="post" id="logout-form">
                                @csrf
                            </form>
                            <button type="submit" form="logout-form" class="btn btn-sm btn-info"
                            >تسجيل خروج
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="requsts-sec mt-4 outside ">
        <div class="pc-container">
            <div class="pcoded-content" style="    font-size: 14px;">
                <!-- [ Main Content ] start -->
                <div class="row w-100 mx-0 px-0 ">

                    @yield('content')
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </section>
    @include('front.layout.scripts')
</body>

</html>
