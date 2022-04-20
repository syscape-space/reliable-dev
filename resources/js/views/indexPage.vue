<template>
    
    <!-- Header -->
    <header>
      <div class="container mt-2 pb-5">
        <div class="main-lan pt-2 text-start">
          <button class="px-2 py-1">ع/E</button>
        </div>
        <div class="logo mt-4 d-flex align-items-center ">
          <div class="mt-3 pt-5">
            <a href="#">
              <img :src="base_url+'assets/images/images/logo.svg'" alt="" srcset="" />
            </a>
            <p class="pt-3 f-300" style="font-size: 14px; color: #606572">
              منصة موثوق هي منصة سعودية تعمل في مجال البحث وتوفير المحامين<br />
              المعتمدين والمرخصين وضمان التعاقد بين الاطراف والحقوق الماليه الخاصة
              <br />
              بهم بشكل آمن ومضمون
            </p>
            <div
              class="line"
              style="
                background-color: #048e81;
                border-radius: 4px;
                width: 340px;
                height: 4px;
              "
            >
            </div>
          </div>

          <div id="carouselExampleIndicators" class="mx-auto carousel slide" data-bs-ride="carousel" style="max-width: 400px;">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="bg-white active" aria-current="true" aria-label="Slide 1">
                <img :src="base_url+'assets/images/images/a-1.svg'" alt="">
              </button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-white" aria-label="Slide 1">
                <img :src="base_url+'assets/images/images/a-2.svg'" alt="">
              </button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-white" aria-label="Slide 1">
                <img :src="base_url+'assets/images/images/a-3.svg'" alt="">
              </button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="bg-white" aria-label="Slide 1">
                <img :src="base_url+'assets/images/images/a-4.svg'" alt="">
              </button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" class="bg-white" aria-label="Slide 1">
                <img :src="base_url+'assets/images/images/a-5.svg'" alt="">
              </button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" class="bg-white" aria-label="Slide 1">
                <img :src="base_url+'assets/images/images/a-6.svg'" alt="">
              </button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" class="bg-white" aria-label="Slide 1">
                <img :src="base_url+'assets/images/images/a-7.svg'" alt="">
              </button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div>
                  <div class="d-flex align-items-center mb-1">
                    <span class="metr">
                      <img :src="base_url+'assets/images/images/a-1.png'" alt="">
                    </span>
                    <h6 style=" color: #0091ea;font-size: 16px;">البحث عن محامي</h6>
                  </div>
                  <p class="mb-0" style="font-size: 12px; color: #606572;">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث</p>
                </div>
              </div>
              <div class="carousel-item ">
                <div>
                  <div class="d-flex align-items-center mb-1">
                    <span class="metr">
                      <img :src="base_url+'assets/images/images/a-2.png'" alt="">
                    </span>
                    <h6 style=" color: #0091ea;font-size: 16px;">البحث عن محامي</h6>
                  </div>
                  <p class="mb-0" style="font-size: 12px; color: #606572;">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث</p>
                </div>
              </div>
              <div class="carousel-item ">
                <div>
                  <div class="d-flex align-items-center mb-1">
                    <span class="metr">
                      <img :src="base_url+'assets/images/images/a-3.png'" alt="">
                    </span>
                    <h6 style=" color: #0091ea;font-size: 16px;">البحث عن محامي</h6>
                  </div>
                  <p class="mb-0" style="font-size: 12px; color: #606572;">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث</p>
                </div>
              </div>
              <div class="carousel-item ">
                <div>
                  <div class="d-flex align-items-center mb-1">
                    <span class="metr">
                      <img :src="base_url+'assets/images/images/a-4.png'" alt="">
                    </span>
                    <h6 style=" color: #0091ea;font-size: 16px;">البحث عن محامي</h6>
                  </div>
                  <p class="mb-0" style="font-size: 12px; color: #606572;">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث</p>
                </div>
              </div>
              <div class="carousel-item ">
                <div>
                  <div class="d-flex align-items-center mb-1">
                    <span class="metr">
                      <img :src="base_url+'assets/images/images/a-5.png'" alt="">
                    </span>
                    <h6 style=" color: #0091ea;font-size: 16px;">البحث عن محامي</h6>
                  </div>
                  <p class="mb-0" style="font-size: 12px; color: #606572;">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث</p>
                </div>
              </div>
              <div class="carousel-item ">
                <div>
                  <div class="d-flex align-items-center mb-1">
                    <span class="metr">
                      <img :src="base_url+'assets/images/images/a-6.png'" alt="">
                    </span>
                    <h6 style=" color: #0091ea;font-size: 16px;">البحث عن محامي</h6>
                  </div>
                  <p class="mb-0" style="font-size: 12px; color: #606572;">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث</p>
                </div>
              </div>
              <div class="carousel-item ">
                <div>
                  <div class="d-flex align-items-center mb-1">
                    <span class="metr">
                      <img :src="base_url+'assets/images/images/a-7.png'" alt="">
                    </span>
                    <h6 style=" color: #0091ea;font-size: 16px;">البحث عن محامي</h6>
                  </div>
                  <p class="mb-0" style="font-size: 12px; color: #606572;">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث</p>
                </div>
              </div>
            </div>
            <button class="bg-transparent border-0 carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="bg-transparent border-0 carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="container login">
          <div class="content-login d-md-flex justify-content-between pt-4">
            <div class=" d-flex align-items-start">
              <div class="register ms-3">
                <a href="#"> التسجيل </a>
              </div>
              <div class="register ms-3 log-in mx-3">
                <a href="#"> الدخول </a>
              </div>
            </div>

            <div class="about-us mt-5">
              <div class="sum-btn">
                <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">الاسئلة</button>
                <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">المدونة</button>
                <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">خدماتنا</button>
                <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">ما يميزنا</button>
                <a href="#" class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal"> من نحن </a>
              </div>
              <img
                class="about-img"
                :src="base_url+'assets/images/images/img-links.png'"
                alt=""
                srcset=""
              />
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="align-items: flex-start;">
          <img class="mx-5" style="opacity: .2; width: 82px; margin-top: 42px;" :src="base_url+'assets/images/images/single-logo.svg'" alt="">
          <div>
            <div class="modal-header border-0">
              <h5 class="modal-title" id="exampleModalLabel" style="font-size: 39px; color: #048e81; font-weight: 300;">من نحن</h5>
              <button type="button" class="btn-close me-auto ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
              <p style="font-size: 19px; color: #606572; font-weight: 300;">
                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.
                              هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.
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
            <span
              style="font-size: 30px; color: #048e81; font-weight: 300"
              class="mb-2 d-block"
              >رحلة الطلب</span
            >
            <form class="form-trip" action="" style="color: #606572">
              <span class="text-center d-inline-block">
                <input
                  type="radio"
                  class="d-inline-block"
                  id="html"
                  name="fav_language"
                  value="HTML"
                />
                <br />
                <span>محامى</span>
              </span>
              <span class="text-center d-inline-block">
                <input
                  type="radio"
                  class="d-inline-block"
                  id="html"
                  name="fav_language"
                  value="HTML"
                />
                <br />
                <span>محكم</span>
              </span>
              <span class="text-center d-inline-block">
                <input
                  type="radio"
                  class="d-inline-block"
                  id="html"
                  name="fav_language"
                  value="HTML"
                />
                <br />
                <span>عميل</span>
              </span>
            </form>
          </div>
        </div>
        <div class="text-center">
          <img class="ital" :src="base_url+'assets/images/images/italic.svg'" alt="" />
        </div>
        <div style="max-width: 967px; margin: 23px auto;" class="position-relative">
          <img class="abs-img h-100" :src="base_url+'assets/images/images/dots.svg'" alt="">
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
              <img class="d-inline-block mt-3 share-btns" style="width: 52px;cursor: pointer;" :src="base_url+'assets/images/images/share.svg'" alt="">
              <div class="btns-icons-ff">
                <span><i class="fab fa-facebook-square"></i></span>
                <span> <i class="fab  fa-linkedin"></i> </span>
                <span> <i class="fab  fa-twitter-square"></i></span>
                <span> <i class="fas fa-envelope"></i> </span>
              </div>
            </div>
          </div>
         <div class="mb-5 rr " id="create">
          <div class="d-inline-block mgmg">
            <div class="d-flex align-items-center mb-2">
              <h4 class="my-0" style="white-space: nowrap;">
                <span style="color: #0491e8">1.</span> انشاء الطلب
              </h4>
              <img class="dots-blue mx-1" :src="base_url+'assets/images/images/doted.svg'" alt="" />
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
                  <span
                    ><i
                      style="font-size: 9px; color: #0491e8"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #0491e8"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #0491e8"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
              </div>
            </div>
          </div>
         </div>
         <div class="mb-5 ll">
          <div class="mgmg d-inline-block float-start" style="direction: ltr;">
            <div class="d-flex align-items-center mb-2">
              <h4 class="my-0" style="white-space: nowrap;">
                طريقة العرض <span style="color: #0491e8">.2</span>
              </h4>
              <img class="dots-blue mx-1" :src="base_url+'assets/images/images/doted.svg'" alt="" />
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
                  <span
                    ><i
                      style="font-size: 9px; color: #0491e8"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #0491e8"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #0491e8"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
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
              <img class="dots-blue mx-1" :src="base_url+'assets/images/images/doted.svg'" alt="" />
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
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
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
              <img class="dots-blue mx-1" :src="base_url+'assets/images/images/doted.svg'" alt="" />
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
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
              </div>
            </div>
          </div>
         </div>
         <div class="clearfix"></div>
         <div class="mb-5 rr gr" >
          <div class="d-inline-block mgmg">
            <div class="d-flex align-items-center mb-2 w-100">
              <h4 class="my-0" style="white-space: nowrap;">
                <span style="color: #048E81">5.</span> اختيار المحكم
              </h4>
              <img class="dots-blue mx-1" :src="base_url+'assets/images/images/doted.svg'" alt="" />
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
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
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
              <img class="dots-blue mx-1" :src="base_url+'assets/images/images/doted.svg'" alt="" />
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
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
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
              <img class="dots-blue mx-1" :src="base_url+'assets/images/images/doted.svg'" alt="" />
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
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
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
              <img class="dots-blue mx-1" :src="base_url+'assets/images/images/doted.svg'" alt="" />
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
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
                  <span>علي مدار 24 ساعه علي 7 ايام</span>
                </div>
                <div class="mb-2">
                  <span
                    ><i
                      style="font-size: 9px; color: #048E81"
                      class="fas mx-2 fa-circle"
                    ></i
                  ></span>
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
    <footer style="background-color: #DAE9F3;" class="py-5">
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
            <img :src="base_url+'assets/images/images/logo.svg'" alt=""></div>
          </div>
        </div>
      </div>
    </footer>
    <!-- <HomeHeader/> -->
        <!-- <SearchServiceSection/>
        <HowItWork/>
        <Features/>
        <ServiceProduction/>
        <NewJobs/>
        <MawthoqServices/>
        <ServiceExplain/>
        <OrdersStages/>
        <MawthoqPartners/>
        <MawthoqApp/>
    <LayoutFooter/> -->
</template>
<script>

import Navbar from '../components/partials/LayoutNavBar.vue'
import HomeHeader from '../components/partials/home/HomeHeader.vue'
import SearchServiceSection from '../components/partials/home/SearchServiceSection.vue'
import HowItWork from '../components/partials/home/HowItWork.vue'
import Features from '../components/partials/home/Features.vue'
import ServiceProduction from '../components/partials/home/ServiceProduction.vue'
import NewJobs from '../components/partials/home/NewJobs.vue'
import MawthoqServices from '../components/partials/home/MawthoqSevices.vue'
import ServiceExplain from '../components/partials/home/ServiceExplain.vue'
import OrdersStages from '../components/partials/home/OrdersStages.vue'
import MawthoqPartners from '../components/partials/home/MawthoqPartners.vue'
import MawthoqApp from '../components/partials/home/MawthoqApp.vue'
import LayoutFooter from '../components/partials/LayoutFooter.vue'
import $ from "jquery";
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle';
export default {
    data(){
      return{
        base_url:base_url
      };
    },
    components :{
        Navbar , 
        HomeHeader , 
        SearchServiceSection , 
        HowItWork , 
        Features , 
        ServiceProduction , 
        NewJobs ,
        MawthoqServices , 
        ServiceExplain ,
        OrdersStages ,
        MawthoqPartners ,
        MawthoqApp ,
        LayoutFooter
        },
        mounted(){
            if( localStorage.getItem("token") === "" ){
                this.$router.push({ name: "Login" });
            }
            this.clickBTN()
        },
        methods: {
            clickBTN() {
                $(document).on('click','.share-btns', function() {
                    $('.btns-icons-ff').toggleClass('auto-cc')
                })
            }
        }
}
</script>

<style >
/*
* Bootstrap v5.x
*/
/* *** Global ***/
a:hover {
  text-decoration: none;
}

body {
  text-align: right;
  direction: rtl;
  font-family: "din-next";
}
button:focus,
.btn:focus,
.btn:focus,
input:focus,
select:focus {
  outline: none !important;
  box-shadow: none !important;
}
.btn:hover,
.btn:hover,
select:hover {
  cursor: pointer;
}

/* ------------------------------------------------------------------------------------------------
-------------------------------------- header -----------------------------------------------------
------------------------------------------------------------------------------------------------ */

body {
  background-color: #ecf8ff;
}

.main-lan button {
  border: solid 1px #048e81;
  border-radius: 4px;
  background: transparent;
  color: #0491e8;
}

.register a {
  color: #048e81;
  font-size: 30px;
  font-weight: 300;
  text-decoration: none;
  border-bottom: solid 2px #048e81;
  
}
.log-in a {
  color: #0491e8;
  border-bottom: solid 2px #0491e8;
}
.trip-reqeust h3 {
  color: #048e81;
  font-size: 25px;
  font-weight: 600;
}

.form-trip input {
  margin: 0 8px;
  width: 40px;
  height: 40px;
  border: 1px solid #ddd !important;
  box-shadow: none;
  outline: 0;
  border-radius: 50%;
}
.trip-reqeust ul li {
  font-size: 16px;
}
.about-us {
  position: relative;
}
.sum-btn button {
  padding: 10px;
  width: 100px;
  border: 0;
  height: 100px;
  background-color: transparent;
  border-radius: 50%;
  color: #048e81;
  font-size: 14px;
  background-size: contain;
}

header > .container {

  background-size: 455px;
  background-repeat: no-repeat;
  background-position: center 20%;
}

.about-us .sum-btn button:nth-child(1) {
  position: absolute;
  top: 80%;
  right: -29%;
}
.about-us .sum-btn button:nth-child(2) {
  position: absolute;
  top: 42%;
  right: -30%;
}
.about-us .sum-btn button:nth-child(3) {
  position: absolute;
  top: 15%;
  right: -13%;
}
.about-us .sum-btn button:nth-child(4) {
  position: absolute;
  top: -5%;
  right: 20%;
}
.about-us .sum-btn a {
  position: absolute;
  top: -12%;
  right: 68%;
  border: 0;
  box-shadow: none;
  background: none;
  color: #048e81;
  font-size: 16px;
  text-decoration: none;
  top: -9%;
  right: 75%;

}
.about-us .sum-btn a:hover {
  top: -12%;
  border-bottom: solid 2px #048e81;
  border-radius: 0;
  padding: 0px;
  font-weight: 500;
  color: #0491e8;
  text-decoration: none;
  display: inline-block;
  min-width: 85px;
  text-align: center;
  padding-bottom: 3px;
  font-size: 25px;
  right: 70%;
}
.ital {
  width: 72px;
  margin: auto;
  margin-top: 12px;
  margin-left: 40px;
}
.abs-img {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  width: 20px;
  top: -7px;
}
.trip-reqeust {
  margin-top: -350px;
}
/* ------------------------------------------------------------------------------------------------
------------------ End Header ----------------------------------------------------------------------
------------------------------------------------------------------------------------------------ */

/* ------------------------------------------------------------------------------------------------
------------------  [ Footer ] --------------------------------------------------------------------
------------------------------------------------------------------------------------------------ */

.bg-light-color {
  background-color: #1387a2;
}
.last-footer {
  background-color: #1387a2;
  color: #fff;
  padding: 8px 15px;
  display: flex;
  justify-content: space-between;
  margin-bottom: -2px;
}
.about-img {
  width: 275px;
}
.dots-blue {
  margin-top: 8px;
  flex-grow: 1;
  width: 100%;
  height: 1px;
}
.more-btn {
  background-color: #ccecff;
  border: 1px solid #0491e8;
  color: #0491e8;
  padding: 9px 27px;
  font-size: 16px;
  border-radius: 6px;
  margin-top: 10px;
  height: 47px;
  display: flex;
  justify-content: center;
}
.gr .more-btn {
  color: #048e81;
  border-color: #048e81;
  background-color: #CEECE9;
}
.draw-w {
  background-color: #f9f9f9;
  padding: 13px;
  width: 200px;
  margin-top: 20px;
  border-radius: 10px;
  font-weight: 300 !important;
  color: #4e5567;
  font-size: 22px;
}
.mgmg {
  width: 47%;
  overflow: hidden;
}
@media (max-width: 575.98px) {
  .last-footer {
    display: block;
    text-align: center;
  }
  .last-footer div {
    margin-bottom: 10px;
  }
}

/* ------------------------------------------------------------------------------------------------
------------------  [ End Footer ] ----------------------------------------------------------------
------------------------------------------------------------------------------------------------ */
.f-18 {
  font-size: 18px;
}
/* // Extra small devices (portrait phones, less than 576px) */
@media (max-width: 575.98px) {
}

/* // Small devices (landscape phones, 576px and up) */
@media (max-width: 767.98px) {
  .about-us {
    display: none;
  }
  .about-us .sum-btn button:nth-child(1) {
    position: absolute;
    top: 73%;
    right: -47%;
  }
  .about-us .sum-btn button:nth-child(2) {
    position: absolute;
    top: 39%;
    right: -39%;
  }
  .about-us .sum-btn button:nth-child(3) {
    position: absolute;
    top: 5%;
    right: -24%;
  }
  .about-us .sum-btn button:nth-child(4) {
    position: absolute;
    top: -17%;
    right: 20%;
  }
  .about-img {
    width: 167px;
  }
  .trip-reqeust {
    margin-top: 0;
  }
  .mgmg {
    width: 100%;
    overflow: hidden;
    font-size: 12px;
  }
  .abs-img {
    display: none;
  }
  .draw-w {
    background-color: #f9f9f9;
    padding: 13px;
    width: 141px;
    margin-top: 20px;
    border-radius: 10px;
    font-weight: 300 !important;
    color: #4e5567;
    font-size: 14px;
  }
  .ital {
    width: 40px;
    margin: auto;
    margin-top: 12px;
    margin-left: 0;
  }
}

/* // Medium devices (tablets, 768px and up) */
@media (min-width: 768px) and (max-width: 991.98px) {
  .about-us .sum-btn button:nth-child(1) {
    position: absolute;
    top: 73%;
    right: -47%;
  }
  .about-us .sum-btn button:nth-child(2) {
    position: absolute;
    top: 39%;
    right: -39%;
  }
  .about-us .sum-btn button:nth-child(3) {
    position: absolute;
    top: 5%;
    right: -24%;
  }
  .about-us .sum-btn button:nth-child(4) {
    position: absolute;
    top: -17%;
    right: 20%;
  }
  .about-img {
    width: 167px;
  }
  .draw-w {
    background-color: #f9f9f9;
    padding: 13px;
    width: 160px;
    margin-top: 20px;
    border-radius: 10px;
    font-weight: 300 !important;
    color: #4e5567;
    font-size: 14px;
  }
  .mgmg {
    width: 47%;
    overflow: hidden;
    font-size: 12px;
  }
  .trip-reqeust {
    margin-top: -90px;
  }
  .sum-btn button {
    padding: 10px;
    width: 80px;
    border: 0;
    height: 81px;
    background-color: transparent;
    border-radius: 50%;
    color: #048e81;
    font-size: 12px;
    background-size: contain;
  }
  .more-btn {
    background-color: #ccecff;
    border: 1px solid #0491e8;
    color: #0491e8;
    padding: 5px 27px;
    font-size: 14px;
    border-radius: 6px;
    margin-top: 10px;
    height: 40px;
    display: flex;
    justify-content: center;
  }
  .about-us .sum-btn a {
    position: absolute;
    top: -16.5%;
    right: 68%;
    border: 0;
    box-shadow: none;
    background: none;
    border-bottom: solid 1px #048e81;
    border-radius: 0;
    padding: 0px;
    font-weight: 500;
    color: #0491e8;
    text-decoration: none;
    display: inline-block;
    min-width: 85px;
    text-align: center;
    padding-bottom: 3px;
    font-size: 25px;
  }
}
.btns-bb {
  display: inline-block;
  position: sticky;
  top: 50%;
  margin-right: -117px;
  transform: translateY(-50%);
}
@media (max-width: 991px)
{
  .btns-bb {
    display: none;
  }
}
/* // Large devices (desktops, 992px and up) */
@media (min-width: 992px) and (max-width: 1199.98px) {
  .btns-bb {
    margin-right: -17px;
  }
  .about-img {
    width: 254px;
  }
  .draw-w {
    background-color: #f9f9f9;
    padding: 13px;
    width: 167px;
    margin-top: 20px;
    border-radius: 10px;
    font-weight: 300 !important;
    color: #4e5567;
    font-size: 16px;
  }
  .mgmg {
    width: 47%;
    overflow: hidden;
    font-size: 14px;
  }
}

/* // Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {
}
@media (min-width: 576px) {
  .modal-dialog {
    max-width: 1148px;
    margin: 1.75rem auto;
  }
}
.modal-content {
  background-color: #ecf8ff;
  flex-direction: row;
}

@media (min-width: 576px) {
  .modal-dialog {
    max-width: 1148px;
    margin: 1.75rem auto;
  }
}
.modal-content {
  background-color: #ecf8ff;
  flex-direction: row;
}

.btns-icons-ff > span {
background-color: #fff;
    border-radius: 8px;
    padding: 0px 10px;
    display: inline-flex;
    height: 39px;
    align-items: center;
    margin: 0 5px;
}
.btns-icons-ff {
  position: absolute;
  top: 23px;
  right: 59px;
  white-space: nowrap;
  font-size: 20px;
  color: #028e80;
  overflow: hidden;
  width: 0;
}
.auto-cc {
  width: auto;
}

@media (max-width: 576px) {
  .btns-bb {
    display: none;
  }
}
.li-color {
  width: 52px;
  background-color: #fbfdff;
  border-radius: 16px;
  padding: 17px 10px;
}
.li-color a {
  color: #048e81;
  transition: 0.2s all ease-in-out;
}
.li-color a:hover {
  color: #0491e8;
}
.li-color .active a {
  color: #0491e8;
}
.li-color a span {
  display: none;
}
.li-color span {
  position: absolute;
  left: -44px;
  opacity: 0;
}
.li-color .active span {
  color: #0091ea;
  opacity: 1;
}
.li-color li:hover span {
  color: #0091ea;
  opacity: 1;
}
.carousel-indicators button {
  border: 1px solid #ddd !important;
  border-radius: 50% !important;
  height: 40px !important;
  width: 40px !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  margin: 5px !important;
  opacity: 1 !important;
}
.carousel-indicators img {
  width: 20px;
}
.carousel-item {
  border-radius: 10px;
  padding: 10px;
  background-color: #ddf1fc;
  border: 1px solid #0091ea;
}
.carousel-indicators {
  bottom: -81px !important;
      margin-right: 0% !important;
    margin-left: 0% !important;
}
.metr {
  padding: 6px;
  background-image: linear-gradient(45deg, #048e81, #0491e8);
  border-radius: 5px;
  margin-left: 10px;
}
.metr img {
  filter: drop-shadow(1px 1px 0px #fff);
  width: 24px;
}

.carousel-control-next-icon,
.carousel-control-prev-icon {
  width: 20px !important;
  height: 20px !important;
}
.carousel-control-next {
  right: -45px !important;
}
.carousel-control-prev {
  left: -45px !important;
}
.carousel-control-next, .carousel-control-prev {
  opacity: 1;
}
body {
    background-color: #ecf8ff !important;
}
.li-color li {
    text-align: center;
}
</style>