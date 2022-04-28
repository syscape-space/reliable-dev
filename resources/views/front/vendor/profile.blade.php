@extends('front.layout.index')
@section('content')
    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>{{ $error }}</strong>
                </div>
            @endforeach
        </div>
    @endif
    <section class="web py-5">
        <div class="container">
            <div class="row">
                <div
                    class="col-12 back my-5 d-flex align-items-center justify-content-xl-end justify-content-center"
                >
                    <div class="row w-100 justify-content-end">
                        <div
                            class="col-xl-8 d-flex align-items-center justify-content-xl-end justify-content-center gap-4 flex-wrap"
                        >
                            <a href="" class="btn">تقديم طلب</a>
                            <img src="{{asset('assets')}}/img/Group-logo.png" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 r-bar text-center text-xl-end ps-xl-5">
                    <div class="row parent-boxes">
                        <div class="col-xl-12 mb-5">
                            <div class="info text-center">
                                <div class="d-flex align-items-center">
                                    <div class="photo">
                                        <div class="container-img">
                                            <img
                                                src="{{asset('assets')}}/img/person.jpg"
                                                alt=""
                                            />
                                        </div>
                                        <img
                                            class="icon"
                                            src="{{asset('assets')}}/img/done.svg"
                                            alt=""
                                        />
                                    </div>
                                    <div class="text">
                                        <p class="name">{{ $user->name }}</p>
                                        <p class="job">محامي - تجاري</p>
                                        <p class="city">{{ optional($user->city)->name }}</p>
                                        <p class="last-seen">
                                            اخر تواجد: {{date('Y-m-d', strtotime($user->last_seen))}} الساعة:
                                            {{ date('h:i A', strtotime($user->last_seen)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="sidebar">
                                <ul>
                                    <li><a href="">نبذه عني</a></li>
                                    <li><a href="">التراخيص</a></li>
                                    <li><a href="">عقود منفذة</a></li>
                                    <li>
                                        <a href="">الاستشارات الصوتية</a>
                                    </li>
                                    <li>
                                        <a href=""
                                            >المؤهلات والدورات التدريبية</a
                                        >
                                    </li>
                                    <li><a href="">التخصص</a></li>
                                    <li><a href="">مقالاتي</a></li>
                                    <li class="active">
                                        <a href="">احصائيات الاداء</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="performance-stats pt-5">
                        <h1 class="title mb-5">احصائيات الاداء</h1>
                        <div class="mb-5">
                            <p class="mb-2">تقييمات المنفذ</p>
                            <div class="d-flex align-items-center gap-2">
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                (5)
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="mb-2">معدل تنفيذ العقود</p>
                            <div class="execution-rate progress" dir="ltr">
                                <div
                                    class="progress-bar fw-normal"
                                    role="progressbar"
                                    style="width: 90%"
                                    aria-valuenow="90"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                >
                                    90%
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="mb-2">متوسط سرعة الرد</p>
                            <div class="response-speed progress" dir="ltr">
                                <div
                                    class="progress-bar fw-normal"
                                    role="progressbar"
                                    style="width: 100%"
                                    aria-valuenow="100"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                >
                                    5 دقايق
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="mb-2">عدد العقود</p>
                            <p class="num-contracts">({25}) عقد منفذ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page_scripts')

<script src="{{asset('assets')}}/js/web.js"></script>


@endpush

