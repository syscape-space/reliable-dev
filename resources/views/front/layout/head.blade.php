<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" />
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
<link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="{{asset('tem_assets')}}/css/normalize.css" />

<link rel="stylesheet" href="{{asset('tem_assets')}}/css/bootstrap.min.css" />
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('tem_assets')}}/css/all.min.css" />
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('tem_assets/css/style.css')}}" />
<!-- Bootstrap -->

<!-- Main Faile Css  -->
<style>
    @font-face {
  font-family: "din-next";
  src: url("../fonts/din-next-lt-w23-light-1.ttf");
  font-weight: 300;
}
.f-300 {
  font-weight: 300;
}
@font-face {
  font-family: "din-next";
  src: url("../fonts/din-next-lt-w23-regular.ttf");
  font-weight: normal;
}
@font-face {
  font-family: "din-next";
  src: url("../fonts/din-next-lt-w23-bold-1.ttf");
  font-weight: bold;
}
</style>
@stack('page_styles')
    
@livewireStyles

<title>@yield('title')</title>
