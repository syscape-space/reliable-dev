<template>
  
                <div class="boxes d-flex flex-column gap-5">
                    <div class="box-order">
                        <div class="info" v-if="order.user_id">
                            <div class="photo">
                                <img
                                    class="img-fluid"
                                   :src="cloud_url+ order.user_id.photo_profile"
                                    alt=""
                                />
                            </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="name" style="cursor:pointer;" @click="goToThisUserProfile(order.user_id['id'])">{{ order.user_id.name }}</p>
                            <p class="job">{{ order.department_id.department_name_ar }}</p>
                        </div>
                        <div class="text">
                            <div
                                class="data flex-wrap d-flex justify-content-between align-items-center"
                            >
                                <div class="order-num mb-3 mb-lg-0">
                                    <!-- طلب رقم: <span class="count">545121</span> -->
                                </div>
                                <div
                                    :class="`d-flex flex-wrap align-items-center gap-3 ${(user.membership_type == 'vendor')?'gap-md-44':'gap-md-4'}`"
                                >
                                <div class="deta" v-if="user.membership_type == 'vendor'">
                                        <i class="fas fa-calendar-day"></i>
                                        {{ order.created_at }} 
                                    </div>
                                    <div class="deta" v-else>
                                        <i class="fas fa-calendar-day"></i>
                                        {{ order.execution_time }} {{ $root._t("app.day") }}
                                    </div>
                                    
                                    <div class="view">
                                        <i class="fas fa-eye"></i> {{ order.views }}
                                        مشاهده
                                    </div>
                                    <div class="deta" v-if="user.membership_type == 'vendor'">
                                        <i class="fas fa-clock"></i>
                                       منذ {{ new Date().getHours() - new Date(order.created_at).getHours() }} ساعات 
                                    </div>
                                    <div class="deta" v-else>
                                        <i class="fas fa-clock"></i>
                                        {{ $root._t("app.deliveryTime") }}
                                    </div>

                                    <div class="deta" v-if="user.membership_type == 'user'">
                                        <i class="fa fa-money-bill"></i>
                                        عدد {{ order.offers.length }} عروض
                                    </div>
                                    <tamplate v-if="user.membership_type == 'user'">
                                        <div class="deta" v-if="order.city_id === null">
                                            <i class="fa fa-map-marker"></i>
                                            كل المدن
                                        </div>
                                        <div class="deta" v-else>
                                            <i class="fa fa-map-marker"></i>
                                            {{ order.city_id.city_name_ar }}
                                        </div>
                                    </tamplate>


                                    <div class="duration"  v-if="user.membership_type == 'user'">
                                        <i class="fas fa-clock"></i>

                                        {{ order.execution_time }} {{ $root._t("app.day") }}
                                    </div>
                                    <a href="" class="setting">
                                        <i
                                            class="fas fa-ellipsis-vertical"
                                        ></i>
                                    </a>
                                </div>
                            </div>
                            <h5 class="title" @click.prevent="showThisOrderDetails(order.hash_code)" style="cursor: pointer;">
                                {{ order.order_title }}
                            </h5>
                            <div
                                class="d-flex align-items-center justify-content-between flex-wrap"
                            >
                                <p class="content" v-html="order.order_content.substring(0,40)+'..'">
                                    
                                </p>
                                <button class="btn depts_btn" v-if="user.membership_type == 'vendor'">
                                    {{order.department_id.department_name_ar}}
                                </button>

                                <div v-if="user.membership_type != 'vendor'"
                                    class="group-btn m-auto m-lg-0 d-flex flex-column gap-3"
                                >
                                    <a href="" class="btn new"> {{ $root._t("app." + order.order_status) }}</a>

                                    
                                    <!-- <router-link v-if="order && order.negotiable === 'yes' && $root.auth_user.membership_type === 'user'"
                       :to="{name:'order_negotiations',params:{id:order.id}}"
                       class="btn negotiate">
            التفاوض
            <span v-html="order.negotiations.length">

                    </span>
          </router-link> -->
                                </div>
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
      user:[]
    };
  },
  methods: {
    showThisOrderDetails(code) {
      this.$router.push({name: "ShowSingleOrder", params: {code: code}});
    },
    goToThisUserProfile(user_id) {
      this.$router.push({name: "UserProfile",params:{id:user_id}});
    },
        currentUser() {
            let i =this
      api
        .get("/v1/account")
        .then((response) => {
          i.user = response.data.data;
          console.log(30,i.user);
        })
        // error.response.data.errors
        .catch((e) => {
        //   this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
  },
  created(){
    console.log(20,this.order.user_id['membership_type'])
        this.currentUser();

  }
}
</script>

<style scoped>
@media (min-width: 768px){
.gap-md-44 {
    gap: 3rem!important;
}
.gap-md-4 {
    gap: 1.5rem!important;
}
}
.depts_btn{
        background: transparent;
    border: 2px solid #0491e8;
    width: 145px;
    padding: 10px 0 10px 0;
}
</style>

