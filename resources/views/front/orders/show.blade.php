@include('front.layout.rightNavbar')
@include('front.layout.topNavbar')
<section class="personal-section mt-2">
    <div class="personal">
        <div class="personal-info">
            <span>{{ __('app.home') }} /
                {{ __('app.projects') }} /
                {{ __('app.main_category') }} /
                {{ __('app.sub_category') }}</span>
            <div class="row w-100 mx-0 px-0">
                <div class="col-lg-9">
                    <div class="row w-100 mx-0 px-0">
                        <div class="col-md-4 my-4" style="color: #AEAEAE;">
                            <div class="cir-prog" style="border-color: #048e81;">
                                <img src="{{ asset('assets/images/o_hand.svg') }}" alt="">
                            </div>
                            <div class="fw-bold o-num text-center" style="color: #048e81;;">
                                {{ __('app.number1') }}
                            </div>
                            <div>
                                <h6 class="o-txt text-center" style="color: #0995EB; ">
                                    التفاوض
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-4 my-4" style="color: #AEAEAE;">
                            <div class="cir-prog">
                                <img src="{{ asset('assets/images/o_exe.svg') }}" alt="">
                            </div>
                            <div class="fw-bold o-num text-center">
                                {{ __('app.number2') }}
                            </div>
                            <div>
                                <h6 class="o-txt text-center">
                                    {{ __('app.execution') }}
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-4 my-4" style="color: #AEAEAE;">
                            <div class="cir-prog">
                                <img src="{{ asset('assets/images/o_roket.svg') }}" alt="">
                            </div>
                            <div class="fw-bold o-num text-center">
                                {{ __('app.number3') }}
                            </div>
                            <div>
                                <h6 class="o-txt text-center">
                                    {{ __('app.ending') }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold g-color">{{ __('app.projectDetails') }}</h5>
                        <p style="font-size:12px">
                            {!! $order->order_content !!}
                        </p>
                    </div>
                    <div class="py-2 px-3 d-inline-block rounded f-14"
                        style="color: #2B7B74;background-color: #EBFFFD;">
                        <span class="ms-3 fw-bold">ميزانية المشروع</span>
                        <span>{{ __('app.from200To500') }}</span>
                    </div>
                    <div class="my-4 btw-flex">
                        <span>العروض التقديمية</span>
                        <span>
                            <button class="btn-offer text-white mx-2" style="background-color: #0995EB;">الاحدث</button>
                            <button class="btn-offer">{{ __('app.old') }}</button>
                        </span>
                    </div>
                    @foreach ($order->offers as $offer)
                    <div class="p-3" style="background-color: #F9F9F9;">
                        <div class="btw-flex">
                            <div class="my-2" style="font-size: 12px;">
                                <span class="ms-3">
                                    <img style="width: 15px;" class="ms-1"
                                        src="{{ asset('assets/images/o_clock.svg') }}" alt="">
                                    <span>{{$offer->created_at->diffForHumans()}}</span>
                                </span>
                                <span class="ms-3">
                                    <img style="width: 20px;" class="ms-1"
                                        src="{{ asset('assets/images/o_eye.svg') }}" alt="">
                                    <span></span>
                                </span>
                                <span class="ms-3">
                                    <img style="width: 20px;" class="ms-1"
                                        src="{{ asset('assets/images/o_offer.svg') }}" alt="">
                                    <span>{{ __('app.produce5Offers') }}</span>
                                </span>
                                <span class="ms-3">
                                    <img style="width: 14px;" class="ms-1"
                                        src="{{ asset('assets/images/o_map.svg') }}" alt="">
                                    <span>{{$offer->user->country->country_name_ar}}</span>
                                </span>
                            </div>
                            <div class="my-2" style="font-size: 12px;">
                                <span class="o-box ms-2">
                                    <img style="width: 15px;" class="ms-1"
                                        src="{{ asset('assets/images/o_delever.svg') }}" alt="">
                                    <span>{{ __('app.deliveryTime') }}:</span>
                                    <span class="me-2">{{ $offer->execution_time }}</span>
                                </span>
                                <span class="o-box o-box2">
                                    <img style="width: 15px;" class="ms-1"
                                        src="{{ asset('assets/images/o_payment.svg') }}" alt="">
                                    <span>:{{ __('app.theAmount') }}:</span>
                                    <span class="me-2">{{ $offer->price }}</span>
                                </span>
                            </div>
                        </div>
                        <div class="row w-100 mx-0 px-0">
                            <div class="col-md-3 text-center d-flex align-items-center justify-content-between"
                                style="border-left: 3px solid #ddd;">
                                <img src="{{ asset($offer->user->photo_profile) }}" alt="">
                            </div>
                            <div class="col-md-9">
                                <p class="py-3 f-12">
                                    {{$offer->vendor_comment }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="col-md-3">
                    <div>
                        <div class="bg-users f-14 p-3 text-center"
                            style="background-image: linear-gradient(to bottom, #FF584D20, #802C2710); border-radius: 8px; background-color: transparent;">
                            <h6 style="font-size: 13px;" class="">{{ __('app.projectCard') }}</h6>
                            <h6 style="font-size: 13px;">{{ __('app.main_category') }} -
                                {{ __('app.sub_category') }}</h6>
                            <ul class="list-unstyled px-0 f-12 text-end mt-4">
                                <li class="mb-3 f-12">
                                    <span>{{ __('app.projectStatus') }}</span>
                                    <button class="o_btn d-inline-block px-3 py-2 rounded"
                                        style="margin-right: 15px;">{{ __($order->order_status) }}</button>
                                </li>
                                <li class="mb-3">
                                    <span style="min-width: 60px;"
                                        class="d-inline-block">{{ __('app.publishDate') }}</span>
                                    <span style="margin-right: 15px;color: #0995EB;"
                                        class="fw-bold ">{{-- {{ __("app.ago") }} 20 {{ __("app.hours") }} --}}
                                        {{ $order->created_at }}</span>
                                </li>
                                <li class="mb-3">
                                    <span style="min-width: 60px;"
                                        class="d-inline-block">{{ __('app.executionTime') }}</span>
                                    <span style="margin-right: 15px;color: #0995EB;"
                                        class="fw-bold ">{{ __('app.day') }}
                                        {{ $order->execution_time }}</span>
                                </li>
                                <li class="mb-3">
                                    <span style="min-width: 60px;"
                                        class="d-inline-block">{{ __('app.offersNum') }}</span>
                                    <span style="margin-right: 15px;color: #0995EB;"
                                        class="fw-bold ">{{ __('app.count') }} {{ $order->offers_count }}
                                        {{ __('app.offer') }}</span>
                                </li>
                                <li class="mb-3">
                                    <span style="min-width: 60px;"
                                        class="d-inline-block">{{ __('app.projectOwner') }}</span>

                                </li>
                                <li class="mb-3 mt-4 text-center">
                                    <div class="text-center mb-2">
                                        <img style="width: 50px;height: 50px;" class="uses-img"
                                            src="{{ asset('assets/images/user.svg') }}" alt="">
                                    </div>
                                    <div class="text-center">
                                        <i class="fas fa-star yellow"></i>
                                        <i class="fas fa-star yellow"></i>
                                        <i class="fas fa-star yellow"></i>
                                        <i class="fas fa-star yellow"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-center ">{{ $order->user_id()->first()->name }}</span> <br>
                                    <span style="color: #2B7B74;"
                                        class="mb-2 d-inline-block text-center">{{ __('app.attorneyGeneral') }}
                                    </span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="div-save p-2 mt-4 ">
                        <div class="d-flex align-items-center">
                            <div>
                                <img style="width: 40px;margin-left: 8px;"
                                    src="{{ asset('assets/images/o_save.svg') }} alt="">
                  </div>
                  <div class=" text-white">
                                <img src="{{ asset('assets/images/sm-logo-w.svg') }}" alt=""> <br>
                                <span style="font-size: 10px;">
                                    <span>{{ __('app.guarantee100%') }}</span>
                                    <span
                                        style="margin-top: -3px; display: block;">{{ __('app.yourOrderAtTheSameTime') }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 mt-4 f-12" style="background-color: #E9EFEE;">
                        <span class="ms-2 fw-bold">{{ __('app.shareNow') }}</span>
                        <span>
                            <a href="" class="me-1">
                                <img style="width: 16px;" src="{{ asset('assets/images/o_face.svg') }}" alt="">
                            </a>
                            <a href="" class="me-1">
                                <img style="width: 20px;" src="{{ asset('assets/images/o_linked.svg') }}" alt="">
                            </a>
                            <a href="" class="me-1">
                                <img style="width: 20px;" src="{{ asset('assets/images/o_twitter.svg') }}" alt="">
                            </a>
                            <a href="" class="me-1">
                                <img style="width: 20px;" src="{{ asset('assets/images/o_youtube.svg') }}" alt="">
                            </a>
                            <a href="" class="me-1">
                                <img style="width: 20px;" src="{{ asset('assets/images/o_copy.svg') }}" alt="">
                            </a>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
