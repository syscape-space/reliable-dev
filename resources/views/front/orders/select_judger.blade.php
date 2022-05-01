@extends('front.layout.index')
@section('title')
    اختيار محكم
@endsection
@section('content')
    <!-- Start Section Orders-->
    <header class="fix hid">
        <div class="container">
            <div class="box-search fix row d-flex align-items-center justify-content-between">
                <div class="col-xl-8 d-flex align-items-center gap-3">
                    <form class="flex-fill" action="">
                        <div class="box-inpt position-relative">
                            <input type="search" placeholder="أبحث بالأسم....." name="search-offers" />
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </form>
                </div>
                <div class="mt-3 mt-xl-0 col-xl-4 d-flex">
                    <div class="select-search">
                        <div class="text">
                            <div class="icon">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            تحديد كل المحكمين
                        </div>
                        <div class="icon">!</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="fix sc">
        <div class="container">
            <div class="box-search fix row d-flex align-items-center justify-content-between">
                <div class="col-xl-8 d-flex align-items-center gap-3">
                    <form class="flex-fill" action="">
                        <div class="box-inpt position-relative">
                            <input type="search" placeholder="أبحث بالأسم....." name="search-offers" />
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </form>
                </div>
                <div class="mt-3 mt-xl-0 col-xl-4 d-flex">
                    <div class="select-search">
                        <div class="text">
                            <div class="icon">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            تحديد كل المحكمين
                        </div>
                        <div class="icon">
                            !
                            <div class="tol-t">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                                المساحة، لقد تم توليد هذا النص من مولد النص
                                العربی
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="select overflow-hidden pt-4">

            <div class="container">
                <div class="boxes-offers d-flex flex-wrap">

                    @foreach ($judgers as $user)
                        <div class="box-offer">
                            <div class="d-flex flex-wrap box-child align-items-center justify-content-between">

                                <div class="info">
                                    <p class="name">{{ $user->name }}</p>

                                    <p class="license-number">
                                        <span class="color">رخصة برقم:</span>
                                        @if ($user->licenses->count() > 0)
                                            {{ $user->licenses[0]->license_name }}
                                        @endif

                                    </p>
                                    <p class="duration">
                                        <span class="color">عدد العقود المنفذة:</span>
                                        {{ $user->orders_count }}
                                    </p>
                                    <p class="price">
                                        <span class="color">مكان العمل:</span>
                                        جميع المدن
                                    </p>
                                </div>
                                <div class="photo text-center">
                                    <div class="img-cont">
                                        <img class="img-fluid" src="{{ asset('tem_assets') }}/img/person.jpg"
                                            alt="" />
                                    </div>
                                    <div class="star">
                                        {{ $user->rate_overall }}
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                            <a href="{{ route('front.vendor.profile', $user->id) }}" class="profile">تصفح الملف
                                الشخصي</a>
                                <form action="{{route('front.orders.select-judger.update',$Order->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="arbitrator_id" value="{{$user->id}}" id="">
                                    <input type="hidden" name="order_id" value="{{$Order->id}}" id="">
                                    <input type="hidden" name="user_accept_decision" value="pending" id="">
                                    <button type="submit" class="btn btn-success">اختيار</button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            
        
    </section>
@endsection
