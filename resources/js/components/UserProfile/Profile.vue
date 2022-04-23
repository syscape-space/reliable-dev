<template>

  <section class="content-body">
    <div class="row">
              <div class="col-lg-12 col-md-12 ">
                <button class="end-sub w-100 border-0 rounded text-center"> تم انتهاء اشتراكك  </button>
              </div>
              <div class="col-lg-12 col-md-12 ">
                <div class="mt-5 row w-100 mx-0 px-0">
                  <div class="col-md-4 col-lg-3">
                    <div class="card-client  rounded  p-3">
                      <p class="  m-0" style=" color: #0491e8 ">مرحبا مجددا محمد </p>
                      <p class="f-12" style="font-size: 12px;">  هل تفكر فى إنشاء طلب جديد؟؟ </p>
                      <div class="text-center">
                        <img class="ms-3" style="width: 40px;" :src="`${base_url}/assets/images/think.svg`" alt="" srcset="">
                      </div>
                      <div class="text-center">
                        <button class="show-balance mt-3 border-0" style="background-color: #028e80;"> إنشاء طلب جديد </button>
                      </div>
                    </div>
                  </div>
                <div class="col-md-8 col-lg-8 col-xl-7  mt-md-0 mt-5">
                  <div class="contain-btn  d-flex justify-content-between flex-wrap">
                    <a href="/make-order" class=" mb-3 link-kkk active-log" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="bg-white active" aria-current="true" aria-label="Slide 1">
                        <img :src="`${base_url}/assets/images/a-1.svg`" alt="">
                      </button>
                      <h6> البحث عن محامى </h6>
                    </a>
                    <a href="/make-order" class=" mb-3 link-kkk" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-white" aria-label="Slide 1">
                        <img :src="`${base_url}/assets/images/a-2.svg`" alt="">
                      </button>
                      <h6> استشارة قانونية </h6>
                    </a>
                    <a href="/make-order" class=" mb-3 link-kkk" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-white" aria-label="Slide 1">
                        <img :src="`${base_url}/assets/images/a-3.svg`" alt="">
                      </button>
                      <h6> القضايا </h6>
                    </a>
                    <a href="/make-order" class=" mb-3 link-kkk" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="bg-white" aria-label="Slide 1">
                        <img :src="`${base_url}/assets/images/a-4.svg`" alt="">
                      </button>
                      <h6>المطالبات المالية  </h6>
                    </a>
                    <a href="/make-order" class=" mb-3 link-kkk" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" class="bg-white" aria-label="Slide 1">
                        <img :src="`${base_url}/assets/images/a-5.svg`" alt="">
                      </button>
                      <h6> خدمات العقود </h6>
                    </a>
                    <a href="/make-order" class=" mb-3 link-kkk" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" class="bg-white" aria-label="Slide 1">
                        <img :src="`${base_url}/assets/images/a-6.svg`" alt="">
                      </button>
                      <h6> المذكرات القانونية </h6>
                    </a>
                    <a href="/make-order" class=" mb-3 link-kkk" style="width: 70px;">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" class="bg-white" aria-label="Slide 1">
                        <img :src="`${base_url}/assets/images/a-7.svg`" alt="">
                      </button>
                      <h6> إضافة عقد </h6>
                    </a>
                  </div>
                </div>

                </div>
              </div>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="new-order my-5 pt-2">
                      <div class="title-order d-flex align-items-center mb-2">
                        <img :src="`${base_url}/assets/images/order.svg`" alt="" srcset="">
                        <h6 class="mx-3 mb-0">طلبات جديدة</h6>
                        <img style="width: 18px;" :src="`${base_url}/assets/images/question.svg`" alt="" srcset="">
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
                                <div class="order-number">{{ $root.auth_user.my_all_orders.ongoing }}</div>
                                <div class="text-order">طلبات محفوظة</div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">{{ $root.auth_user.my_all_orders.under_review }}</div>
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
                        <img :src="`${base_url}/assets/images/offer_order.svg`" alt="" srcset="">
                        <h6 class="mx-3 mb-0">الطلبات المعروضة</h6>
                        <img style="width: 18px;" :src="`${base_url}/assets/images/question.svg`" alt="" srcset="">
                      </div>
                      <div class="content-order ">
                        <div class="row w-100 mx-0 py-2 px-3">
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">{{ $root.auth_user.my_all_orders.all }}</div>
                                <div class="text-order">متاح للعرض</div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">{{ $root.auth_user.my_all_orders.offered }}</div>
                                <div class="text-order">للتفاوض </div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-6 p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">13</div>
                                <div class="text-order">{{$root.auth_user.my_all_orders.completed}}</div>
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
                        <img :src="`${base_url}/assets/images/shake-hands.svg`" alt="" srcset="">
                        <h6 class="mx-3 mb-0">تحت التنفيذ</h6>
                        <img style="width: 18px;" :src="`${base_url}/assets/images/question.svg`" alt="" srcset="">
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
                                <div class="order-number">{{ $root.auth_user.my_all_orders.done }}</div>
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
                        <img :src="`${base_url}/assets/images/end_order.svg`" alt="" srcset="">
                        <h6 class="mx-3 mb-0">الطلبات المنتهية</h6>
                        <img style="width: 18px;" :src="`${base_url}/assets/images/question.svg`" alt="" srcset="">
                      </div>
                      <div class="content-order ">
                        <div class="row w-100 mx-0 py-2 px-3">
                          <div class="col-md-5  p-1">
                            <div class=" w-100  mt-3 d-flex ">  
                              <div class="add-order">
                                <div class="order-number">{{ $root.auth_user.my_all_orders.closed }}</div>
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
                                <div class="order-number"> {{ $root.auth_user.my_all_orders.refused }} </div>
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
                  <div class="content-login text-start   justify-content-start pt-4" style="max-width: 330px; position: relative;">
                    <div class="about-us mt-5 text-center">
                      <div class="sum-btn">
                        
                        <button class="about-btn-1" style="    right: 3%;" data-bs-toggle="modal" data-bs-target="#exampleModal">خدماتنا</button>
                        <button class="about-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">طلباتي</button>
                        <a href="/make-order" class="new-order-btn new-2  " data-bs-toggle="modal" data-bs-target="#exampleModal"> طلب جديد </a>
                      </div>
                      <img class="about-img" :src="`${base_url}/assets/images/basma.svg`" alt="" srcset="">
                    </div>
                  </div> 
                </div>
    </div>
  </section>






</template>
<script>
export default {
  name: "Profile",
  data() {
    return {
      base_url: base_url,
    };
  },
  mounted() {},
};
</script>
<style scoped>
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
  text-align: center;
}
.sum-btn button:hover {
}
header > .container,
section > .container {
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
    width: 246px;
    margin-right: auto;
    display: block;
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
  background-color: #ceece9;
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
@media (max-width: 991px) {
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
  padding: 6px 10px;
  display: inline-flex;
  height: 39px;
  align-items: center;
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
  border: 1px solid #ddd;
  border-radius: 50%;
  height: 40px;
  width: 40px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin: 5px;
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
  bottom: -56px;
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
.carousel-control-next-icon {
}
.carousel-control-prev-icon {
}
.carousel-control-next-icon,
.carousel-control-prev-icon {
  width: 20px;
  height: 20px;
}
.carousel-control-next {
  right: -45px;
}
.carousel-control-prev {
  left: -45px;
}
.carousel-control-next,
.carousel-control-prev {
  opacity: 1;
}

/* *************** client-page **************** */

.card-client {
  background-color: #ecf8ff;
}

.client-page .card-client h5,
.client-page .card-client h6 {
  color: #0491e8;
}

.show-balance {
  width: 135px;
  padding: 7px 7px;
  background-color: #0491e8;
  color: #fff;
  border: solid 1px #0091ea;
  border-radius: 20px;
  font-size: 13px;
  font-weight: 300;
}

.end-sub {
  font-size: 13px;
  font-weight: 300;
  color: #fff;
  padding: 8px 0;
  background-color: #e33232;
}

.contain-btn {
  margin: 0 2rem 0 0;
}

.contain-btn div {
  text-align: center;
}
.contain-btn div h6 {
  margin: 5px 0 0;
  font-size: 14px;
  font-weight: 500;
  min-height: 39px;
  display: flex;
  align-items: center !important;
  text-align: center !important;
  justify-content: center;
}
.contain-btn button {
  border: 1px solid #028e80;
  border-radius: 8px;
  height: 40px;
  width: 40px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin: 5px 5px;
  background-color: #ddf1fc !important;
}

.content-order {
  background-color: #ecf8ff8c;
  border-radius: 10px;
  min-height: 185px;
  white-space: nowrap;
}

.order-number {
  color: #0491e8;
  font-weight: 500;
}
.text-order {
  font-size: 15px;
  font-weight: 400;
}
.new-order-btn {
  top: -8% !important;
  right: 75% !important;
}
.new-2:hover {
  font-size: 20px !important;
  top: -8% !important;
  border: 0 !important;
  font-size: 20px !important;
}

.new-order-btn:nth-child(1) {
  top: 30% !important;
  right: 0% !important;
}
.new-new .about-us .sum-btn button:nth-child(1) {
  position: absolute;
  top: 59%;
  right: -6%;
}
.new-new .about-us .sum-btn button:nth-child(2) {
  position: absolute;
  top: 3%;
  right: 16%;
}
.active-log h6 {
  color: #028e80;
}
.active-log button img {
  filter: drop-shadow(2px 1px 0px #fff);
}
.active-log button {
  background-color: #0491e8 !important;
}
.contain-btn button {
  border: 1px solid #0491e8;
  background-color: #e9f7ff !important;
}
.link-kkk {
  text-decoration: none;
  color: #000;
  display: block;
}
/* *************** client-page **************** */
</style>