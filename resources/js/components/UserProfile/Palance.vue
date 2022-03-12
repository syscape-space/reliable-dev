<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <div class="btw-flex">
            <h6 class="my-4">رصيد حسابك</h6>
            <div class="">
              <button class="bl-btn">سحب رصيد</button>
              <button class="bl-btn" style="background-color: #0995EB;">شحن رصيد</button>
            </div>
          </div>
          <div class="bl-money p-4">
            <div class="row w-100 mx-0 px-0">
              <div class="col-md-4">
                <div class="btw-flex lf-bor py-4">
                  <img :src="base_url+'/assets/images/balance-money.svg'" alt="">
                  <div class="text-center">
                    <div class="mb-2">الرصيد الكلي</div> 
                    <span style="font-size: 28px;color: #339858;">1500 $</span>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <p class="py-3">
                  صفحة الرصيد تحتوي على ملخص للرصيد الموجود في حسابك سواء الذي 
                  قمت بشحنه أو قمت ببدئ صفقات به أو حتى ربحته من بيع أحد الخدمات 
                  أو تنفيذ المشاريع ، مع العلم أنه يمكنك استرداد المبالغ المشحونة أو أجزاء 
                  منها في حالة لم تجد المنفذ المناسب لأعمالك في أي وقت على نفذلي
                </p>
              </div>
            </div>
          </div>
          <div class="row w-100 mx-0 px-0 mt-5">
            <div class="col-md-4 mb-2">
              <div class="bl-money p-4">
                <div class="text-center mb-3">
                  <img style="width: 45px;" :src="base_url+'/assets/images/balance-hand.svg'" alt="">
                </div>
                <div>
                  <h6 class="text-center">
                    الرصيد القابل للسحب
                  </h6>
                  <div style="color: #3BB234;font-size: 25px;" class="text-center">
                    500 $
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-2">
              <div class="bl-money p-4">
                <div class="text-center mb-3">
                  <img style="width: 45px;" :src="base_url+'/assets/images/balance-coin.svg'" alt="">
                </div>
                <div>
                  <h6 class="text-center">
                    الرصيد المعلق
                  </h6>
                  <div style="color: #3BB234;font-size: 25px;" class="text-center">
                    500 $
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-2">
              <div class="bl-money p-4">
                <div class="text-center mb-3">
                  <img style="width: 45px;" :src="base_url+'/assets/images/balance-box.svg'" alt="">
                </div>
                <div>
                  <h6 class="text-center">
                    الرصيد المتاح
                  </h6>
                  <div style="color: #3BB234;font-size: 25px;" class="text-center">
                    500 $
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between my-2">
            <span>حساب فواتيرك</span>
            <a href="" style="color: #2B7B74;">مشاهده كل فواتيري</a>
          </div>
          <div>
            <div class="bl-money py-2 btw-flex px-2 mb-2">
              <span>
                <span class=" text-white inv-c">
                  50 $
                </span>
                <span class="me-3">
                  تم شحن رصيدك بنجاح
                </span>
              </span>
              <span class="inv-c bg-white">
                <img class="" :src="base_url+'/assets/images/balance-paypal.svg'" alt="">
              </span>
            </div>
            <div class="bl-money py-2 btw-flex px-2 mb-2">
              <span>
                <span class=" text-white inv-c">
                  50 $
                </span>
                <span class="me-3">
                  تم الخصم لطلب رقم 2500 قيد التنفيذ
                 </span>
              </span>
             
            </div>
            <div class="bl-money py-2 btw-flex px-2 mb-2">
              <span>
                <span class=" text-white inv-c">
                  50 $
                </span>
                <span class="me-3">تم دفع فاتورة الطلب رقم 2500 بنجاح</span>
              </span>
              <span class="">
                <button class="btn-inn">
                  <img :src="base_url+'/assets/images/balance-invoice.svg'" alt="">
                  فاتورة
                </button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
import api from "../../utils/api";

export default {
  data(){
    return{
      name : "" , 
      base_url : base_url
    }
  },
  mounted() {
    if( localStorage.getItem("token") === "" ){
                this.$router.push({ name: "Login" });
    }
  },
  methods: {
  },
};
</script>