<template>
  <template v-if="$parent.offers.data && $parent.offers.data.length">
    <template v-for="offer in $parent.offers.data">
      <div class="p-3" style="background-color: #F9F9F9;"
           v-if="$parent.order && offer && (offer.vendor.id == $root.auth_user.id || $parent.order.user_id.id == $root.auth_user.id)">
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
                          alt=""> <span>  الطلبات المنجزة </span>
                    </span>
            <span class="ms-3">
                      <img
                          style="width: 14px;"
                          class="ms-1"
                          :src="base_url+'/assets/images/o_map.svg'"
                          alt=""> <span v-if="offer.vendor.country"> {{ offer.vendor.country.country_name_ar }} </span>
                           <span v-else> لم يحدد الدولة </span>
                    </span>
          </div>
          <div class="my-2" style="font-size: 12px;">
                    <span class="o-box ms-2">
                      
                      <span> مفاوضات <span class="badge bg-light text-dark">1</span></span>
                    </span>
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
          <div class="col-md-3 mt-3  text-center align-items-center justify-content-between"
               style="border-left: 3px solid #ddd;">
            <img style="width:70px;width:70px;border-radius:50%" :src="cloud_url + offer.vendor.photo_profile" alt="">
            <p class="py-3 f-12" @click="goToThisUserProfile(offer.vendor.id)"
               style=" text-decoration: underline; cursor:pointer;">
              {{ offer.vendor.name }}
            </p>
          </div>
          <div class="col-md-9">
            <button v-if="parseInt(offer.negotiable)" class="btn btn-primary btn-sm">قابل للتفاوض</button>
            <button v-else class="btn btn-primary btn-sm">غير قابل للتفاوض</button>
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
                        padding: 0 40px;"
                    class="rounded"
                    @click="acceptOffer( offer.id );"> <!--  -->
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
  data() {
    return {
      base_url: base_url,
      cloud_url: cloud_url,
    }
  },
  methods: {
    acceptOffer(id) {
      this.$swal({
        title: 'هل انت متأكد ؟',
        text: "سيتم نقل الطلب اللي المرحلة التالية مع مقدم الخدمة ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'الموافقة',
        cancelButtonText: 'الغاء'
      }).then((result) => {
        if (result.isConfirmed) {
          api.post("v1/accept_offer/" + id, {'_method': 'put'})
              .then((response) => {
                this.$root.alertSuccess('تم الموافقة بنجاح');
                this.$parent.gettingOrderDetails();
              })
              .catch((e) => {
                // console.log(e.response);
              });
        }
      })
    },
    goToThisUserProfile(user_id) {
      localStorage.setItem("userProfileId", user_id);
      this.$router.push({name: "UserProfile"});
    }
  },
  computed: {},
  mounted() {
  }
}
</script>

<style scoped>

</style>