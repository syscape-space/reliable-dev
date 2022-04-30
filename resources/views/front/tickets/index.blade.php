@extends('front.layout.index')
@section('title')
    التذاكر
@endsection
@section('content')
    <section class="tickets py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 back mb-5 d-flex align-items-center justify-content-end">
                    <div class="row w-100 justify-content-end">
                        <div class="col-xl-9 d-flex align-items-center justify-content-between">
                            <h4>تذاكري</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 r-bar text-center text-xl-end ps-xl-5">
                    <div class="row parent-boxes">
                        <div class="col-md-6 col-xl-12 mb-5">
                            <div class="box box-info">
                                <div class="photo">
                                    <img class="img-fluid" src="./img/person.jpg" alt="" />
                                </div>
                                <h4>محمد مصطفي</h4>
                                <p>عميل أفراد</p>
                                <img src="./img/done.svg" alt="" />
                                <!-- <i class="fa-solid fa-circle-check"></i> -->
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-12 mb-5">
                            <div class="box box-welcome">
                                <h6>مرحبا مجددا محمد</h6>
                                <p>
                                    حسابك مكتمل بنسبة
                                    <span class="count">80%</span>
                                </p>
                                <div class="progress prog">
                                    <div class="progress-bar prog-bar" role="progressbar" style="width: 80%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <a href="" class="btn">أكمل بيانات حسابك</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-12 mb-5">
                            <div class="box box-package">
                                <i class="fa-solid fa-ribbon"></i>
                                <h6>الباقة الفضية</h6>
                                <p>
                                    ينتهي اشتراكك في
                                    <span class="deta">4/15/2022</span>
                                </p>
                                <p>متبقي علي انتهاء اشتراكك</p>
                                <p>10 أيام</p>
                                <div class="progress prog">
                                    <div class="progress-bar prog-bar" role="progressbar" style="width: 80%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <a href="" class="btn">أكمل بيانات حسابك</a>
                            </div>
                        </div>
                        <div class="col-12 col-xl-12 mb-5">
                            <a href="" class="support">
                                الدعم
                                <i class="fa-solid fa-comments"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                        <div class="m-auto m-md-0 count-tickets">
                            <div class="logo">
                                <img class="img-fluid" src="./img/logo.png" alt="" />
                                <div class="text-logo">
                                    <h6>موثوق Reliable</h6>
                                    <p>صنتاع الثقة Trust Makers</p>
                                </div>
                            </div>
                            <div class="count">لديك {{auth()->user()->tickets->count()}} تذكرة</div>
                        </div>
                        <a href="{{route('front.tickets.create')}}" class="new-ticket m-auto m-md-0 btn">
                            تذكرة جديدة
                        </a>
                    </div>
                    <div class="all-tickets d-flex flex-column gap-3">
                        @foreach ($tickets as $ticket)
                            
                        <div class="ticket">
                            <div class="date">
                                <i class="fa-regular fa-clock"></i>
                                {{$ticket->created_at->diffForHumans()}}
                            </div>
                            <p class="text">
                                {{$ticket->ticket_content}}
                            </p>
                            <div class="status {{$ticket->ticket_status=='opened'?'open':'close'}}">{{$ticket->ticket_status=='opened'?'تذكرة مفتوحة':'تذكرة مغلقة'}}</div>
                        </div>
                        @endforeach
                        {{$tickets->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
