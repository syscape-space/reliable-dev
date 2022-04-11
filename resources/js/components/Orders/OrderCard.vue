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
                    :src="base_url+'/assets/images/o_eye.svg'"
                    alt=""
                />
                <span> المشاهدات {{ order.views }} </span>
              </span>
      <span class="ms-3">
                <img
                    style="width: 14px"
                    class="ms-1"
                    :src="base_url+'/assets/images/o_map.svg'"
                    alt=""
                />
        <!--  -->
                <span v-if="order.city_id === null">كل المدن</span>
                <span v-else> {{ order.city_id.city_name_ar }}</span>
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
                  <span class="me-2"> {{ order.execution_time }} {{ $root._t("app.day") }}</span>
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
      <div style="border-left: 3px solid #ddd" class="px-3" v-if="order.user_id">
        <img
            style="width: 70px;height:70px;border-radius:50%"
            :src="cloud_url+ order.user_id.photo_profile"
            alt=""
        />
        <div>
                  <span
                      style="color: #2b7b74; text-decoration: underline; cursor:pointer;"
                      class="mb-1 d-inline-block text-center"
                      @click="goToThisUserProfile(order.user_id['id'])"
                  >{{ order.user_id.name }}
                  </span>
        </div>

        <div>
                  <span
                      style="color: #2b7b74;font-size:14px"
                      class="mb-2 d-inline-block text-center"
                  >{{ order.department_id.department_name_ar }}
                  </span>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="clicker" @click.prevent="showThisOrderDetails(order.id)" style="cursor: pointer;">
        <h6 style="color: #048e81;font-size:20px">{{ order.order_title }}</h6>
        <!-- v-html=" order.order_content.split(' ')[0]" -->
        <!-- <h6 style="color: #048e81">{{ $root._t("app.orderContent") }}</h6> -->
        <p class="pb-3 f-12 mb-0" v-html="order.order_content.substring(0,40)+'..'">
        </p>
      </div>
      <div class="mt-3 btw-flex">
        <div></div>
        <div class="text-center">
          <router-link v-if="order && order.negotiable === 'yes' && $root.auth_user.membership_type === 'user'"
                       :to="{name:'order_negotiations',params:{id:order.id}}"
                       class="btn  btn-offer" style="    border: 0px;
                  background-color: rgb(10 149 235);
                  color: rgb(255, 255, 255);
                  font-size: 12px;
                  padding: 9px 40px;
                  height: 40px;
                  white-space: nowrap;
                  width: auto;
                  margin-left: 5px;
              ">
            مفاوضات
            <span v-html="order.negotiations.length">

                    </span>
          </router-link>
          <button
              style="
                      border: 0;
                      background-color: #4ac272;
                      color: #fff;
                      font-size: 12px;
                      padding: 0 40px;
                      height: 40px;
                    "
              class="rounded btn-sm"
          >
            {{ $root._t("app." + order.order_status) }}
          </button>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import api from "../../utils/api";

export default {
  props: ['order'],
  name: "OrderCard",
  data() {
    return {
      base_url: base_url,
      cloud_url: cloud_url,
    };
  },
  methods: {
    showThisOrderDetails(id) {
      this.$router.push({name: "ShowSingleOrder", params: {id: id}});
    },
    goToThisUserProfile(user_id) {
      this.$router.push({name: "UserProfile",params:{id:user_id}});
    }
  }
}
</script>

<style scoped>

</style>