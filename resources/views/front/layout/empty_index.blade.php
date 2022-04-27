<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
    {{--     <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" /> --}}
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}"/>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>

    {{--     <link rel="stylesheet" href="./fonts/font-awsome-pro/css/pro.min.css"> --}}
    {{--     <link rel="stylesheet" href="./fonts/feather.css"> --}}
    {{--     <link rel="stylesheet" href="./fonts/fontawesome.css"> --}}

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    @stack('page_styles')

    @livewireStyles
    <style>
        body {
            margin: 0;
            font-family: Droid Arabic Kufi;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #293240;
            background-color: #f0f2f8;
        }
    </style>
    <title>title</title>
</head>

<body class="position-relative">

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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
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
@stack('page_scripts')
@livewireScripts

</body>

</html>
