<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
{{--     <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" /> --}}
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css' />

{{--     <link rel="stylesheet" href="./fonts/font-awsome-pro/css/pro.min.css"> --}}
{{--     <link rel="stylesheet" href="./fonts/feather.css"> --}}
    {{--     <link rel="stylesheet" href="./fonts/fontawesome.css"> --}}

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    @stack('page_styles')

    @livewireStyles
    <style>
      
    </style>
    <title>title</title>
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
                                    <a class="dropdown-item" href="#"
                                        >تعديل الملف الشخصي</a
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


    <!-- ============================================================================================================
  ================================ [End Footer ] ==================================================================
  ============================================================================================================= -->
  <script src="{{asset('assets/js/all.min.js')}}"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        window.addEventListener('alert', ({
            detail: {
                type,
                message
            }
        }) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
        @if(session()->has('success'))
            Toast.fire({
                icon: "success",
                title: "{{session('success')}}"
            })
        @endif
    </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            sendRequest();
            function sendRequest(){
                $.ajax({
                    url: "{{route('front.ajax.last-seen')}}",
                    success: 
                    function(data){
                        console.log('done')
                    
                    },
                    complete: function() {
                        // Schedule the next request when the current one's complete
                        setInterval(sendRequest, 45000); // The interval set to 5 seconds
                    }
                });
            };
        });
    </script>
    @stack('page_scripts')
    @livewireScripts

</body>

</html>
