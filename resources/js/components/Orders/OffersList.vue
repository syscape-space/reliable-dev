<template>
  <template v-if="offers.data && offers.data.length">
    <template v-for="offer in offers.data">
      <div class="p-3" style="background-color: #F9F9F9;" v-if="offer.vendor.id == $root.auth_user.id || order.user_id.id == $root.auth_user.id">
        <div class="btw-flex">
          <div class="my-2" style="font-size: 12px;">
                    <span class="ms-3">
                      <img
                          style="width: 15px;"
                          class="ms-1"
                          :src="base_url + '/public/assets/images/o_clock.svg'"
                          alt=""> <span> {{ offer.created_at }} </span>
                    </span>
            <span class="ms-3">
                      <img
                          style="width: 20px;"
                          class="ms-1"
                          :src="base_url + '/public/assets/images/o_eye.svg'"
                          alt=""> <span> {{ $root._t("app.numFiveWorks") }} </span>
                    </span>
            <span class="ms-3">
                      <img
                          style="width: 14px;"
                          class="ms-1"
                          :src="base_url + '/public/assets/images/o_map.svg'"
                          alt=""> <span> {{ offer.vendor.country.country_name_ar }} </span>
                    </span>
          </div>
          <div class="my-2" style="font-size: 12px;">
                    <span class="o-box ms-2">
                      <img
                          style="width: 15px;" class="ms-1" :src="base_url + '/public/assets/images/o_delever.svg'"
                          alt="">
                      <span> {{ $root._t("app.deliveryTime") }} :</span>
                      <span class="me-2"> {{ offer.execution_time }} يوم </span>
                    </span>
            <span class="o-box o-box2">
                      <img
                          style="width: 15px;" class="ms-1" :src="base_url + '/public/assets/images/o_payment.svg'"
                          alt="">
                      <span> {{ $root._t("app.theAmount") }} </span>
                      <span class="me-2"> {{ offer.price }} </span>
                    </span>
          </div>
        </div>
        <div class="row w-100 mx-0 px-0">
          <div class="col-md-3 mt-3 mb-5 text-center d-flex align-items-center justify-content-between"
               style="border-left: 3px solid #ddd;">
            <img height="70" :src="cloud_url + offer.vendor.photo_profile" alt="">
          </div>
          <div class="col-md-9">
            <p class="py-3 f-12">
              {{ offer.vendor_comment }}
            </p>
          </div>
          <div class="text-center">
            <button style="
                      height: 38px;
                        border: 0;
                        background-color: #048e81;
                        color: #fff;
                        font-size: 12px;
                        padding: 0 40px;
                      " class="rounded">
              {{ $root._t("app.acceptOffer") }}
            </button>
            <button style="
                      height: 38px;
                        border: 0;
                        background-color: #0995EB;
                        color: #fff;
                        font-size: 12px;
                        padding: 0 40px;
                      " class="rounded">
              {{ $root._t("app.negotiateNow") }}
            </button>
          </div>
        </div>
      </div>
    </template>
  </template>
  <template v-else>
    <h4 class="w-100 text-center">لا يوجد عروض</h4>
  </template>

</template>

<script>
import api from "../../utils/api";

export default {
  props:['order_id'],
  name: "OffersList",
  data(){
    return{
      offers:[],
      order:null,
      base_url:base_url,
      cloud_url:cloud_url,
    }
  },
  methods:{
    getOffers(){
      api.get('/v1/orderoffers?order_id='+this.$props.order_id).then(res=>{
        this.offers= res.data.data;
        api.get('/v1/orders/'+this.$props.order_id).then(res=>{
          this.order= res.data.data;
        })
      })
    }
  },
  mounted() {
    this.getOffers();
  }
}
</script>

<style scoped>

</style>