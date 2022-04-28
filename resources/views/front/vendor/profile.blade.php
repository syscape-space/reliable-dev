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
                @include('front.vendor._sidebar')
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

