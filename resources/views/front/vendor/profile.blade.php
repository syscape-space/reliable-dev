@extends('front.layout.index')
@push('page_styles')

@endpush
@section('content')

<section class="web py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 back my-5 d-flex align-items-center justify-content-xl-end justify-content-center">
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
                            <div
                                class="d-flex justify-content-center align-items-center"
                            >
                            <div class="photo">
                            <div class="container-img">
                                <img
                                    src="{{asset('cloud/')}}/{{ $user->photo_profile }}"
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
                            <p class="job">{{ optional($user->mainDepartment)->department_name_ar }} - {{ optional($user->subDepartment)->department_name_ar }}</p>
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
                                <li data-content="about-me">
                                    <a href="">نبذه عني</a>
                                </li>
                                <li data-content="licenses">
                                    <a href="">التراخيص</a>
                                </li>
                                <li data-content="executed-contracts">
                                    <a href="">عقود منفذة</a>
                                </li>
                                <li data-content="audio-consulting">
                                    <a href="">الاستشارات الصوتية</a>
                                </li>
                                <li data-content="qualifications">
                                    <a href=""
                                        >المؤهلات والدورات التدريبية</a
                                    >
                                </li>
                                <li data-content="specialization">
                                    <a href="">التخصص</a>
                                </li>
                                <li data-content="my-articles">
                                    <a href="">مقالاتي</a>
                                </li>
                                <li
                                    class="active"
                                    data-content="performance-stats"
                                >
                                    <a href="">احصائيات الاداء</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Start about-me -->
                <div class="about-me main-content pt-5">
                    <h1 class="title mb-4">نبذة عني</h1>
                    <p>
                        {{ $user->bio }}
                    </p>
                    {{-- <div class="photo">
                        <img src="{{asset('cloud/')}}/{{ $user->photo_profile }}" alt="" />
                    </div> --}}
                </div>
                <!-- End about-me -->
                <!-- Start licenses -->
                <div class="licenses main-content pt-5">
                    <h1 class="title mb-4">التراخيص</h1>
                    <p>
                        لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا
                        يسكينج أليايت,سيت دو أيوسمود تيمبور
                        أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
                        يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير
                        سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا
                        كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن
                        ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم
                        دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور
                        ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت
                        ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي
                        ايست لابوريوم.
                    </p>
                    <div class="photo">
                        <img src="{{asset('assets')}}/img/photo" alt="" />
                    </div>
                </div>
                <!-- End licenses -->
                <!-- Start executed-contracts -->
                <div class="executed-contracts main-content pt-5">
                    <h1 class="title mb-4">عقو منفذة</h1>
                    <p>
                        لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا
                        يسكينج أليايت,سيت دو أيوسمود تيمبور
                        أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
                        يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير
                        سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا
                        كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن
                        ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم
                        دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور
                        ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت
                        ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي
                        ايست لابوريوم.
                    </p>
                    <div class="photo">
                        <img src="{{asset('assets')}}/img/photo" alt="" />
                    </div>
                </div>
                <!-- End executed-contracts -->
                <!-- Start audio-consulting -->
                <div class="audio-consulting main-content pt-5">
                    <h1 class="title mb-4">الاستشارات الصوتية</h1>
                    <p>
                        لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا
                        يسكينج أليايت,سيت دو أيوسمود تيمبور
                        أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
                        يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير
                        سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا
                        كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن
                        ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم
                        دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور
                        ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت
                        ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي
                        ايست لابوريوم.
                    </p>
                    <div class="photo">
                        <img src="{{asset('assets')}}/img/photo" alt="" />
                    </div>
                </div>
                <!-- End audio-consulting -->
                <!-- Start qualifications -->
                <div class="qualifications main-content pt-5">
                    <h1 class="title mb-4">
                        المؤهلات والدورات التدريبية
                    </h1>
                    <p>
                        لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا
                        يسكينج أليايت,سيت دو أيوسمود تيمبور
                        أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
                        يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير
                        سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا
                        كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن
                        ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم
                        دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور
                        ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت
                        ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي
                        ايست لابوريوم.
                    </p>
                    <div class="photo">
                        <img src="{{asset('assets')}}/img/photo" alt="" />
                    </div>
                </div>
                <!-- End qualifications -->
                <!-- Start specialization -->
                <div class="specialization main-content pt-5">
                    <h1 class="title mb-4">التخصص</h1>
                    <p>
                        @foreach ($user->specialties as $specialty)
                        {{ $specialty->specialty_name_ar }} <br>
                        @endforeach
                    </p>
                    
                </div>
                <!-- End specialization -->
                <!-- Start my-articles -->
                <div class="my-articles main-content pt-5">
                    <h1 class="title mb-4">مقالاتي</h1>
                    <p>
                        لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا
                        يسكينج أليايت,سيت دو أيوسمود تيمبور
                        أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
                        يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير
                        سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا
                        كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن
                        ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم
                        دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور
                        ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت
                        ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي
                        ايست لابوريوم.
                    </p>
                    <div class="photo">
                        <img src="{{asset('assets')}}/img/photo" alt="" />
                    </div>
                </div>
                <!-- End my-articles -->
                <!-- Start performance stats -->
                <div class="performance-stats main-content pt-5">
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
                        <p class="num-contracts">(25) عقد منفذ</p>
                    </div>
                </div>
                <!-- End performance stats -->
            </div>
        </div>
    </div>
</section>

@endsection

@push('page_scripts')



    <script src="{{asset('assets')}}/js/all.min.js"></script>
    <script src="{{asset('assets')}}/js/web.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>
@endpush

