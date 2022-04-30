@extends('front.layout.index')
@section('title')
    {{$order->order_title}}
@endsection
@section('content')
    <section class="offers overflow-hidden pt-3 pb-5">
        <div class="container">
            @if(! $order->accessOpen())
                <x-order.access-card :order="$order"/>
            @else
                <div
                        class="col-12 back mb-5 flex-wrap gap-5 d-flex align-items-center justify-content-between"
                >
                    <div
                            class="link-sections flex-wrap d-flex align-items-center gap-4"
                    >
                        الرئيسية / المشاريع 
                        {{$order->department->parent->department_name_ar ?? ""}}
                        /
                        {{$order->department->department_name_ar ?? ""}}
                    </div>
                    @if($order->isActiveUser() and $order->order_step == 1)
                        <a href="" class="icon-back"> اغلاق المشروع </a>
                    @endif
                </div>
                <div class="level-and-status">
                    <div class="row">
                        <div class="col-xl-3">
                            <div
                                    class="status-parent text-center text-xl-end py-3"
                            >
                                <div class="status-child">
                                    حالة المشروع:
                                    <span class="open status">{{__('admin.'.$order->order_status)}}</span>
                                </div>
                                <div class="order-number">
                                    طلب رقم:
                                    <span>{{ $order->id}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <ul class="level">
                                <li class="{{$order->order_step >= 1?"active":""}}">
                                    <div class="icon">
                                        <i class="fa-regular fa-handshake"></i>
                                    </div>
                                    الأطلاع وتقديم العروض
                                </li>
                                <li class="{{$order->order_step >= 2?"active":""}}">
                                    <div class="icon">
                                        <i class="fa-regular fa-handshake"></i>
                                    </div>
                                    التنفيذ
                                </li>
                                <li class="{{$order->order_step >= 3?"active":""}}">
                                    <div class="icon">
                                        <i class="fa-regular fa-handshake"></i>
                                    </div>
                                    الاستلام
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="boxes d-flex flex-column mb-5 gap-5">
                    <x-order.card :order="$order"/>
                </div>
                @yield('order-page')
            @endif
        </div>
    </section>
@endsection
