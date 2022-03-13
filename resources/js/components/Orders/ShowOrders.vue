<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <span>الرئيسية / المشاريع / القسم الرئيسي / القسم الفرعي</span>
          <div class="row w-100 mx-0 px-0">
            <div class="col-lg-9">
              <div class="row w-100 mx-0 px-0">
                <div class="col-md-4 my-4" style="color: #AEAEAE;">
                  <div class="cir-prog" style="border-color: #048e81;">
                    <img :src="base_url + '/assets/images/o_hand.svg'" alt="">
                  </div>
                  <div 
                    class="fw-bold o-num text-center"
                    style="color: #048e81;;">
                    01
                  </div>
                  <div>
                    <h6 class="o-txt text-center" style="color: #0995EB; ">
                      التفاوض
                    </h6>
                  </div>
                </div>
                <div class="col-md-4 my-4" style="color: #AEAEAE;">
                  <div class="cir-prog">
                    <img :src="base_url + '/assets/images/o_exe.svg'" alt="">
                  </div>
                  <div class="fw-bold o-num text-center">
                    02
                  </div>
                  <div>
                    <h6 class="o-txt text-center" >
                      التنفيذ
                    </h6>
                  </div>
                </div>
                <div class="col-md-4 my-4" style="color: #AEAEAE;">
                  <div class="cir-prog">
                    <img :src="base_url + '/assets/images/o_roket.svg'" alt="">
                  </div>
                  <div class="fw-bold o-num text-center">
                    03
                  </div>
                  <div>
                    <h6 class="o-txt text-center" >
                      الانهاء
                    </h6>
                  </div>
                </div>
              </div>
              <div>
                <h5 class="fw-bold g-color">تفاصيل المشروع</h5>
                <p style="font-size:12px">
                  لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت  لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت  لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت 
                </p>
              </div>
              <div 
                class="py-2 px-3 d-inline-block rounded f-14"
                style="color: #2B7B74;background-color: #EBFFFD;">
                <span class="ms-3 fw-bold">ميزانية المشروع</span>
                <span>500 $ - 200 $</span>
              </div>
              <div class="my-4 btw-flex">
                <span>العروض التقديمية</span>
                <span>
                  <button
                    class="btn-offer text-white mx-2"
                     style="background-color: #0995EB;">الاحدث</button>
                  <button class="btn-offer">الاقدم</button>
                </span>
              </div>
              <div class="p-3" style="background-color: #F9F9F9;">
                <div class="btw-flex">
                  <div class="my-2" style="font-size: 12px;">
                    <span class="ms-3">
                      <img 
                      style="width: 15px;" 
                      class="ms-1"
                      :src="base_url + '/assets/images/o_clock.svg'" alt=""> <span>منذ 4 ساعات</span>
                    </span>
                    <span class="ms-3">
                      <img 
                      style="width: 20px;" 
                      class="ms-1"
                      :src="base_url + '/assets/images/o_eye.svg'" alt=""> <span>عدد 5 اعمال</span>
                    </span>
                    <span class="ms-3">
                      <img 
                      style="width: 20px;" 
                      class="ms-1"
                      :src="base_url + '/assets/images/o_offer.svg'" alt=""> <span>مقدم 5 عروض</span>
                    </span>
                    <span class="ms-3">
                      <img 
                      style="width: 14px;" 
                      class="ms-1"
                      :src="base_url + '/assets/images/o_map.svg'" alt=""> <span>السعودية</span>
                    </span>
                  </div>
                  <div class="my-2" style="font-size: 12px;">
                    <span class="o-box ms-2">
                      <img 
                      style="width: 15px;" class="ms-1" :src="base_url + '/assets/images/o_delever.svg'" alt="">
                      <span>مده التسليم:</span>
                      <span class="me-2">14 يوم</span>
                    </span>
                    <span class="o-box o-box2">
                      <img 
                      style="width: 15px;" class="ms-1" :src="base_url + '/assets/images/o_payment.svg'" alt="">
                      <span>:المبلغ:</span>
                      <span class="me-2">100 $</span>
                    </span>
                  </div>
                </div>
                <div class="row w-100 mx-0 px-0">
                  <div class="col-md-3 text-center d-flex align-items-center justify-content-between" style="border-left: 3px solid #ddd;">
                    <img :src="base_url + '/assets/images/user.svg'" alt="">
                  </div>
                  <div class="col-md-9">
                    <p class="py-3 f-12" >
                      لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت  لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت  لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت 
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div>
                <div class="bg-users f-14 p-3 text-center" 
                style="background-image: linear-gradient(to bottom, #FF584D20, #802C2710); border-radius: 8px; background-color: transparent;">
                  <h6 style="font-size: 13px;"  class="">بطاقة مشروع</h6>
                  <h6 style="font-size: 13px;" >القسم الرئيسي  - القسم الفرعي</h6>
                  <ul class="list-unstyled px-0 f-12 text-end mt-4">
                    <li class="mb-3 f-12">
                      <span>حالة المشروع</span>
                      <button
                        class="o_btn d-inline-block px-3 py-2 rounded"
                        style="margin-right: 15px;"
                        >مفتوح</button>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px;" class="d-inline-block">تاريخ النشر</span>
                     <span 
                        style="margin-right: 15px;color: #0995EB;"
                        class="fw-bold ">منذ 20 ساعة</span>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px;" class="d-inline-block">مده التنفيذ</span>
                     <span 
                        style="margin-right: 15px;color: #0995EB;"
                        class="fw-bold ">يوم 1</span>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px;" class="d-inline-block">عدد العروض</span>
                     <span 
                        style="margin-right: 15px;color: #0995EB;"
                        class="fw-bold ">عدد 15 عرض</span>
                    </li>
                    <li class="mb-3">
                      <span style="min-width: 60px;" class="d-inline-block">صاحب المشروع</span>
                    
                    </li>
                    <li class="mb-3 mt-4 text-center">
                      <div class="text-center mb-2">
                        <img style="width: 50px;height: 50px;" class="uses-img" :src="base_url + '/assets/images/user.svg'" alt="">
                      </div>
                      <div class="text-center"> 
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star yellow"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <span class="text-center ">محمد مصطفي</span> <br>
                      <span style="color: #2B7B74;" class="mb-2 d-inline-block text-center">محامي عام </span>
                    
                    </li>
                  </ul>
                </div>
              </div>
              <div class="div-save p-2 mt-4 ">
                <div class="d-flex align-items-center">
                  <div>
                    <img style="width: 40px;margin-left: 8px;" :src="base_url + '/assets/images/o_save.svg'" alt="">
                  </div>
                  <div class="text-white">
                    <img  :src="base_url + '/assets/images/sm-logo-w.svg'" alt=""> <br>
                    <span style="font-size: 10px;">
                      <span>ضمان 100% لأموالك</span> 
                      <span style="margin-top: -3px; display: block;">وطلباتك بنفس الوقت</span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="p-2 mt-4 f-12" style="background-color: #E9EFEE;">
                <span class="ms-2 fw-bold">شاركه الان</span>
                <span>
                  <a href="" class="me-1">
                    <img style="width: 16px;" :src="base_url + '/assets/images/o_face.svg'" alt="">
                  </a>
                  <a href="" class="me-1">
                    <img style="width: 20px;" :src="base_url + '/assets/images/o_linked.svg'" alt="">
                  </a>
                  <a href="" class="me-1">
                    <img style="width: 20px;" :src="base_url + '/assets/images/o_twitter.svg'" alt="">
                  </a>
                  <a href="" class="me-1">
                    <img style="width: 20px;" :src="base_url + '/assets/images/o_youtube.svg'" alt="">
                  </a>
                  <a href="" class="me-1">
                    <img style="width: 20px;" :src="base_url + '/assets/images/o_copy.svg'" alt="">
                  </a>
                </span>
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