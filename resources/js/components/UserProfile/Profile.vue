<template>

    <section class="content-body">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="contain">
              <div class="our-project pt-2">
                <img class="me-4 " style="width: 20px; " :src="base_url+'/assets/images/dash-project.svg'" alt="" srcset="">
                <span class="text-light me-2" 
                style="font-size: 14px;">مشاريعى</span>
              </div>
              <p class="text-center fs-4 my-3 text-light">5</p>
              <div class="text-start ms-3">
                <a href="#"
                style="text-decoration: underline !important;; font-size: 13px; color: #fff;"
              > إضافة طلب جديد </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="contain contain-2" style="background-color: #0995EB;">
              <div class="our-project pt-2">
                <img class="me-4 " style="width: 20px; " :src="base_url+'/assets/images/total-balanc.svg'" alt="" srcset="">
                <span class="text-light me-2" 
                style="font-size: 14px;"> الرصيد الكلى </span>
              </div>
              <p class="text-center fs-4 my-3 text-light">650</p>
              <div class="text-start ms-3">
                <a href="#"
                style="text-decoration: underline !important;; font-size: 13px; color: #fff;"
              > عرض الرصيد</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="contain contain-3" style="background-color: #363848">
              <div class="our-project pt-2">
                <img class="me-4 " style="width: 20px; " :src="base_url+'/assets/images/pull-balanc.svg'" alt="" srcset="">
                <span class="text-light me-2" 
                style="font-size: 14px;">رصيد يمكن سحبة</span>
              </div>
              <p class="text-center fs-4 my-3 text-light">500</p>
              <div class="text-start ms-3">
                <a href="#"
                style="text-decoration: underline !important; font-size: 13px; color: #fff;"
              > عرض الرصيد </a>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </section>
    
    <section class="requsts-sec mt-4  ">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="requsts">
              <div class="d-flex     align-items-center">
                <h2 class="mx-0 mb-3 ms-5" style="white-space: nowrap; font-size: 16px; color: #048E81;">الطلبات المفتوحة</h2>
                <div style="padding: 2px;" class="img-open-requst  text-center">
                  <img style="width: 15px;"  :src="base_url+'/assets/images/open-requset.svg'" alt="" srcset="">
                </div>
              </div>
              <div class="percent-requst mt-2">
                <div class="d-flex align-items-center justify-content-between mb-2" style="color: #363848;">
                <span class="  "  >25 طلب</span>
                <span> 24% </span>
                </div>
                <div class="line  rounded position-relative">
                  <div class=" linear-line rounded " style="width: 50%;"></div></div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="requsts">
              <div class="d-flex     align-items-center">
                <h2 class="mx-0 mb-3 ms-5" style="white-space: nowrap; font-size: 16px; color: #048E81;">الطلبات المرفوضة</h2>
              </div>
              <div class="percent-requst mt-2">
                <div class="d-flex align-items-center justify-content-between mb-2" style="color: #363848;">
                <span class="  "  >25 طلب</span>
                <span> 24% </span>
                </div>
                <div class="line  rounded position-relative"><div class=" linear-line rounded " style="width: 50%;"></div></div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="requsts">
              <div class="d-flex     align-items-center">
                <h2 class="mx-0 mb-3 ms-5" style="white-space: nowrap; font-size: 16px; color: #048E81;">الطلبات بانتظار المراجعة</h2>
              </div>
              <div class="percent-requst mt-2">
                <div class="d-flex align-items-center justify-content-between mb-2" style="color: #363848;">
                <span class="  "  >25 طلب</span>
                <span> 24% </span>
                </div>
                <div class="line  rounded position-relative"><div class=" linear-line rounded " style="width: 50%;"></div></div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-5">
            <div class="requsts">
              <div class="d-flex     align-items-center">
                <h2 class="mx-0 mb-3 ms-5" style="white-space: nowrap; font-size: 16px; color: #048E81;">الطلبات المكتملة  </h2>
              </div>
              <div class="percent-requst mt-2">
                <div class="d-flex align-items-center justify-content-between mb-2" style="color: #363848;">
                <span class="  "  >25 طلب</span>
                <span> 24% </span>
                </div>
                <div class="line  rounded position-relative"><div class=" linear-line rounded " style="width: 50%;"></div></div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-5">
            <div class="requsts">
              <div class="d-flex     align-items-center">
                <h2 class="mx-0 mb-3 ms-5" style="white-space: nowrap; font-size: 16px; color: #048E81;">طلبات يتم تنفيذها</h2>
              </div>
              <div class="percent-requst mt-2">
                <div class="d-flex align-items-center justify-content-between mb-2" style="color: #363848;">
                <span class="  "  >25 طلب</span>
                <span> 24% </span>
                </div>
                <div class="line  rounded position-relative"><div class=" linear-line rounded " style="width: 50%;"></div></div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-5">
            <div class="requsts">
              <div class="d-flex     align-items-center">
                <h2 class="mx-0 mb-3 ms-5" style="white-space: nowrap; font-size: 16px; color: #048E81;">الطلبات الملغية</h2>
              </div>
              <div class="percent-requst mt-2">
                <div class="d-flex align-items-center justify-content-between mb-2" style="color: #363848;">
                <span class="  "  >25 طلب</span>
                <span> 24% </span>
                </div>
                <div class="line  rounded position-relative"><div class=" linear-line rounded " style="width: 50%;"></div></div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-5">
            <div class="requsts">
              <div class="d-flex     align-items-center">
                <h2 class="mx-0 mb-3 ms-5" style="white-space: nowrap; font-size: 16px; color: #048E81;">الطلبات المغلقة</h2>
              </div>
              <div class="percent-requst mt-2">
                <div class="d-flex align-items-center justify-content-between mb-2" style="color: #363848;">
                <span class="  "  >25 طلب</span>
                <span> 24% </span>
                </div>
                <div class="line  rounded position-relative"><div class=" linear-line rounded " style="width: 50%;"></div></div>
                
              </div>
            </div>
          </div>
            <div class="col-lg-4 mt-5">
              <div class="requsts">
                <div class="d-flex     align-items-center">
                  <h2 class="mx-0 mb-3 ms-5" style="white-space: nowrap; font-size: 16px; color: #048E81;">اجمالي الطلبات</h2>
                </div>
                <div class="percent-requst mt-2">
                  <div class="d-flex align-items-center justify-content-between mb-2" style="color: #363848;">
                  <span class="  "  >25 طلب</span>
                  <span> 24% </span>
                  </div>
                  <div class="line  rounded position-relative"><div class=" linear-line rounded " style="width: 50%;"></div></div>
                  
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>

    <section class="call">
      <div class="row">
        <div class="col-lg-4">
          <button class="nooh-btn"> مركز المساعدة 
             <img style="width: 29px; margin-right: 20px;" :src="base_url+'/assets/images/call-help.svg'" alt="" srcset=""></button>
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

