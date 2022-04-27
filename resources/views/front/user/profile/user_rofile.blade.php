<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    />
    <link rel="stylesheet" href="{{asset('tem_assets')}}/webProject/icofont/css/icofont.min.css" />
    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/style.css" />
    <title>title</title>
  </head>

  <body style="background: #fff ">
    <!-- Header -->

   
    <!-- client page -->

    <section class="  pt-5">
      <div class="container">
        <div class="row" style="color: #333333;">
          <div class="col-lg-3 col-xl-2 px-2 px-xl-1">
            <div class="client-page">
              <div class="card-client text-center rounded mb-2 pb-4">
                <div class="client-img">
                  <img style="width: 76px; height: 70px; border-radius: 50%; margin-bottom: 5px; margin-top: 10px;" src="https://cdn.landesa.org/wp-content/uploads/default-user-image.png" alt="" srcset="">
                </div>
                <h5>{{ $user->name }}</h5>
                <p class="">
                    {{$user->membership_type}}
                </p>
                <div class="protection">
                  <img src="{{asset('tem_assets')}}/images/protection.svg" alt="" srcset="">
                </div>
              </div>
              <div class="card-client text-center rounded mb-2 py-3">
                <p class="  "> الرصيد الكلى: <span class="me-2 f-300 " style=" color: #0491e8 ;"> {{$user->current_balance}} $ </span> </p>
                <p class="  "> يمكن سحبة : <span class="me-2 f-300 " style=" color: #0491e8 ;"> {{ $user->current_balance - $user->suspended_balance}} $ </span> </p>
                <button class="show-balance">عرض رصيدى</button>
              </div>

              <div class="card-client text-end rounded  p-3 mb-2 pb-4">  
                <h6 class="  ">مرحبا مجددا محمد </h6>
                <p style="font-size: 13px;" >حسابك مكتمل بنسبة 80%</p>
                <div class="percent-line w-100 rounded mb-4" style="height: 8px; ;background-color: #ddd;">
                  <div class="w-75 rounded" style="height: 8px;background-color: #028e80  ;"></div>
                </div>
                <div class="text-center">
                  <button class="show-balance">أكمل بيانات حسابى</button>
                </div>
              </div>
              <div class="card-client text-center rounded px-3 py-2 mb-2 ">
                
                <h6 class="  "><img class="ms-2" src="{{asset('tem_assets')}}/images/pkg.svg" alt="" srcset="">{{$user->current_subscription->package->package_title}}</h6>
                <p class="  my-2 text-end " style="font-size: 13px;" >   ينتهى اشتراكك فى {{$user->current_subscription->package->package_end_at}}  </p>
                <p class=" text-end " style="font-size: 13px;">متبقى على انتهاء اشتراكك</p>
                <div class="text-end">
                    @php
                        $package_end_at = \Carbon\Carbon::createFromDate($user->current_subscription->package->package_end_at);
                        $Remaining = $package_end_at->diffInDays(\Carbon\Carbon::now());
                    @endphp
                  <span  style="color: #E33232 "> {{$Remaining}} ايام </span>
                </div>
                <div class="percent-line w-100 rounded mt-3 mb-4" style="height: 8px; ;background-color: #ddd;">
                  <div class="w-75 rounded" style="height: 8px;background-color: #E33232  ;"></div>
                </div>
                <div class="text-center ">
                  <button class="show-balance">حدث اشتراكك</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-xl-10">
            <div class="row">
              <div class="col-lg-12 col-md-12 ">
                <button class="end-sub w-100 border-0 rounded "> تم انتهاء اشتراكك  </button>
              </div>
              <div class="col-lg-12 col-md-12 ">
                <div class="mt-5 row w-100 mx-0 px-0">
                  <div class="col-md-4 col-lg-3">
                    <div class="card-client  rounded  p-3">
                      <p class="  m-0" style=" color: #0491e8 ">مرحبا مجددا محمد </p>
                      <p class="f-12" style="font-size: 12px;">  هل تفكر فى إنشاء طلب جديد؟؟ </p>
                      <div class="text-center">
                        <img class="ms-3" style="width: 40px;" src="{{asset('tem_assets')}}/images/think.svg" alt="" srcset="">
                      </div>
                      <div class="text-center">
                        <a href="{{ route('orders.create') }}" class="show-balance mt-3 border-0" style="background-color: #028e80;" > إنشاء طلب جديد </a>
                      </div>
                    </div>
                  </div>
                <div class="col-md-8 col-lg-8 col-xl-7  mt-md-0 mt-5">
                  <div class="contain-btn  d-flex justify-content-between flex-wrap">
                    <div class=" mb-3 active-log" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="bg-white active" aria-current="true" aria-label="Slide 1">
                        <img src="{{asset('tem_assets')}}/images/a-1.svg" alt="">
                      </button>
                      <h6> البحث عن محامى </h6>
                    </div>
                    <div class=" mb-3" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-white" aria-label="Slide 1">
                        <img src="{{asset('tem_assets')}}/images/a-2.svg" alt="">
                      </button>
                      <h6> استشارة قانونية </h6>
                    </div>
                    <div class=" mb-3" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-white" aria-label="Slide 1">
                        <img src="{{asset('tem_assets')}}/images/a-3.svg" alt="">
                      </button>
                      <h6> القضايا </h6>
                    </div>
                    <div class=" mb-3" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="bg-white" aria-label="Slide 1">
                        <img src="{{asset('tem_assets')}}/images/a-4.svg" alt="">
                      </button>
                      <h6>المطالبات المالية  </h6>
                    </div>
                    <div class=" mb-3" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" class="bg-white" aria-label="Slide 1">
                        <img src="{{asset('tem_assets')}}/images/a-5.svg" alt="">
                      </button>
                      <h6> خدمات العقود </h6>
                    </div>
                    <div class=" mb-3" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" class="bg-white" aria-label="Slide 1">
                        <img src="{{asset('tem_assets')}}/images/a-6.svg" alt="">
                      </button>
                      <h6> المذكرات القانونية </h6>
                    </div>
                    <div class=" mb-3" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" class="bg-white" aria-label="Slide 1">
                        <img src="{{asset('tem_assets')}}/images/a-7.svg" alt="">
                      </button>
                      <h6> إضافة عقد </h6>
                    </div>
                  </div>
                </div>

                </div>
              </div>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="new-order my-5 pt-2">
                      <div class="title-order d-flex align-items-center mb-2">
                        <img src="{{asset('tem_assets')}}/images/order.svg" alt="" srcset="">
                        <h6 class="mx-3 mb-0">طلبات جديدة</h6>
                        <img style="width: 18px;" src="{{asset('tem_assets')}}/images/question.svg" alt="" srcset="">
                      </div>
                      <div class="content-order ">
                        <div class="row w-100 mx-0 py-2 px-3">
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">15</div>
                                <div class="text-order">اضافة عقد</div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">22</div>
                                <div class="text-order">طلبات محفوظة</div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">13</div>
                                <div class="text-order">تحت المراجعة</div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">19</div>
                                <div class="text-order">بانتظار المراجعة</div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      

                      </div>
                    </div>
                  <div class="col-lg-6">
                    <div class="new-order my-5 pt-2">
                      <div class="title-order d-flex align-items-center mb-2">
                        <img src="{{asset('tem_assets')}}/images/offer_order.svg" alt="" srcset="">
                        <h6 class="mx-3 mb-0">الطلبات المعروضة</h6>
                        <img style="width: 18px;" src="{{asset('tem_assets')}}/images/question.svg" alt="" srcset="">
                      </div>
                      <div class="content-order ">
                        <div class="row w-100 mx-0 py-2 px-3">
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">15</div>
                                <div class="text-order">متاح للعرض</div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">22</div>
                                <div class="text-order">للتفاوض </div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">13</div>
                                <div class="text-order">معلق للاتفاق</div>
                              </div>
                              
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      

                      </div>
                    </div>
                  <div class="col-lg-6">
                    <div class="new-order my-2">
                      <div class="title-order d-flex align-items-center mb-2">
                        <img src="{{asset('tem_assets')}}/images/shake-hands.svg" alt="" srcset="">
                        <h6 class="mx-3 mb-0">تحت التنفيذ</h6>
                        <img style="width: 18px;" src="{{asset('tem_assets')}}/images/question.svg" alt="" srcset="">
                      </div>
                      <div class="content-order ">
                        <div class="row w-100 mx-0 py-2 px-3">
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">15</div>
                                <div class="text-order">جارى تنفيذة</div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">22</div>
                                <div class="text-order">تم تنفيذة</div>
                              </div>
                              
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      

                      </div>
                    </div>
                  <div class="col-lg-6">
                    <div class="new-order my-2">
                      <div class="title-order d-flex align-items-center mb-2">
                        <img src="{{asset('tem_assets')}}/images/end_order.svg" alt="" srcset="">
                        <h6 class="mx-3 mb-0">الطلبات المنتهية</h6>
                        <img style="width: 18px;" src="{{asset('tem_assets')}}/images/question.svg" alt="" srcset="">
                      </div>
                      <div class="content-order ">
                        <div class="row w-100 mx-0 py-2 px-3">
                          <div class="col-md-5  p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">15</div>
                                <div class="text-order">المقفلة</div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-7 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">15</div>
                                <div class="text-order"> المعترض عليهها (تحكيم)</div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-7 p-1 ">
                            <div class=" w-100 p-2 mt-2 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">13</div>
                                <div class="text-order">الملغاة</div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      

                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4  new-new">
                  <div class="content-login text-start   justify-content-start pt-4">
                    <div class="about-us mt-5">
                      <div class="sum-btn">
                        
                        <button 
                         class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">خدماتنا</button>
                        <button 
                         class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">طلباتي</button>
                        <a href="#" class="new-order-btn new-2  " data-bs-toggle="modal" data-bs-target="#exampleModal"> طلب جديد </a>
                      </div>
                      <img
                        class="about-img"
                        src="{{asset('tem_assets')}}/images/basma.svg"
                        alt=""
                        srcset=""
                      />
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- client page -->


    <!-- =============================================================================================================
  ================================ [End Footer ] ===================================================================
  ============================================================================================================== -->
    <script src="{{asset('tem_assets')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('tem_assets')}}/js/popper.min.js"></script>
    <script src="{{asset('tem_assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('tem_assets')}}/js/main.js"></script>
  </body>
</html>
