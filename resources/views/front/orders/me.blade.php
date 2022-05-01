@extends('front.layout.index')
@section('content')
    <section class="veiw-judge bg-brand pt-4 pb-5">
        <div class="brand-img">
            <img src="./img/brand.png" alt=""/>
        </div>
        <div class="container">
            <div class="row">
                @include('front.user.profile._user_sidebar')
                <div class="col-xl-9">
                    <div
                            class="d-flex flex-wrap col-12 mb-4 d-flex align-items-center justify-content-center justify-content-xl-end"
                    >
                        <div
                                class="options mb-4 col-12 d-flex flex-wrap align-items-start justify-content-center justify-content-xl-between gap-3"
                        >
                            <div
                                    class="d-flex gap-4 flex-wrap justify-content-center align-items-center"
                            >
                                <a href="{{url()->current()}}" class="option "
                                >كل الطلبات</a
                                >
                                <a href="{{url()->current()}}?status=ongoing" class="option"
                                >طلبات تحت التنفيذ
                                </a>
                                <a href="#" class="option ">
                                    عرض علي المحكم</a
                                >
                                <a href="{{url()->current()}}?status=done" class="option active">
                                    الطلبات المنتهية</a
                                >
                                <div class="consultation-dates">
                                    مواعيد جلسات الاستشارة
                                </div>
                            </div>

                        </div>
                        <div
                                class="group-filtar col-12 flex-wrap d-flex align-items-center gap-4"
                        >
                            <a class="box " href="{{url('orders')}}">
                                احدث الطلبات <i class="fa-solid fa-filter"></i>
                            </a>
                            <a class="box" href="#">
                                الطلبات المفضلة <i class="fa-solid fa-filter"></i>
                            </a>
{{--                            <div class="box">--}}
{{--                                التخصص <i class="fa-solid fa-filter"></i>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <section class="orders ">
                        <div class="boxes d-flex flex-column gap-3">
                            @forelse($orders as $order)
                                <x-order.card :order="$order"/>
                            @empty
                                <h2>لا يوجد طلبات</h2>
                            @endforelse
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
