<template>
    <section>
      <div class="dash">
        <div class="head-dash">
          <div>
            
            <div class="text-center pt-4">
              <div class="image-user position-relative d-inline-block">
                <img style="width: 140px; height: 140px; border-radius: 50%;" :src="user?.photo_profile != null ? cloud_url + user?.photo_profile : base_url+ '/assets/images/dash-user.png'" alt="" srcset="" />
                
                <p class="m-0" style="position: absolute; bottom: 1px; left: -8px; background-color: #fff; padding: 5px; border-radius: 5px;">
                <img
                  :src="base_url+'/assets/images/dash-mawthq.svg'"
                  class="ms-2"
                  alt=""
                  srcset=""
                />
                موثق
              </p>
              </div>
              <h4
                class="mt-3"
                style="color: #fff; font-size: 16px; margin-bottom: 0px"
              >
                {{ user.name }}
              </h4>
              <p>
                <span class="w-100 text-white" v-if="$root.auth_user.main_department">{{$root.auth_user.main_department.department_name_ar}}</span>
              </p>
              <p>
                <span class="w-100 text-white" v-if="$root.auth_user.sub_department">{{$root.auth_user.sub_department.department_name_ar}}</span>
              </p>
            </div>
             <div class="pt-2 text-center mawtheq-head d-flex justify-content-center">
                <p class="m-0 bg-transparent text-white border px-3" style="width:auto" v-if="user.membership_type === null">
                  الرئيسية
                </p>
             </div>
             <div class="pt-0 text-center mawtheq-head d-flex justify-content-center">
                <p class="m-0 bg-transparent text-white border px-3" style="width:auto" v-if="user.membership_type === null">
                  {{ $root._t("app.withoutMemberShip") }}
                </p>
                  <p class="m-0 bg-transparent text-white border px-3" style="width:auto" v-else>
                    {{ $root._t("app."+user.membership_type) }}
                </p>
              </div>
            <div
              class="pt-4 text-center mawtheq-head d-flex justify-content-center"
              >
              
            </div>
            <ul class="px-0 list-unstyled text-center dash-list mt-0">
              <li class="active">
                <router-link :to="{ name : 'profilePage' }">
                  <img
                    :src="base_url+'/assets/images/dash-home.svg'"
                    style="width: 18px"
                    alt=""
                    srcset=""
                  />
                  <span>{{ $root._t("app.home") }} </span>
                </router-link>
              </li>
              <li>
                <router-link :to="{ name : 'u_indexPage' }">
                  <img
                    :src="base_url+'/assets/images/dash-user.svg'"
                    style="width: 16px"
                    alt=""
                    srcset=""
                  />
                  <span>{{ $root._t("app.myAccount") }} </span>
                </router-link>
              </li>
              <li>
                <router-link :to="{ name : 'Balance' }">
                  <img
                    :src="base_url+'/assets/images/dash-balance.svg'"
                    style="width: 19px"
                    alt=""
                    srcset=""
                  />
                  <span>{{ $root._t("app.myBalance") }} </span>
                </router-link>
              </li>
              <!-- <li>
                <a href="#">
                  <img
                    :src="base_url+'/assets/images/dash-project.svg'"
                    style="width: 19px"
                    alt=""
                    srcset=""
                  />
                  <span>{{ $root._t("app.myProjects") }} </span>
                </a>
              </li> -->
              <li>
                <a  @click.prevent="goToTazkarty(user.id)" style="color:#fff; cursor: pointer;">
                  <img
                    :src="base_url+'/assets/images/dash-remem.svg'"
                    style="width: 18px"
                    alt=""
                    srcset=""
                  />
                  <span>{{ $root._t("app.memorial") }}</span>
                </a>
              </li>
              <li v-if="$root.auth_user.membership_type === 'vendor'">
                <router-link :to="{name:'Subscription'}"   style="color:#fff; cursor: pointer;">
                  <img
                    :src="base_url+'/assets/images/dash-remem.svg'"
                    style="width: 18px"
                    alt=""
                    srcset=""
                  />
                  <span>الاشتراك</span>
                </router-link>
              </li>
              <li v-if="user.membership_type === 'vendor'" class="mt-2">
                <router-link class="mt-0" :to="{ name : 'ShowAllOrders' }" style="color:#fff; cursor: pointer; margin-top: 20px;">
                  <img
                    :src="base_url+'/assets/images/dash-remem.svg'"
                    style="width: 18px"
                    alt=""
                    srcset=""
                  />
                  <span> كل الطلبات </span>
                </router-link>
              </li>
              <li class=""  v-if="$root.auth_user.membership_type === 'user'">
                <a href="#" id="panelsStayOpen-headingTwo" style="width:150px">
                  <img
                      :src="base_url+'/assets/images/o_under.svg'"
                      style="width: 18px"
                      alt=""
                      srcset=""
                  />
                  <span  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">  طلباتي <i class="fas fa-angle-down me-2"></i></span>
                </a>
                <div id="panelsStayOpen-collapseTwo" class=" collapse " aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="">
                    <ul class="list-unstyled">
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:''}}">كل الطلبات</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'archived'}}">{{ $root._t("app.drafts") }}</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'under_review'}}">{{ $root._t("app.waitting") }}</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'open'}}"> المفتوحة</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'refused'}}">{{ $root._t("app.rejected") }}</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'ongoing'}}">تحت التنفيذ</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'done'}}">اكتملت</router-link>
                      </li>
                      <li class="mt-2 text-white">
                        <router-link :to="{name:'MyOrder',params:{status:'closed'}}">مغلقه</router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
             
            </ul>
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
      base_url : base_url,
      cloud_url: cloud_url,
      user:[],
    }
  },
  mounted() {
    this.currentUser();
  },
  methods: {
    currentUser() {
      api
        .get("/v1/account")
        .then((response) => {
          this.user = response.data.data;
          console.log(response.data.data.photo_profile);
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
    goToTazkarty(id){
      localStorage.setItem("myIdTazkarty", id);
      this.$router.push({ name: "Ticket2" });
    }
  },
};
</script>