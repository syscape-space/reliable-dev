<template>
    <section class="main-pc ">
          <div class="container-fluid">
              <div class="row">
                <div class="col-lg-4 d-none d-lg-block">
                      <div class="content text-center pt-1 ">
                          <p class="num">01</p>
                          <img :src="base_url + '/assets/images/logo.svg'" alt="logo" class="mt-5 pt-5">
                          <p class="title">اختيار نوع الخدمة</p>
                          <p class="sup-title">  انشاء طلب جديد</p>
                          <p class="dis">   
                            عند اختيار خدمة سيظهر هنا تعليما الخدمة وشرح  
                            <br>   مع الفيديو بالأسفل
                          </p>
                          <div class="vid  p-5">
                              <p class="vid-title text-right ">
                                مشاهده شرح طلب الخدمة
                              </p>
                             <div class="center">
                                <div class="img">
                                    <img :src="base_url + '/assets/images/man.svg'" alt="#" class="back-man">
                                    <div class="overlay">
                                        <a href="#">
                                            <div class="dis">
                                              <img :src="base_url + '/assets/images/play-button.svg'" alt="#">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                             </div>
                             <div class="info m-5">
                                 <div class="row">
                                     <div class="col-4">
                                         <img :src="base_url + '/assets/images/open-book.svg'" alt="#">
                                     </div>
                                     <div class="col-8">
                                        <p>
                                           <a href="#" target="_blank">
                                            الدليل الارشادي لطلب للخدمة
                                           </a>
                                        </p>
                                    </div>
                                 </div>
                             </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-8 ">
                    <div class="row">
                        
                        <div class="col-lg-7">
                            <form dir="rtl">
                                <div class="data  pt-5 text-right ">
                                    <p class="st">
                                        خطوه <span class="st-num">1</span> <span class="color">من 6</span>
                                    </p>
                                    <div class="progress mb-5" dir="rtl">
                                        <div class="progress-bar" role="progressbar" style="width: 16.667%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                    <div class="data data1  text-right ">
                                            <div class="select">
                                                <div class="option selected">
                                                    <div class="head">
                                                        <!-- <p class="d-inline-block name selected pr-1" for="rat1">
                                                            طلب توثيق
                                                        </p>
                                                        <label class="radio d-inline-block">
                                                            <input class="radio-input" type="radio" id="rat1" name="radio">
                                                            <span class="radio-checkmark-box">
                                                            <span class="radio-checkmark"></span>
                                                            </span>
                                                        </label> -->
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" id="exampleCheck1" name="choose" checked>
                                                            <label class="form-check-label name selected pr-2" for="exampleCheck1">طلب توثيق  </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" id="exampleCheck2" name="choose">
                                                            <label class="form-check-label name  pr-2" for="exampleCheck2"> الطلب ملحلق بطلب رقم  </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="text" class="form-control order-num" placeholder="ادخل رقم الطلب...." >
                                                        </div>
                                                        <div class="details selected mt-3">
                                                            <div class="row">
                                                                <div class="col-10">
                                                                <p>
                                                                    تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                                </p>
                                                            </div>
                                                            <div class="col-2 text-center">
                                                                <img :src="base_url + '/assets/images/Page.svg'" alt="#">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="option mt-4">
                                                    <div class="head">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" id="exampleCheck3" name="choose">
                                                            <label class="form-check-label name  pr-2" for="exampleCheck3"> توثيق عقد قائم </label>
                                                        </div>
                                                        <div class="details  mt-3">
                                                            <div class="row">
                                                                <div class="col-10">
                                                                <p>
                                                                    تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                                </p>
                                                            </div>
                                                            <div class="col-2 text-center">
                                                                <img :src="base_url + '/assets/images/Page.svg'" alt="#">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="option mt-4">
                                                    <div class="head">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" id="exampleCheck4" name="choose">
                                                            <label class="form-check-label name  pr-2" for="exampleCheck4">   اشتراك بالباقات </label>
                                                        </div>
                                                        <div class="details  mt-3">
                                                            <div class="row">
                                                                <div class="col-10">
                                                                <p>
                                                                    تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                                </p>
                                                            </div>
                                                            <div class="col-2 text-center">
                                                                <img :src="base_url + '/assets/images/Page.svg'" alt="#">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="option mt-4">
                                                    <div class="head">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" id="exampleCheck5" name="choose">
                                                            <label class="form-check-label name  pr-2" for="exampleCheck5">   طلب استشارة </label>
                                                        </div>
                                                        <div class="details  mt-3">
                                                            <div class="row">
                                                                <div class="col-10">
                                                                <p>
                                                                    تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                                </p>
                                                            </div>
                                                            <div class="col-2 text-center">
                                                                <img :src="base_url + '/assets/images/Page.svg'" alt="#">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        <div class="btns text-center">
                                            <div class="btn page1 btn-primary big cont mb-5" data-progress="2" data-page="2">
                                                المتابعه
                                            </div>
                                        </div>
                                        </div>
                                    <div class="data data2  text-right d-none">
                                        <div class="select">
                                            <div class="option selected">
                                                <div class="head">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="exampleCheck8" name="chose" checked>
                                                        <label class="form-check-label name selected pr-2" for="exampleCheck8">طلب توثيق  </label>
                                                    </div>
                                                    <div class="details selected mt-3">
                                                        <div class="row">
                                                            <div class="col-10">
                                                            <p>
                                                                تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                            </p>
                                                        </div>
                                                        <div class="col-2 text-center">
                                                            <img :src="base_url + '/assets/images/Page.svg'" alt="#">
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="page2 page d-none">
                                            <div class="laws">
                                                <p>
                                                    شروط الخدمة
                                                </p>
                                                <ul>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                    <li>
                                                        تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="select">
                                                <div class="option selected ">
                                                    <div class="head ">
                                                        <div class="details selected bordr mt-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                <p class="mt-0 pt-0">
                                                                    <img :src="base_url + '/assets/images/right-mark.svg'" alt="#" class="right-mark">
                                                                    تتيح هذه الخدمة تقديم طلب من مقدمي الخدمات لجميع القضايا والاستشارات
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="page3 page mt-3 d-none">
                                            <p class="red">
                                                اختر القسم المناسب
                                            </p>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <select id="inputState" class="form-control">
                                                    <option selected>اختر القسم الرئيسى</option>
                                                    <option>...</option>
                                                </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <select id="inputState" class="form-control">
                                                    <option selected>اختر القسم الفرعى</option>
                                                    <option>...</option>
                                                </select>                                            </div>
                                            </div>
                                            <p class="red mt-3">
                                                حدد مقدم الخدمة <span> ( سيتم عرض الطلب حسب اختيارك )  </span>
                                            </p>
                                            <div class="select mb-4">
                                                <div class="option selected ">
                                                    <div class="head ">
                                                        <div class="details selected bordr mt-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                <p class="mt-0 pt-0">
                                                                    <img :src="base_url + '/assets/images/right-mark.svg'" alt="#" class="right-mark">
                                                                الجميع
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                <select id="inputState" class="form-control">
                                                    <option selected>اختر  المدينه</option>
                                                    <option>...</option>
                                                </select>
                                                </div>
                                                <div class="form-group col-md-12 icon-input">
                                                    <input class="form-control w-100" type="text" placeholder="ابحث بالاسم........">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="page4  page mt-3 d-none">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="exampleCheck81" name="choos" >
                                                <label class="form-check-label name red pr-2" for="exampleCheck81"> بيانات المدعي علية  </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="exampleCheck80" name="choos" >
                                                <label class="form-check-label name red pr-2" for="exampleCheck80"> هل يوجد اطراف في الضية  </label>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <input class="form-control w-100" type="text" value="أحمد ياسر على">
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                    <input class="form-control w-100" type="text" placeholder="رقم الهويه........">
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                    <input class="form-control w-100" type="text" placeholder=" الجنسيه........">
                                                </div>
                                                <div class="form-group col-md-3 text-center icons">
                                                    <img :src="base_url + '/assets/images/icons.svg'" alt="#" class="d-inline-block">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <input class="form-control w-100" type="text" value="أحمد ياسر على">
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                    <input class="form-control w-100" type="text" placeholder="رقم الهويه........">
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                    <input class="form-control w-100" type="text" placeholder=" الجنسيه........">
                                                </div>
                                                <div class="form-group col-md-3 text-center icons">
                                                    <img :src="base_url + '/assets/images/icons.svg'" alt="#" class="d-inline-block">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="select mb-4">
                                                <div class="option selected ">
                                                    <div class="head ">
                                                        <div class="details selected bordr mt-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                <p class="mt-0 pt-0">
                                                                    <img :src="base_url + '/assets/images/right-mark.svg'" alt="#" class="right-mark">
                                                                    الموافقة علي صحة البيانات وان لا يكون مقدم الخدمة خصمك
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="page5 page mt-3 d-none">
                                            <div class="form-check">
                                                <label class="form-check-label name red pr-2 mb-2" for="exampleCheck81">   المدة المقترحة للطلب  </label>
                                                <input type="number" class="form-control" id="exampleCheck81" placeholder="عدد الأيام...." >
                                            </div>
                                            <p class="red pt-4 mb-0">
                                                قابل للتفاوض ؟
                                            </p>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="exampleCheck8000" name="chos" >
                                                <label class="form-check-label name  pr-2" for="exampleCheck8000"> نعم  </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="exampleCheck800" name="chos" >
                                                <label class="form-check-label name  pr-2" for="exampleCheck800"> لا  </label>
                                            </div>
                                            <div class="form-check textare">
                                                <label class="form-check-label name red pr-2 mb-2" for="exampleCheck81">  التفاصيل  </label>
                                                <textarea class="form-control textare-count" id="exampleCheck81" maxlength="1000" placeholder="اكتب التفاصيل هنا...." rows="4" ></textarea>
                                                <span class="remain"><span  id="totalChars">0</span>/1000</span>
                                            </div>
                                            <p class="red mt-3">
                                                ارفاق ملفات <span> ( اختر الملف الذي تريد ارفاقه مع طلبك )  </span>
                                            </p>
                                            <div class="form-check form-check-inline">
                                                <div class="variants">
                                                    <div class='attach d-inline-block'>
                                                      <label for='input-file'>
                                                        مرفقات
                                                        <img :src="base_url + '/assets/images/file.svg'" alt="#">
                                                      </label>
                                                      <input id='input-file' type='file' />
                                                    </div>
                                                    <div class='sounds d-inline-block mr-3'>
                                                        <label for='input-file'>
                                                            ارفاق ملف صوتي
                                                          <img :src="base_url + '/assets/images/audio-file.svg'" alt="#">
                                                        </label>
                                                        <input id='input-file' type='file' />
                                                      </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="page6 page mt-3 d-none">
                                               <div class="row mt-5">
                                                   <div class="col-8">
                                                    <p class="red pr-2 mb-2" >
                                                        <img :src="base_url + '/assets/images/22-mobile.svg'" alt="#" class="ml-2">
                                                        يتطلب شحن الرصيد لاكمال عملية السداد
                                                     </p>
                                                     <p class="red pr-2 mb-2" >
                                                        <img :src="base_url + '/assets/images/  money.svg'" alt="#" class="ml-2">
                                                        سيتم احتساب رسوم الخصم والشحن 
                                                     </p>
                                                   </div>
                                                   <div class="col-4">
                                                       <div class="btn grad btn-primary">
                                                        حفظ طلبك كمسوده
                                                        <img :src="base_url + '/assets/images/bookmark.svg'" alt="#" class="mr-2">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="total mt-3">
                                                   <p> الاجمالى : <span>1 $</span> </p>
                                                   <p> الرسوم : <span>1 $</span> </p>
                                                   <hr>
                                                   <p> الاجمالى : <span class="red">1 $</span> </p>
                                               </div>
                                               <div class="pay mt-4">
                                                   <p class="pay-title">
                                                    ادفع بامان من خلال احدي الوسائل التالية او <a href="#">
                                                        عدل سلة المشتريات
                                                    </a>
                                                   </p>
                                                   <div class="pay-way d-inline-block paypal">
                                                     <img :src="base_url + '/assets/images/paypal.svg'" alt="#">
                                                     PayPal
                                                   </div>
                                                   <div class="pay-way d-inline-block mr-5 card">
                                                    <img :src="base_url + '/assets/images/credit-card.svg'" alt="#">
                                                    عدد الايام.....
                                                  </div>
                                                  <br>
                                                  <div class="pay-way d-inline-block other">
                                                    <img :src="base_url + '/assets/images/5.svg'" alt="#">
                                                    عدد الايام.....
                                                  </div>
                                                  <div class="pay-way d-inline-block mr-5 bank">
                                                   <img :src="base_url + '/assets/images/bank.svg'" alt="#">
                                                   تحويل بنكي
                                                 </div>
                                               </div>
                                        </div>
                                        <div class="btns text-center mb-5">
                                        <div class="btn btn-primary page1 small cont " data-progress="2" data-page="2">
                                            التالى
                                        </div>
                                        <div class="btn btn-secondary small conta-back">
                                            العودة
                                        </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div class="col-lg-5">
                            <br>
                        </div>
                            </div>
                        </div>
              </div>
          </div>
      </section>
</template>
<script>
export default {
  data(){
    return{
      base_url:base_url
    };
  },
}
</script>
<style scoped>

</style>