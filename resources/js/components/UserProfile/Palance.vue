<template>
    <section class="personal-section mt-2">
      <div class="personal">
        <div class="personal-info">
          <div class="btw-flex">
            <h6 class="my-4">{{ $root._t("app.accountCharge") }}</h6>
            <div class="">
              <button class="bl-btn">{{ $root._t("app.balanceWithdrawal") }}</button>
              <button class="bl-btn" style="background-color: #0995EB;">{{ $root._t("app.chargeBalance") }}</button>
            </div>
          </div>
          <div class="bl-money p-4">
            <div class="row w-100 mx-0 px-0">
              <div class="col-md-4">
                <div class="btw-flex lf-bor py-4">
                  <img :src="base_url+'/assets/images/balance-money.svg'" alt="">
                  <div class="text-center">
                    <div class="mb-2">{{ $root._t("app.totalBalace") }}</div> 
                    <span style="font-size: 28px;color: #339858;">1500 $</span>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <p class="py-3">
                  {{ $root._t("app.longText") }}
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
                    {{ $root._t("app.balanceAbleToWithdrawal") }}
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
                    {{ $root._t("app.suspendedBalance") }}
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
                    {{ $root._t("app.availableBalance") }}
                  </h6>
                  <div style="color: #3BB234;font-size: 25px;" class="text-center">
                    500 $
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between my-2">
            <span> {{ $root._t("app.fawaterkAccount") }}</span>
            <a href="" style="color: #2B7B74;">مشاهده كل فواتيري</a>
          </div>
          <div>
            <div class="bl-money py-2 btw-flex px-2 mb-2">
              <span>
                <span class=" text-white inv-c">
                  50 $
                </span>
                <span class="me-3">
                  {{ $root._t("app.rechargingSuccessfully") }}
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
                  {{ $root._t("app.discoundDone") }}
                 </span>
              </span>
             
            </div>
            <div class="bl-money py-2 btw-flex px-2 mb-2">
              <span>
                <span class=" text-white inv-c">
                  50 $
                </span>
                <span class="me-3">{{ $root._t("app.requestAmountPayed") }}</span>
              </span>
              <span class="">
                <button class="btn-inn">
                  <img :src="base_url+'/assets/images/balance-invoice.svg'" alt="">
                  {{ $root._t("app.fatoorah") }}
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
    
  },
  methods: {
  },
};
</script>