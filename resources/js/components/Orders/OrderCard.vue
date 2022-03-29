<template>
  <div class="">
    <div class="mb-2 text-start" style="font-size: 12px">
      <!-- <span class="ms-3">
        <img
          style="width: 15px"
          class="ms-1"
          :src="base_url+'/assets/images/o_clock.svg'"
          alt=""
        />
        <span>منذ 4 ساعات</span>
      </span> -->

      <span class="ms-3">
                <img
                    style="width: 20px"
                    class="ms-1"
                    :src="base_url+'/assets/images/o_offer.svg'"
                    alt=""
                />
                <span>{{ $root._t("app.present") }} 0 {{ $root._t("app.offers") }}</span>
              </span>
      <span class="ms-3">
                <img
                    style="width: 14px"
                    class="ms-1"
                    :src="base_url+'/assets/images/o_map.svg'"
                    alt=""
                />
        <!--  -->
                <span v-if="order.country_id === null"> {{ $root._t("app.notRegisterCountry") }} </span>
                <span v-else> {{ $root._t("app.saudiAribianCompleteName") }}</span>
              </span>
      <span class="my-2" style="font-size: 12px">
                <span class="o-box ms-2">
                  <img
                      style="width: 15px"
                      class="ms-1"
                      :src="base_url+'/assets/images/o_delever.svg'"
                      alt=""
                  />
                  <span> {{ $root._t("app.deliveryTime") }} :</span>
                  <span class="me-2"> 0 {{ $root._t("app.day") }}</span>
                </span>
                <span>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
              </span>
    </div>
  </div>
  <div class="row w-100 mx-0 px-0">
    <div
        class="
                col-md-3
                text-center
                d-flex
                align-items-center
                justify-content-center
              "
    >
      <div style="border-left: 3px solid #ddd" class="px-3">
        <img
            style="width: 70px"
            :src="base_url+'/assets/images/user.svg'"
            alt=""
        />
        <div>
                  <span
                      style="color: #2b7b74"
                      class="mb-2 d-inline-block text-center"
                  >{{ order.user_id.name }}
                  </span>
        </div>

        <div>
                  <span
                      style="color: #2b7b74"
                      class="mb-2 d-inline-block text-center"
                  >{{ order.department_id.department_name_ar }}
                  </span>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="clicker" @click.prevent="showThisOrderDetails(order.id)" style="cursor: pointer;">
        <h6 style="color: #048e81">{{ $root._t("app.orderTitleHere") }}</h6>
        <p class="pb-3 f-12">
          {{ order.order_title }}
        </p>
        <!-- v-html=" order.order_content.split(' ')[0]" -->
        <h6 style="color: #048e81">{{ $root._t("app.orderContent") }}</h6>
        <p class="pb-3 f-12" v-html="order.order_content.substring(0,40)+'..'">
        </p>
      </div>
      <div class="mt-3 btw-flex">
        <div></div>
        <div class="text-center">
          <button
              style="
                      border: 0;
                      background-color: #4ac272;
                      color: #fff;
                      font-size: 12px;
                      padding: 0 40px;
                      height: 40px;
                    "
              class="rounded"
          >
            {{ $root._t("app."+order.order_status) }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import api from "../../utils/api";

export default {
  props:['order'],
  name: "OrderCard",
  data(){
    return{
      base_url:base_url,
      cloud_url:cloud_url,
    };
  },
  methods:{
    showThisOrderDetails(id){
      this.$router.push({ name: "ShowSingleOrder",params:{id:id} });
    },
  }
}
</script>

<style scoped>

</style>