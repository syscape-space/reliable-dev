<template>
  <template v-if="$parent.offers.data && $parent.offers.data.length">
    <template v-for="offer in $parent.offers.data">
      <div class="p-3" style="background-color: #F9F9F9;" v-if="$parent.order && offer && (offer.vendor.id == $root.auth_user.id || $parent.order.user_id.id == $root.auth_user.id)">
        <div class="btw-flex">
          <div class="my-2" style="font-size: 12px;">
                    <span class="ms-3">
                      <img
                          style="width: 15px;"
                          class="ms-1"
                          :src="base_url+'/assets/images/o_clock.svg'"
                          alt=""> <span> {{ offer.created_at }} </span>
                    </span>
            <span class="ms-3">
                      <img
                          style="width: 20px;"
                          class="ms-1"
                          :src="base_url+'/assets/images/o_eye.svg'"
                          alt=""> <span> عدد 0 اعمال </span>
                    </span>
            <span class="ms-3">
                      <img
                          style="width: 14px;"
                          class="ms-1"
                          :src="base_url+'/assets/images/o_map.svg'"
                          alt=""> <span v-if="offer.vendor.country"> {{ offer.vendor.country.country_name_ar }} </span>
                           <span v-else > لم يحدد الدولة </span>
                    </span>
          </div>
          <div class="my-2" style="font-size: 12px;">
                    <span class="o-box ms-2">
                      <img
                          style="width: 15px;" class="ms-1" :src="base_url+'/assets/images/o_delever.svg'"
                          alt="">
                      <span> {{ $root._t("app.deliveryTime") }} :</span>
                      <span class="me-2"> {{ offer.execution_time }} يوم </span>
                    </span>
            <span class="o-box o-box2">
                      <img
                          style="width: 15px;" class="ms-1" :src="base_url+'/assets/images/o_payment.svg'"
                          alt="">
                      <span> {{ $root._t("app.theAmount") }} </span>
                      <span class="me-2"> {{ offer.price }} </span>
                    </span>
          </div>
        </div>
        <div class="row w-100 mx-0 px-0">
          <div class="col-md-3 mt-3 mb-5 text-center d-flex align-items-center justify-content-between"
               style="border-left: 3px solid #ddd;"> 
              <img style="width:70px;width:70px;border-radius:50%" :src="cloud_url + offer.vendor.photo_profile" alt="">
          </div>
          <div class="col-md-9">
            <p class="py-3 f-12">
              {{ offer.vendor_comment }}
            </p>
            
          </div>
          <div class="text-center" v-if="$parent.order && $parent.order.user_id.id == $root.auth_user.id">
            <button style="
                      height: 38px;
                        border: 0;
                        background-color: #048e81;
                        color: #fff;
                        font-size: 12px;
                        padding: 0 40px;
                      " class="rounded"
                      @click.prevent="acceptOffer( $parent.offers.data[0].id )">
              {{ $root._t("app.acceptOffer") }}
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
  name: "OffersList",
  data(){
    return{
      base_url:base_url,
      cloud_url:cloud_url,
    }
  },
  methods:{
    acceptOffer( id ){
      api
        .put("v1/accept_offer/"+id)
        .then((response) => {
          this.$root.alertSuccess('approved') ;
          this.$router.push({ name: "offerOrder2Page" , params:{id:id} });
          console.log(response);
        })
        .catch((e) => {
          console.log(e.response);
        });
    }
  },
  computed:{

  },
  mounted() {

  }
}
</script>

<style scoped>

</style>