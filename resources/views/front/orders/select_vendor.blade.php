
@extends('front.layout.index')
@section('content')
<!-- Start Section Orders-->
<header class="fix hid">
    <div class="container">
        <div
            class="box-search fix row d-flex align-items-center justify-content-between"
        >
            <div class="col-xl-8 d-flex align-items-center gap-3">
                <form class="flex-fill" action="">
                    <div class="box-inpt position-relative">
                        <input
                            type="search"
                            placeholder="أبحث بالأسم....."
                            name="search-offers"
                            
                        />
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
                        تحديد كل المحامين
                    </div>
                    <div class="icon">!</div>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="fix sc">
    <div class="container">
        <div
            class="box-search fix row d-flex align-items-center justify-content-between"
        >
            <div class="col-xl-8 d-flex align-items-center gap-3">
                <form class="flex-fill" action="">
                    <div class="box-inpt position-relative">
                        <input
                            type="search"
                            placeholder="أبحث بالأسم....."
                            name="search-offers"
                            
                        />
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
                        تحديد كل المحامين
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
    <form action="{{ route('front.orders.select-vendors.update', $Order->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="container">
            <div class="boxes-offers d-flex flex-wrap">
                
                @foreach ($vendors as $user)
                    <div class="box-offer">
                        <div class="d-flex flex-wrap box-child align-items-center justify-content-between" >
                            <input type="checkbox" name="vendors[]" value="{{$user->id}}" class="check" @if (in_array($user->id, $order_vendors)) checked @endif />
                            <div class="info">
                                <p class="name">{{$user->name}}</p>
                                <p class="specialty">
                                    <span class="color">محامي:</span>
                                    جميع الحالات
                                </p>
                                <p class="license-number">
                                    <span class="color">رخصة برقم:</span>
                                    @if ($user->licenses->count() > 0)
                                    {{$user->licenses[0]->license_name}}
                                    @endif
                                   
                                </p>
                                <p class="duration">
                                    <span class="color">عدد العقود المنفذة:</span>
                                    {{$user->orders_count}}
                                </p>
                                <p class="price">
                                    <span class="color">مكان العمل:</span>
                                    جميع المدن
                                </p>
                            </div>
                            <div class="photo text-center">
                                <div class="img-cont">
                                    <img
                                        class="img-fluid"
                                        src="{{asset('tem_assets')}}/img/person.jpg"
                                        alt=""
                                    />
                                </div>
                                <div class="star">
                                    {{$user->rate_overall}}
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <a href="" class="profile">تصفح الملف الشخصي</a>
                    </div>
                @endforeach
                
            </div>
        </div>
        <div class="box-sub">
            <div class="container">
                <input class="inp-sub" type="submit" value="تم" />
            </div>
        </div>
    </form>
</section>
@endsection