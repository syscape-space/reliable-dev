<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" href="./webProject/icofont/css/icofont.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
    <title>موثوق</title>
</head>

<body>
    <!-- Header -->
    <!-- Header -->
    <header>
        <div class="container mt-2 pb-5">
            <div
                class="main-lan flex-wrap pt-2 text-start d-flex align-items-center justify-content-center justify-content-md-between">
                <div class="group-btn d-flex align-items-center gap-5">
                    <a href="" class="btn btn-we"> من نحن</a>
                    <a href="" class="btn btn-advantages">ما يميزنا </a>
                </div>
                <div class=" group-login  d-flex align-items-center gap-4">
                    @if (!auth()->check())
                        <div class="group-btn flex-wrap d-flex align-items-center gap-4">
                            <a href="{{ route('login') }}" class="btn btn-login">تسجيل الدخول</a>
                            <a href="{{ route('register') }}" class="btn btn-sign">انشاء حساب</a>
                        </div>
                    @endif

                    <button class="lng px-2 py-1">ع/E</button>
                </div>
            </div>
            <div class="logo mt-4 d-flex align-items-center ">
                <div class="mt-3 pt-5">
                    <a href="#">
                        <img src="{{ asset('images/logo.svg') }}" alt="" srcset="" />
                    </a>
                    <p class="pt-4 " style="font-size: 16px; color: #606572;line-height: 2;
              ">
                        منصة موثوق هي منصة سعودية تعمل في مجال البحث وتوفير المحامين<br />
                        المعتمدين والمرخصين وضمان التعاقد بين الاطراف والحقوق الماليه الخاصة
                        <br />
                        بهم بشكل آمن ومضمون
                    </p>
                    <div class="line" style="
                  background-color: #048e81;
                  border-radius: 4px;
                  max-width: 425px;
                  height: 4px;
                ">
                    </div>
                </div>


            </div>
            <div class="container login">
                <div class="content-login d-md-flex justify-content-center justify-content-xl-between pt-4">
                  
                    <div class=" d-flex gap-3 justify-content-center flex-wrap align-items-start">
                        <div class="box">
                            <h5 class="title mb-4">الاستشارات الصوتية</h5>
                            <p class="mb-2">هل تفكر في حجز استشارة صوتية ؟؟</p>
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            <a href="" class="btn">طلب استشارة فورية</a>
                        </div>
                            <div class="box">
                                <h5 class="title mb-4"> طلب جديد</h5>
                                <p class="mb-2"> هل تفكر في انشاء طلب جديد ؟؟</p>
                                <i class="fa-solid fa-file-pen"></i> <a href="" class="btn">انشاء طلب جديد
                                </a>
                            </div>

                    </div>

                    <div class="about-us mt-5">
                        <div class="sum-btn">
                            <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="icon">
                                    <i class="fa-solid fa-file-circle-plus"></i>
                                </div>
                                <p>اضافة عقد</p>
                            </button>
                            <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="icon">
                                    <i class="fa-solid fa-note-sticky"></i>
                                </div>
                                <p> المذكرات القانونية</p>
                            </button>
                            <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="icon">
                                    <i class="fa-solid fa-file-signature"></i>
                                </div>
                                <p> خدمات العقود</p>
                            </button>
                            <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="icon">
                                    <i class="fa-solid fa-building-columns"></i>
                                </div>
                                <p> المطالبات المالية</p>
                            </button>
                            <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="icon">
                                    <i class="fa-solid fa-scale-balanced"></i>
                                </div>
                                <p> القضايا</p>
                            </button>
                            <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="icon">
                                    <i class="fa-solid fa-comment-dots"></i>
                                </div>
                                <p> استشارة قانونية</p>
                            </button>
                            <button class="about-btn-1 active" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="icon">
                                    <i class="fa-solid fa-user-large"></i>
                                </div>
                                <p> البحث عن محامي</p>
                            </button>
                            <img class="about-img" src="{{ asset('images/brand.png') }}" alt="" srcset="" />
                        </div>
                    </div>
                </div>
            </div>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="align-items: flex-start;">
                <img class="mx-5" style="opacity: .2; width: 82px; margin-top: 42px;"
                    src="{{ asset('images/single-logo.svg') }}" alt="">
                <div>
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="exampleModalLabel"
                            style="font-size: 39px; color: #048e81; font-weight: 300;">من نحن</h5>
                        <button type="button" class="btn-close me-auto ms-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <p style="font-size: 19px; color: #606572; font-weight: 300;">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                            العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                            التى يولدها التطبيق.
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،
                            النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                            الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                            ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد
                            النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه
                            التصميم فيظهر بشكل لا يليق.
                            هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير
                            منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                            العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                            التى يولدها التطبيق.
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،
                            النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                            الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                            ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد
                            النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه
                            التصميم فيظهر بشكل لا يليق.
                            هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير
                            منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section style="color: #4e5567">
        <div class="container">
            <div class="trip-reqeust text-center d-flex align-items-end">
                <div class="mx-auto">
                    <span style="font-size: 30px; color: #048e81; font-weight: 300" class="mb-2 d-block">رحلة
                        الطلب</span>
                    <form class="form-trip" action="" style="color: #606572">
                        <span class="text-center d-inline-block">
                            <input type="radio" class="d-inline-block" id="html" name="fav_language" value="HTML" />
                            <br />
                            <span>محامى</span>
                        </span>
                        <span class="text-center d-inline-block">
                            <input type="radio" class="d-inline-block" id="html" name="fav_language" value="HTML" />
                            <br />
                            <span>محكم</span>
                        </span>
                        <span class="text-center d-inline-block">
                            <input type="radio" class="d-inline-block" id="html" name="fav_language" value="HTML" />
                            <br />
                            <span>عميل</span>
                        </span>
                    </form>
                </div>
            </div>
            <div class="text-center">
                <img class="ital" src="{{ asset('images/italic.svg') }}" alt="" />
            </div>
            <div style="max-width: 967px; margin: 23px auto;" class="position-relative">
                <img class="abs-img h-100" src="{{ asset('images/dots.svg') }}" alt="">
                <div class="btns-bb">
                    <div class="d-flex align">

                        <div class="">
                            <ul class="list-unstyled px-0 m-0 text-center li-color">
                                <li class="position-relative  active mb-2">
                                    <a href="#create" class="">
                                        <i style="font-size: 12px; " class="fas mx-2 fa-circle"></i>
                                    </a>
                                    <span>إنشاء</span>
                                </li>
                                <li class="position-relative mb-2">
                                    <a href="#create2"><i style="font-size: 12px; " class="fas mx-2 fa-circle"></i></a>
                                    <span>تحكيم</span>

                                </li>
                                <li class="position-relative ">
                                    <a href="#create3"><i style="font-size: 12px; " class="fas mx-2 fa-circle"></i></a>
                                    <span>إستلام</span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img class="d-inline-block mt-3 share-btns" style="width: 52px;cursor: pointer;"
                            src="{{ asset('images./img') }}" alt="">
                        <div class="btns-icons-ff">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span> <i class="fab  fa-linkedin"></i> </span>
                            <span> <i class="fab  fa-twitter-square"></i></span>
                            <span> <i class="fas fa-envelope"></i> </span>
                        </div>
                    </div>
                </div>
                <div class="mb-5 rr " id="create">
                    <di class="d-inline-block mgmg">
                        <div class="d-flex align-items-center mb-2">
                            <h4 class="my-0" style="white-space: nowrap;">
                                <span style="color: #0491e8">1.</span> انشاء الطلب
                            </h4>
                            <img class="dots-blue mx-1" src="{{ asset('images/doted.svg') }}" alt="" />
                        </div>
                        <div>
                            <button class="more-btn">مزيد من التفاصيل</button>
                        </div>
                        <div class="d-flex  align-items-center ">
                            <div class="d-inline-block draw-w text-center">
                                <div>الرسمه هنا</div>
                                <div class="mt-3">
                                    عميل يقوم بتسجيل الطلب الكترونيا عن الاب توب او التابلت
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #0491e8"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #0491e8"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #0491e8"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                            </div>
                        </div>
                    </di w-100v>
                </div>
                <div class="mb-5 ll">
                    <div class="mgmg d-inline-block float-start" style="direction: ltr;">
                        <div class="d-flex align-items-center mb-2">
                            <h4 class="my-0" style="white-space: nowrap;">
                                طريقة العرض <span style="color: #0491e8">.2</span>
                            </h4>
                            <img class="dots-blue mx-1" src="{{ asset('images/doted.svg') }}" alt="" />
                        </div>
                        <div>
                            <button class="more-btn">مزيد من التفاصيل</button>
                        </div>
                        <div class="d-flex  align-items-center ">
                            <div class="d-inline-block draw-w text-center">
                                <div>الرسمه هنا</div>
                                <div class="mt-3">
                                    عميل يقوم بتسجيل الطلب الكترونيا عن الاب توب او التابلت
                                </div>
                            </div>
                            <div class="mx-3" style="    direction: rtl;">
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #0491e8"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #0491e8"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #0491e8"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="mb-5 rr gr" id="create2">
                    <div class="d-inline-block mgmg">
                        <div class="d-flex align-items-center mb-2 w-100 overflow-hidden">
                            <h4 class="my-0" style="white-space: nowrap;">
                                <span style="color: #048E81">3.</span> اختيار الانسب
                            </h4>
                            <img class="dots-blue mx-1" src="{{ asset('images/doted.svg') }}" alt="" />
                        </div>
                        <div>
                            <button class="more-btn level-two">مزيد من التفاصيل</button>
                        </div>
                        <div class="d-flex  align-items-center ">
                            <div class="d-inline-block draw-w text-center">
                                <div>الرسمه هنا</div>
                                <div class="mt-3">
                                    عميل يقوم بتسجيل الطلب الكترونيا عن الاب توب او التابلت
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 ll gr">
                    <div class="d-inline-block mgmg float-start" style="direction: ltr;">
                        <div class="d-flex align-items-center mb-2">
                            <h4 class="my-0" style="white-space: nowrap;">
                                تحديد حجم العمل والقيمة <span style="color: #048E81">.4</span>
                            </h4>
                            <img class="dots-blue mx-1" src="{{ asset('images/doted.svg') }}" alt="" />
                        </div>
                        <div>
                            <button class="more-btn level-two">مزيد من التفاصيل</button>
                        </div>
                        <div class="d-flex  align-items-center ">
                            <div class="d-inline-block draw-w text-center">
                                <div>الرسمه هنا</div>
                                <div class="mt-3">
                                    عميل يقوم بتسجيل الطلب الكترونيا عن الاب توب او التابلت
                                </div>
                            </div>
                            <div class="mx-3" style="    direction: rtl;">
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="mb-5 rr gr">
                    <div class="d-inline-block mgmg">
                        <div class="d-flex align-items-center mb-2 w-100">
                            <h4 class="my-0" style="white-space: nowrap;">
                                <span style="color: #048E81">5.</span> اختيار المحكم
                            </h4>
                            <img class="dots-blue mx-1" src="{{ asset('images/doted.svg') }}" alt="" />
                        </div>
                        <div>
                            <button class="more-btn level-two">مزيد من التفاصيل</button>
                        </div>
                        <div class="d-flex  align-items-center ">
                            <div class="d-inline-block draw-w text-center">
                                <div>الرسمه هنا</div>
                                <div class="mt-3">
                                    عميل يقوم بتسجيل الطلب الكترونيا عن الاب توب او التابلت
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 ll gr">
                    <div class="mgmg d-inline-block float-start" style="direction: ltr;">
                        <div class="d-flex align-items-center mb-2">
                            <h4 class="my-0" style="white-space: nowrap;">
                                انشاء العقد<span style="color: #048E81">.6</span>
                            </h4>
                            <img class="dots-blue mx-1" src="{{ asset('images/doted.svg') }}" alt="" />
                        </div>
                        <div>
                            <button class="more-btn level-three">مزيد من التفاصيل</button>
                        </div>
                        <div class="d-flex  align-items-center ">
                            <div class="d-inline-block draw-w text-center">
                                <div>الرسمه هنا</div>
                                <div class="mt-3">
                                    عميل يقوم بتسجيل الطلب الكترونيا عن الاب توب او التابلت
                                </div>
                            </div>
                            <div class="mx-3" style="    direction: rtl;">
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="mb-5 rr gr" id="create3">
                    <div class="d-inline-block mgmg">
                        <div class="d-flex align-items-center mb-2 w-100">
                            <h4 class="my-0" style="white-space: nowrap;">
                                <span style="color: #048E81">7.</span> الدفع
                            </h4>
                            <img class="dots-blue mx-1" src="{{ asset('images/doted.svg') }}" alt="" />
                        </div>
                        <div>
                            <button class="more-btn level-three">مزيد من التفاصيل</button>
                        </div>
                        <div class="d-flex  align-items-center ">
                            <div class="d-inline-block draw-w text-center">
                                <div>الرسمه هنا</div>
                                <div class="mt-3">
                                    عميل يقوم بتسجيل الطلب الكترونيا عن الاب توب او التابلت
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 ll gr">
                    <div class="mgmg d-inline-block float-start" style="direction: ltr;">
                        <div class="d-flex align-items-center mb-2">
                            <h4 class="my-0" style="white-space: nowrap;">
                                التسليم<span style="color: #048E81">.8</span>
                            </h4>
                            <img class="dots-blue mx-1" src="{{ asset('images/doted.svg') }}" alt="" />
                        </div>
                        <div>
                            <button class="more-btn level-three">مزيد من التفاصيل</button>
                        </div>
                        <div class="d-flex  align-items-center ">
                            <div class="d-inline-block draw-w text-center">
                                <div>الرسمه هنا</div>
                                <div class="mt-3">
                                    عميل يقوم بتسجيل الطلب الكترونيا عن الاب توب او التابلت
                                </div>
                            </div>
                            <div class="mx-3" style="    direction: rtl;">
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                                <div class="mb-2">
                                    <span><i style="font-size: 9px; color: #048E81"
                                            class="fas mx-2 fa-circle"></i></span>
                                    <span>علي مدار 24 ساعه علي 7 ايام</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>

    </section>
    <div class="clearfix">

    </div>
    <!-- Header -->
    <footer style="background-color: #DAE9F3;" class="footer-one">
        <div class="container">
            <div class="row w-100 mx-0 px-0">
                <div class="col-lg-3">
                    <div style="color: #048E81;" class="f-18">تواصل اجتماعى</div>

                </div>
                <div class="col-lg-3">
                    <div style="color: #048E81;" class="f-18">المدونة</div>
                    <div class="mt-2">
                        <span><i style="font-size: 9px; color: #048E81" class="fas mx-2 fa-circle"></i></span>
                        <span>نص رقم واحد</span>
                    </div>
                    <div class="mt-2">
                        <span><i style="font-size: 9px; color: #048E81" class="fas mx-2 fa-circle"></i></span>
                        <span>نص رقم واحد</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div style="color: #048E81;" class="f-18">روابط سريعة</div>
                    <div class="mt-2">
                        <span><i style="font-size: 9px; color: #048E81" class="fas mx-2 fa-circle"></i></span>
                        <span>نص رقم واحد</span>
                    </div>
                    <div class="mt-2">
                        <span><i style="font-size: 9px; color: #048E81" class="fas mx-2 fa-circle"></i></span>
                        <span>نص رقم واحد</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div style="color: #048E81;" class="f-18">
                        <img src="{{ asset('images/logo.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="footer-two">
        <div class="container">
            <a href="">الشروط والأحكام</a>
            <a href=""> سياسة الاستخدام</a>

            <a href=""> سياسة الخصوصية</a>
        </div>

    </footer>
    <div class="scrll-supp mt-5">
        <a href="" class="support me-0">
            الدعم
            <i class="fa-solid fa-comments"></i>
        </a>
    </div>
    <!-- =============================================================================================================
  ================================ [End Footer ] ===================================================================
  ============================================================================================================== -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
