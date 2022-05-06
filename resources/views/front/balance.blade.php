@extends('front.layout.index')
@section('title')
    الرصيد
@endsection
@section('content')
    <section class="balance tickets py-5">
        <div class="container">
            <div class="row w-100 mx-0 px-0">
                @include('front.user.profile._user_sidebar')
                <div class="col-lg-9 col-xl-10">
                    <div class="col-12 back mb-5 d-flex align-items-center justify-content-end">
                        <div class="row w-100 justify-content-end">
                            <div class="col-xl-9 d-flex align-items-center justify-content-between">
                                <h4>رصيد حسابك</h4>
                                <a href="" class="icon-back">
                                    <i class="fas fa-arrow-left-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 r-bar text-center text-xl-end ps-xl-5">
                        <div class="row parent-boxes">



                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="balance-info">
                            <div class="row">
                                <div class="col-xl-3  col-lg-6 my-3 my-xxl-0">
                                    <div class="balance-card">
                                        <h3>الرصيد القابل للسحب</h3>
                                        <p>{{ auth()->user()->current_balance - auth()->user()->suspended_balance }} $</p>
                                        <i class="fa-solid fa-hand-holding-dollar"></i>
                                    </div>
                                </div>
                                <div class="col-xl-3  col-lg-6 my-3 my-xxl-0">
                                    <div class="balance-card">
                                        <h3>الرصيد الملعق</h3>
                                        <p>{{ auth()->user()->suspended_balance }} $</p>
                                        <i class="fa-solid fa-sack-dollar"></i>
                                    </div>
                                </div>
                                <div class="col-xl-3  col-lg-6 my-3 my-xxl-0">
                                    <div class="balance-card">
                                        <h3>الرصيد المتاح</h3>
                                        <p>{{ auth()->user()->current_balance - auth()->user()->suspended_balance }} $</p>
                                        <i class="fa-solid fa-money-bills"></i>
                                    </div>
                                </div>
                                <div class="col-xl-3  col-lg-6 my-3 my-xxl-0">
                                    <div class="balance-card">
                                        <h3>الرصيد الكلي</h3>
                                        <p>{{ auth()->user()->current_balance }} $</p>
                                        <i class="fa-solid fa-coins"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all-tickets mb-5 d-flex flex-column gap-3">
                            <div class="title mb-1 d-flex align-items-center justify-content-between">
                                <h4>حساب فواتيرك</h4>
                                <a href="">مشاهدة كل فواتيري</a>
                            </div>
                            <div class="ticket">
                                <div class="count">39976 $</div>
                                <p>
                                    تم شحن رصيدك بنجاح بتاريخ 2022-04-15 عن طريق
                                    تحويل بنكي
                                </p>
                            </div>
                            <div class="ticket">
                                <div class="count">39976 $</div>
                                <p>
                                    تم شحن رصيدك بنجاح بتاريخ 2022-04-15 عن طريق
                                    تحويل بنكي
                                </p>
                            </div>
                            <div class="ticket">
                                <div class="count">39976 $</div>
                                <p>
                                    تم شحن رصيدك بنجاح بتاريخ 2022-04-15 عن طريق
                                    تحويل بنكي
                                </p>
                            </div>
                            <div class="ticket">
                                <div class="count">39976 $</div>
                                <p>
                                    تم شحن رصيدك بنجاح بتاريخ 2022-04-15 عن طريق
                                    تحويل بنكي
                                </p>
                            </div>
                        </div>
                        <div class="group-btn pt-5 d-flex gap-5 align-items-center justify-content-center">
                            <a href="" class="btn withdrawal">سحب رصيد</a>
                            <a href="" class="btn recharge">شحن رصيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
