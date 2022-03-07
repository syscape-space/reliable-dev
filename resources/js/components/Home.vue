<template>
  <home-header/>
  <search-service-section/>
  <section class="mt-5 position-relative ">
    <img class="h1-it" :src="base_url+'/images/h1.png'" alt="">
    <div class="container py-5">
      <div class="row w-100 mx-0 px-0">
        <div class="col-md-6">
          <h6>كيف يعمل</h6>
          <h3 style="max-width: 500px" class="mb-5">
            قم بالاشتراك واطلب الخدمة بشكل امن وسريع مع السرية التامة
          </h3>
          <div class="d-flex mb-3 pos-rel">
            <span class="number ms-4"> 1 </span>
            <div>
              <h5 class="add-order-gr">أضف طلبك</h5>
              <p style="font-size: 12px">
                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج
                أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار
                ماجنا أليكيوا . يوت
              </p>
            </div>
          </div>
          <div class="d-flex mb-3 pos-rel">
            <span class="number ms-4"> 2 </span>
            <div>
              <h5 class="add-order-gr">أضف طلبك</h5>
              <p style="font-size: 12px">اختر العرض المناسب</p>
            </div>
          </div>
          <div class="d-flex mb-3 pos-rel">
            <span class="number ms-4"> 3 </span>
            <div>
              <h5 class="add-order-gr">ناقش المستشارين والخبراء</h5>
              <p style="font-size: 12px">
                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج
                أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار
                ماجنا أليكيوا . يوت
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-start">
          <img
              class="w-100"
              style="max-width: 60px;" :src="base_url+'/images/circleElement.svg'" alt="">
          <iframe
              class="w-100"
              height="315"
              src="https://www.youtube.com/embed/Aq8IXh67hdE"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
          ></iframe>
        </div>
      </div>
    </div>
  </section>

  <section class="position-relative ">
    <img class="h2-it" :src="base_url+'/images/h2.png'" alt="">
    <div class="container">
      <h3 class="text-center mb-5">لماذا تختار موثوق لقضيتك</h3>
      <div class="row w-100 mx-0 px-0">
        <div class="col-md-4 mb-4">
          <div class="d-sec">
            <img style="width: 50px" :src="base_url+'/images/s1.svg'" alt=""/>
            <h5 style="color: #048e81" class="mb-2 mt-3">امان وسرية تامة</h5>
            <p style="font-size: 14px">
              لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت
              دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
              يوت
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="d-sec">
            <img style="width: 50px" :src="base_url+'/images/s2.svg'" alt=""/>
            <h5 style="color: #048e81" class="mb-2 mt-3">سهل الاستخدام</h5>
            <p style="font-size: 14px">
              لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت
              دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
              يوت
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="d-sec">
            <img style="width: 50px" :src="base_url+'/images/s3.svg'" alt=""/>
            <h5 style="color: #048e81" class="mb-2 mt-3">ضمان حقوق الطرفين</h5>
            <p style="font-size: 14px">
              لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت
              دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .
              يوت
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 position-relative">
    <img class="h1-it" :src="base_url+'/images/h1.png'" alt="">
    <div class="container">
      <h3 class="text-center mt-5">مقدمي الخدمة</h3>
      <h6 class="text-center my-2" style="color: #048e81">
        مقدمي الخدمة الأفضل لهذا الاسبوع
      </h6>
      <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between">
          <h4>مقدمي الخدمة</h4>
          <h6 style="color: #0995eb">اكتشف كل مقدمي الخدمة</h6>
        </div>
      </div>
      <div class="mt-5">
        <div>
          <div id="slider" class="owl-carousel owl-theme">
            <div style="min-width: 250px" class="user-ab">
              <div class="d-flex">
                  <span
                      class="position-relative ms-2"
                      style="display: inline-block"
                  >
                    <img style="width: 50px" :src="base_url+'/images/user.svg'" alt=""/>
                    <i class="online-icon fas fa-circle"></i>
                  </span>
                <span>
                    <span class="d-block">محمد مصطفي</span>
                    <span><small>محام عقارات</small></span>
                  </span>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                  <span class="" style="font-size: 12px">
                    <span>4.3</span>
                    <span>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                    </span>
                  </span>
                <span>
                    <button class="order-btn active">اطلب الخدمة</button>
                  </span>
              </div>
            </div>
            <div style="min-width: 250px" class="user-ab">
              <div class="d-flex">
                  <span
                      class="position-relative ms-2"
                      style="display: inline-block"
                  >
                    <img style="width: 50px" :src="base_url+'/images/user.svg'" alt=""/>
                    <i class="online-icon fas fa-circle"></i>
                  </span>
                <span>
                    <span class="d-block">محمد مصطفي</span>
                    <span><small>محام عقارات</small></span>
                  </span>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                  <span class="" style="font-size: 12px">
                    <span>4.3</span>
                    <span>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                    </span>
                  </span>
                <span>
                    <button class="order-btn">اطلب الخدمة</button>
                  </span>
              </div>
            </div>
            <div style="min-width: 250px" class="user-ab">
              <div class="d-flex">
                  <span
                      class="position-relative ms-2"
                      style="display: inline-block"
                  >
                    <img style="width: 50px" :src="base_url+'/images/user.svg'" alt=""/>
                    <i class="online-icon fas fa-circle"></i>
                  </span>
                <span>
                    <span class="d-block">محمد مصطفي</span>
                    <span><small>محام عقارات</small></span>
                  </span>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                  <span class="" style="font-size: 12px">
                    <span>4.3</span>
                    <span>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                    </span>
                  </span>
                <span>
                    <button class="order-btn">اطلب الخدمة</button>
                  </span>
              </div>
            </div>
            <div style="min-width: 250px" class="user-ab">
              <div class="d-flex">
                  <span
                      class="position-relative ms-2"
                      style="display: inline-block"
                  >
                    <img style="width: 50px" :src="base_url+'/images/user.svg'" alt=""/>
                    <i class="online-icon fas fa-circle"></i>
                  </span>
                <span>
                    <span class="d-block">محمد مصطفي</span>
                    <span><small>محام عقارات</small></span>
                  </span>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                  <span class="" style="font-size: 12px">
                    <span>4.3</span>
                    <span>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                    </span>
                  </span>
                <span>
                    <button class="order-btn">اطلب الخدمة</button>
                  </span>
              </div>
            </div>
            <div style="min-width: 250px" class="user-ab">
              <div class="d-flex">
                  <span
                      class="position-relative ms-2"
                      style="display: inline-block"
                  >
                    <img style="width: 50px" :src="base_url+'/images/user.svg'" alt=""/>
                    <i class="online-icon fas fa-circle"></i>
                  </span>
                <span>
                    <span class="d-block">محمد مصطفي</span>
                    <span><small>محام عقارات</small></span>
                  </span>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                  <span class="" style="font-size: 12px">
                    <span>4.3</span>
                    <span>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                    </span>
                  </span>
                <span>
                    <button class="order-btn">اطلب الخدمة</button>
                  </span>
              </div>
            </div>
            <div style="min-width: 250px" class="user-ab">
              <div class="d-flex">
                  <span
                      class="position-relative ms-2"
                      style="display: inline-block"
                  >
                    <img style="width: 50px" :src="base_url+'/images/user.svg'" alt=""/>
                    <i class="online-icon fas fa-circle"></i>
                  </span>
                <span>
                    <span class="d-block">محمد مصطفي</span>
                    <span><small>محام عقارات</small></span>
                  </span>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                  <span class="" style="font-size: 12px">
                    <span>4.3</span>
                    <span>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                    </span>
                  </span>
                <span>
                    <button class="order-btn">اطلب الخدمة</button>
                  </span>
              </div>
            </div>
            <div style="min-width: 250px" class="user-ab">
              <div class="d-flex">
                  <span
                      class="position-relative ms-2"
                      style="display: inline-block"
                  >
                    <img style="width: 50px" :src="base_url+'/images/user.svg'" alt=""/>
                    <i class="online-icon fas fa-circle"></i>
                  </span>
                <span>
                    <span class="d-block">محمد مصطفي</span>
                    <span><small>محام عقارات</small></span>
                  </span>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                  <span class="" style="font-size: 12px">
                    <span>4.3</span>
                    <span>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                      <i class="fas fa-star orng-c"></i>
                    </span>
                  </span>
                <span>
                    <button class="order-btn">اطلب الخدمة</button>
                  </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 position-relative ">

    <img class="h2-it" :src="base_url+'/images/h2.png'" alt="">
    <div class="container">
      <div class="text-start">
        <img style="max-width: 50px;"
             class="w-100" :src="base_url+'/images/green-circleElement.svg'" alt="">
      </div>
      <h3 class="text-center mt-5">الوظائف الحديثة</h3>
      <h6 class="text-center my-2" style="color: #048e81">
        يطرح اخر الوظائف المتاحة
      </h6>
      <div class="mt-5">
        <div id="slider2" class="owl-carousel owl-theme">
          <div style="min-width: 250px" class="jobs">
            <div class="text-end">
              <i
                  style="color: rgb(175, 175, 175)"
                  class="fas fa-ellipsis-h"
              ></i>
            </div>
            <div class="text-center mb-2">
              <img
                  style="width: 70px; margin-top: -20px; margin: auto"
                  :src="base_url+'/images/work.svg'"
                  alt=""
              />
            </div>
            <div class="text-center">
              <h6 class="text-center">ويب ديفيلوبر</h6>
              <h6 class="text-center" style="color: #048e81">
                <small>دوام كامل</small>
              </h6>
              <div>
                <button class="offer-btn">قدم عرضك الان</button>
              </div>
            </div>
          </div>
          <div style="min-width: 250px" class="jobs">
            <div class="text-end">
              <i
                  style="color: rgb(175, 175, 175)"
                  class="fas fa-ellipsis-h"
              ></i>
            </div>
            <div class="text-center mb-2">
              <img
                  style="width: 70px; margin-top: -20px; margin: auto"
                  :src="base_url+'/images/work.svg'"
                  alt=""
              />
            </div>
            <div class="text-center">
              <h6 class="text-center">ويب ديفيلوبر</h6>
              <h6 class="text-center" style="color: #048e81">
                <small>دوام كامل</small>
              </h6>
              <div>
                <button class="offer-btn">قدم عرضك الان</button>
              </div>
            </div>
          </div>
          <div style="min-width: 250px" class="jobs">
            <div class="text-end">
              <i
                  style="color: rgb(175, 175, 175)"
                  class="fas fa-ellipsis-h"
              ></i>
            </div>
            <div class="text-center mb-2">
              <img
                  style="width: 70px; margin-top: -20px; margin: auto"
                  :src="base_url+'/images/work.svg'"
                  alt=""
              />
            </div>
            <div class="text-center">
              <h6 class="text-center">ويب ديفيلوبر</h6>
              <h6 class="text-center" style="color: #048e81">
                <small>دوام كامل</small>
              </h6>
              <div>
                <button class="offer-btn">قدم عرضك الان</button>
              </div>
            </div>
          </div>
          <div style="min-width: 250px" class="jobs">
            <div class="text-end">
              <i
                  style="color: rgb(175, 175, 175)"
                  class="fas fa-ellipsis-h"
              ></i>
            </div>
            <div class="text-center mb-2">
              <img
                  style="width: 70px; margin-top: -20px; margin: auto"
                  :src="base_url+'/images/work.svg'"
                  alt=""
              />
            </div>
            <div class="text-center">
              <h6 class="text-center">ويب ديفيلوبر</h6>
              <h6 class="text-center" style="color: #048e81">
                <small>دوام كامل</small>
              </h6>
              <div>
                <button class="offer-btn">قدم عرضك الان</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button
            class="offer-btn mt-3"
            style="color: #ffffff; background-color: #048e81"
        >
          اكتشف كل الوظائف
        </button>
      </div>
    </div>
  </section>

  <section class="py-5 position-relative ">
    <img class="h1-it" :src="base_url+'/images/h1.png'" alt="">
    <div class="container">
      <div class="text-start">
        <img style="max-width: 50px;"
             class="w-100" :src="base_url+'/images/green-circleElement.svg'" alt="">
      </div>
      <h3 class="text-center mt-5">الخدمات التي يقدمها موثوق</h3>
      <div class=" ">
        <h6 class="text-center my-2" style="color: #048e81">
          لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سي
        </h6>
        <a
            href=""
            class="text-dark d-flex align-items-center justify-content-end sev-top"
        >
          <span> تصفح كل الخدمات </span>
          <span>
              <img
                  class="me-2"
                  style="width: 20px"
                  :src="base_url+'/images/blue-arrow.svg'"
                  alt=""
              />
            </span>
        </a>
      </div>

      <div class="mt-5">
        <div
            class="d-flex align-items-center justify-content-center flex-wrap"
        >
          <a href="#" class="our-sev active">
            <div class="w-100">
              <img style="width: 20px" :src="base_url+'/images/tan.svg'" alt=""/>
              <span>التنفيذ</span>
            </div>
          </a>
          <a href="#" class="our-sev">
            <div class="w-100">
              <img style="width: 20px" :src="base_url+'/images/wec.svg'" alt=""/>
              <span>الوكالات والاقرارات</span>
            </div>
          </a>
          <a href="#" class="our-sev">
            <div class="w-100">
              <img style="width: 20px" :src="base_url+'/images/wec.svg'" alt=""/>
              <span>التراخيص</span>
            </div>
          </a>
          <a href="#" class="our-sev">
            <div class="w-100">
              <img style="width: 20px" :src="base_url+'/images/aam.svg'" alt=""/>
              <span>الاعمال</span>
            </div>
          </a>
          <a href="#" class="our-sev">
            <div class="w-100">
              <img style="width: 20px" :src="base_url+'/images/qada.svg'" alt=""/>
              <span>القضاء</span>
            </div>
          </a>
          <a href="#" class="our-sev">
            <div class="w-100">
              <img style="width: 20px" :src="base_url+'/images/kada.svg'" alt=""/>
              <span>خدمات التحقق</span>
            </div>
          </a>
          <a href="#" class="our-sev">
            <div class="w-100">
              <img style="width: 20px" :src="base_url+'/images/rahon.svg'" alt=""/>
              <span>الرهون والعقارات</span>
            </div>
          </a>
          <a href="#" class="our-sev">
            <div class="w-100">
              <img style="width: 20px" :src="base_url+'/images/rahon.svg'" alt=""/>
              <span>المواعيد</span>
            </div>
          </a>
          <a href="#" class="our-sev">
            <div class="w-100">
              <img style="width: 20px" :src="base_url+'/images/maw.svg'" alt=""/>
              <span>الحالات الاجتماعية</span>
            </div>
          </a>
        </div>
      </div>
      <div class="text-end">
        <img style="max-width: 50px;"
             class="w-100" :src="base_url+'/images/green-circleElement.svg'" alt="">
      </div>
    </div>
  </section>
  <section>
    <div class="container py-5">
      <div class="row w-100 mx-0 px-0">
        <div class="col-md-4 mb-3">
          <div class="gr-c mb-3">
            <img style="width: 25px" :src="base_url+'/images/green-gavel.svg'" alt=""/>
            <span>التنفيذ</span>
          </div>
          <div>
            <h6>طلب اصدار امر حضانة</h6>
            <p class="f-12">
              لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت
              ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور لوريم
              ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت ,كونسيكتيتور
              أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            </p>
            <a href="" class="mt-5 bl-c">
              <small>
                  <span class="ms-2">شرح الخدمة</span
                  ><span>
                    <img
                        style="margin-left: 6px; width: 20px"
                        :src="base_url+'/images/green-arrow.svg'"
                        alt=""/></span
              ></small>
            </a>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="gr-c mb-3">
            <img style="width: 25px" :src="base_url+'/images/green-gavel.svg'" alt=""/>
            <span>التنفيذ</span>
          </div>
          <div>
            <h6>طلب اصدار امر حضانة</h6>
            <p class="f-12">
              لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت
              ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور لوريم
              ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت ,كونسيكتيتور
              أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            </p>
            <a href="" class="mt-5 bl-c">
              <small>
                  <span class="ms-2">شرح الخدمة</span
                  ><span>
                    <img
                        style="margin-left: 6px; width: 20px"
                        :src="base_url+'/images/green-arrow.svg'"
                        alt=""/></span
              ></small>
            </a>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="gr-c mb-3">
            <img style="width: 25px" :src="base_url+'/images/green-gavel.svg'" alt=""/>
            <span>التنفيذ</span>
          </div>
          <div>
            <h6>طلب اصدار امر حضانة</h6>
            <p class="f-12">
              لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت
              ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور لوريم
              ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت ,كونسيكتيتور
              أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            </p>
            <a href="" class="mt-5 bl-c">
              <small>
                  <span class="ms-2">شرح الخدمة</span
                  ><span>
                    <img
                        style="margin-left: 6px; width: 20px"
                        :src="base_url+'/images/green-arrow.svg'"
                        alt=""/></span
              ></small>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5" style="background-color: #EEEEEE;">
    <div class="container">
      <h3 class="text-center ">تعرف علي مراحل الطلبات ونتائجها</h3>
      <div class="mb-5">
        <h6 class="text-center my-2" style="color: #048e81">
          لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سي
        </h6>
      </div>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button
                class="accordion-button py-4 gr-c"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseOne"
                aria-expanded="true"
                aria-controls="collapseOne"
            >
              ما الفرق بين تسجيل وكالة و اصدار وكالة الكترونية؟
            </button>
          </h2>
          <div
              id="collapseOne"
              class="accordion-collapse collapse show"
              aria-labelledby="headingOne"
              data-bs-parent="#accordionExample"
          >
            <div class="accordion-body">
              لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت
              ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور لوريم
              ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت ,كونسيكتيتور
              أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button
                class="accordion-button py-4 gr-c collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseTwo"
                aria-expanded="false"
                aria-controls="collapseTwo"
            >
              ما الفرق بين تسجيل وكالة و اصدار وكالة الكترونية؟
            </button>
          </h2>
          <div
              id="collapseTwo"
              class="accordion-collapse collapse"
              aria-labelledby="headingTwo"
              data-bs-parent="#accordionExample"
          >
            <div class="accordion-body">
              لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت
              ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور لوريم
              ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت ,كونسيكتيتور
              أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button
                class="accordion-button py-4 gr-c collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseThree"
                aria-expanded="false"
                aria-controls="collapseThree"
            >
              ما الفرق بين تسجيل وكالة و اصدار وكالة الكترونية؟
            </button>
          </h2>
          <div
              id="collapseThree"
              class="accordion-collapse collapse"
              aria-labelledby="headingThree"
              data-bs-parent="#accordionExample"
          >
            <div class="accordion-body">
              لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت
              ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور لوريم
              ايبسوم دولار سيت أميت ,كونسيكتيتور دولار سيت أميت ,كونسيكتيتور
              أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 position-relative">
    <img class="h2-it" :src="base_url+'/images/h2.png'" alt="">
    <div class="container py-5">
      <h3 class="text-center ">شركاء موثوق</h3>
      <div class="mb-5 pb-3">
        <h6 class="text-center my-2" style="color: #048e81">
          لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سي
        </h6>
      </div>
      <div>
        <div id="slider3" class="owl-carousel owl-theme">
          <div class="images-slider-ss">
            <img style="width: 150px;" :src="base_url+'/images/t1.svg'" alt="">
          </div>
          <div class="images-slider-ss">
            <img style="width: 150px;" :src="base_url+'/images/t1.svg'" alt="">
          </div>
          <div class="images-slider-ss">
            <img style="width: 150px;" :src="base_url+'/images/t1.svg'" alt="">
          </div>
          <div class="images-slider-ss">
            <img style="width: 150px;" :src="base_url+'/images/t1.svg'" alt="">
          </div>
          <div class="images-slider-ss">
            <img style="width: 150px;" :src="base_url+'/images/t1.svg'" alt="">
          </div>
          <div class="images-slider-ss">
            <img style="width: 150px;" :src="base_url+'/images/t1.svg'" alt="">
          </div>
          <div class="images-slider-ss">
            <img style="width: 150px;" :src="base_url+'/images/t1.svg'" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>


  <section style="background-color: #EEEEEE;" class="position-relative">
    <div class="row w-100 mx-0 px-0" style="min-height: 400px;">
      <div class="col-md-6 h-100">
        <img class="w-100 h-100 "
             style="object-fit: cover;"
             :src="base_url+'/images/apps.png'" alt="">
      </div>
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="pd-10 text-center">
          <h2 class=" gr-c my-3">تطبيق موثوق</h2>
          <p class="gr-c pb-5">لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سي</p>
          <div class="pt-5 my-5">
            <a href="" class="mx-2">
              <img style="width: 150px;" :src="base_url+'/images/google.svg'" alt="">
            </a>
            <a href="" class="mx-2">
              <img style="width: 150px;" :src="base_url+'/images/apple.svg'" alt="">
            </a>

          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import HomeHeader from "./partials/home/HomeHeader";
import SearchServiceSection from "./partials/home/SearchServiceSection";

export default {
  name: "Home",
  components: {SearchServiceSection, HomeHeader},
  data() {
    return {
      base_url: base_url,
    };
  }
}
</script>

<style scoped>

</style>