<template>
  <div>
    <div class="dash" style="background-color:transparent">
      <div class="mt-3 head-dash r-bar text-center text-xl-end  me-1">
        <div class="row parent-boxes">
          <div class="col-xl-12 mb-3">
            <div class="box box-info">
              <div class="photo">
                <img
                    class="img-fluid"
                    :src="`${base_url}/assets/images/person.jpg`"

                    alt=""
                />
              </div>
              <h4 class="my-0" style="text-align: center; ">{{ user.name }}</h4>
              <p style="text-align: center; margin: 0;" v-if="$root.auth_user.membership_type === null">
                {{ $root._t("app.withoutMemberShip") }}</p>
              <p style="text-align: center; margin: 0;" v-else>{{
                  $root._t("app." + $root.auth_user.membership_type)
                }}</p>

              <img class="mt-2" :src="`${base_url}/assets/images/done.svg`" alt=""/>

              <!-- <i class="fa-solid fa-circle-check"></i> -->
            </div>
          </div>
          <div class=" col-xl-12 mb-3">
            <div class="box box-welcome pb-2">
              <h6>مرحبا مجددا {{ user.name }}</h6>
              <p>
                حسابك مكتمل بنسبة
                <span class="count">80%</span>
              </p>
              <div class="progress prog">
                <div
                    class="progress-bar prog-bar"
                    role="progressbar"
                    style="width: 80%"
                    aria-valuenow="80"
                    aria-valuemin="0"
                    aria-valuemax="100"
                ></div>
              </div>
              <!-- <a href="" class="btn">أكمل بيانات حسابك</a> -->
              <ul class="px-0 list-unstyled text-center dash-list mt-0">
                <li style="padding: 6px 5px;" class="active">
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
                <li style="padding: 6px 5px;">
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
                <li style="padding: 6px 5px;">
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
                <!-- <li style="padding: 6px 5px;">
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
                <li style="padding: 6px 5px;">
                  <a @click.prevent="goToTazkarty(user.id)" style="color:#fff; cursor: pointer;">
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
                  <router-link :to="{name:'Subscription'}" style="color:#fff; cursor: pointer;">
                    <img
                        :src="base_url+'/assets/images/dash-remem.svg'"
                        style="width: 18px"
                        alt=""
                        srcset=""
                    />
                    <span>الاشتراك</span>
                  </router-link>
                </li>
                <li v-if="user.membership_type === 'vendor'" class="">
                  <router-link class="mt-0" :to="{ name : 'ShowAllOrders' }"
                               style="color:#fff; cursor: pointer; margin-top: 20px;">
                    <img
                        :src="base_url+'/assets/images/dash-remem.svg'"
                        style="width: 18px"
                        alt=""
                        srcset=""
                    />
                    <span> كل الطلبات </span>
                  </router-link>
                </li>
                <li class="" v-else>
                  <a href="#" id="panelsStayOpen-headingTwo" style="width:150px">
                    <img
                        :src="base_url+'/assets/images/o_under.svg'"
                        style="width: 18px"
                        alt=""
                        srcset=""
                    />
                    <span type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                          aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">  طلباتي <i
                        class="fas fa-angle-down me-2"></i></span>
                  </a>
                  <div id="panelsStayOpen-collapseTwo" class=" collapse " aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="">
                      <ul class="list-unstyled">
                        <li class="mt-2 text-white">
                          <router-link :to="{name:'MyOrder',params:{status:''}}">كل الطلبات</router-link>
                        </li>
                        <template v-if="$root.auth_user.membership_type ==='judger'">
                          <li class="mt-2 text-white">
                            <router-link :to="{name:'MyOrder',params:{status:'pending'}}">طلبات بأنتظار قبول مقدم
                              الخدمة
                            </router-link>
                          </li>
                        </template>
                        <template v-else>
                          <li class="mt-2 text-white">
                            <router-link :to="{name:'MyOrder',params:{status:'archived'}}">{{
                                $root._t("app.drafts")
                              }}
                            </router-link>
                          </li>
                          <li class="mt-2 text-white">
                            <router-link :to="{name:'MyOrder',params:{status:'under_review'}}">
                              {{ $root._t("app.waitting") }}
                            </router-link>
                          </li>
                          <li class="mt-2 text-white">
                            <router-link :to="{name:'MyOrder',params:{status:'open'}}"> المفتوحة</router-link>
                          </li>
                          <li class="mt-2 text-white">
                            <router-link :to="{name:'MyOrder',params:{status:'refused'}}">{{
                                $root._t("app.rejected")
                              }}
                            </router-link>
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
                        </template>
                      </ul>
                    </div>
                  </div>
                </li>

              </ul>
            </div>
            <div class="card-client text-center rounded mb-2 py-3">
              <div class="box box-package">
                <p class="  " style="font-size: 16px;"> الرصيد الكلى: <span class="me-2 f-300 "
                                                                            style=" color: #0491e8 ;"> {{
                    $root.auth_user.current_balance
                  }} $ </span></p>
                <p class="  " style="font-size: 16px;font-weight:normal"> يمكن سحبة : <span class="me-2 f-300 "
                                                                                            style=" color: #0491e8 ;"> {{
                    $root.auth_user.current_balance
                  }} $ </span></p>
                <button class="show-balance btn w-100">عرض رصيدى</button>
              </div>
            </div>
          </div>
          <div class="col-xl-12 mb-5" v-if="$root.auth_user.current_subscription">
            <div class="box box-package">
              <div class="d-flex  align-items-center justify-content-center">
                <img class="ms-3" style="width: 18px;" :src="`${base_url}/assets/images/pkg.svg`" alt="" srcset="">
                <h6 class="mb-0" style="color: #000">{{$root.auth_user.current_subscription.package.package_title}}</h6>
              </div>
              <p style="font-weight: 400;" class="mb-0">
                ينتهي اشتراكك في
                <span class="deta">{{$root.auth_user.current_subscription.end_at}}</span>
              </p>
              <p style="font-weight: 400;">متبقي علي انتهاء اشتراكك</p>
              <p style="font-weight: 400;">{{$root.auth_user.current_subscription.remaining_days}} أيام</p>
              <div class="progress prog">
                <div
                    class="progress-bar prog-bar"
                    role="progressbar"
                    :style="'width: '+$root.auth_user.current_subscription.remaining_days / $root.auth_user.current_subscription.package.duration_package_days * 100 +'%'"
                    aria-valuenow="80"
                    aria-valuemin="0"
                    aria-valuemax="100"
                ></div>
              </div>
              <a href="" class="btn">أكمل بيانات حسابك</a>
            </div>
          </div>
          <div class="col-xl-12 mb-5" v-else>
            <div class="box box-package">
              <router-link :to="{name:'Subscription'}" class="btn">أكمل بيانات الاشتراك</router-link>
            </div>
          </div>
          <div class="col-12 col-xl-12 mb-5">
            <a href="" class="support">
              الدعم
              <i class="fas fa-comments"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import api from "../../utils/api";

export default {
  data() {
    return {
      name: "",
      base_url: base_url,
      cloud_url: cloud_url,
      user: [],
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
    goToTazkarty(id) {
      localStorage.setItem("myIdTazkarty", id);
      this.$router.push({name: "Ticket2"});
    }
  },
};
</script>

<style scoped>
/* Start Section */
:root {
  --green-color: #028e80;
  --green-color-two: #048e81;
  --dark-green-color: #2b7b74;
  --light-green-color: #ecf8ff;
  --grey-color: #808285;
  --grey-color-srction: #f6f6f6;
  --light-blue-color: #0491e8;
  --h-color: #314450;
  --red-color: #ff584d;
  --dark-red-color: #e53535;
  --prog-color: #c5c5c5;
}

@media (min-width: 1200px) {
  .r-bar {
    margin-top: -3.7rem;
  }
}

ul li {
  background: #048e81;
  padding: 5px 0 5px 0;
  border-radius: 2px;

}

.parent-boxes .box-package i[class="fas fa-ribbon"] {
  position: absolute;
  right: 15px;
  width: 23px;
  color: #0491e8;
  height: 32px;
  top: -15px;
  font-size: 25px;
}

.parent-boxes .box {
  background-color: #ecf8ff;
  text-align: center;
  padding: 20px 15px;
  border-radius: 8px;

}

.box-info .photo {
  overflow: hidden;
  width: 85px;
  height: 85px;
  border-radius: 50%;
  display: inline-flex;
  align-items: center;

  background-color: white;
  justify-content: center;
}

.box-info .photo img {
  width: 100%;
}

.box-info h4 {
  font-size: 22px;
  color: #0491e8;
  font-weight: normal;
  margin: 15px auto;
}

.box-info p {
  font-size: 16px;
  margin: 25px auto 19px;
}

.box-info > img {
  color: var(--green-color);
  width: 28.2px;
}

.parent-boxes .box-welcome h6 {
  color: #0491e8;
  font-size: 14px;
  margin-bottom: 15px;
}

.parent-boxes .box-welcome p {
  font-size: 14px;
}

.parent-boxes .box-welcome p span {
  margin-right: 5px;
}

.parent-boxes .box-welcome .prog {
  border-radius: 4px !important;
  height: 8px;
  background-color: #c5c5c5 !important;
}

.parent-boxes .box-welcome .prog-bar {
  background-color: #048e81 !important;
}

.parent-boxes .box-welcome .btn {
  color: white !important;
  background-color: #0491e8 !important;
  display: block !important;
  max-width: 142px !important;
  text-align: center !important;
  border-radius: 18px !important;
  padding: 7.5px 5px;
  font-size: 12px !important;
  margin: 25px auto 0;
}

.parent-boxes .box-welcome .btn:hover {
  color: white !important;
}

.parent-boxes .box-package {
  position: relative;
}

.parent-boxes .box-package svg {
  position: absolute;
  right: 15px;
  width: 23px;
  color: var(--light-blue-color);
  height: 32px;
  top: -15px;
}

.parent-boxes .box-package h6 {
  color: #0491e8;
  font-size: 14px;
  margin-bottom: 15px;
}

.parent-boxes .box-package p {
  font-size: 14px;
}

.parent-boxes .box-package p:first-of-type {
  font-size: 14px;
  margin-bottom: 50px;

}

.parent-boxes .box-package p:nth-of-type(2) {
  font-size: 14px;
  margin-bottom: 15px;
}

.parent-boxes .box-package p:nth-of-type(3) {
  font-size: 14px;
  color: #e53535;
  text-align: right;
  margin-bottom: 15px;
}

.parent-boxes .box-package .prog {
  border-radius: 4px !important;
  height: 8px;
  background-color: #c5c5c5 !important;
  margin-bottom: 25px;
}

.parent-boxes .box-package .prog-bar {
  background-color: #e53535 !important;
}

.parent-boxes .box-package .btn {
  color: white !important;
  background-color: #0491e8 !important;
  display: block !important;
  max-width: 142px !important;
  text-align: center !important;
  border-radius: 18px !important;
  padding: 7.5px 5px;
  font-size: 12px !important;
  margin: 15px auto 0;
}

.parent-boxes .support {
  box-shadow: 15px 15px 20px #0000001a;
  max-width: 178px;
  display: flex;
  justify-content: center;
  gap: 10px;
  padding: 14.5px 5px;
  align-items: center;
  margin: auto;
  font-size: 22px;
  color: #048e81;
  text-align: center;
  border-radius: 25px;
  text-decoration: none;
}

.parent-boxes .support i[class="fas fa-comments"] {
  color: #0491e8;
  font-size: 31px;
}

.back h4 {
  color: var(--h-color);
}

.back .icon-back {
  background-color: #b8b8b8;
  width: 57px;
  border-radius: 9px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50px;
}

.back .icon-back {
  color: black;
  font-size: 15px;
}

.packages-available h6 {
  font-size: 18px;
  color: var(--h-color);
  margin-bottom: 1.5rem;
}

.packages-available .box {
  background-color: var(--light-green-color);
  text-align: center;
  padding: 25px 20px;
  border-radius: 8px;
}

.packages-available .box h4 {
  color: var(--h-color);
  font-size: 24px;
  margin-bottom: 30px;
}

.packages-available .box .price {
  color: var(--green-color-two);
  font-size: 26px;
  margin-bottom: 50px;
}

.packages-available .btn {
  max-width: 168px;
  width: 100%;
  color: white;
  outline: none;
  font-size: 20px;
  padding: 10.9px 5px;

  box-shadow: none;
  border: none;
  border-radius: 5px;
  background-color: var(--light-blue-color);
}

.packages-available .icon {
  width: 49.5px;
  height: 85px;
  overflow: hidden;
  display: flex;
  align-items: center;
  margin-right: 5px;
  justify-content: center;
  background-color: var(--light-green-color);
}

.packages-available .icon img {
  width: 100%;
}

.subscriptions .table-resp {
  padding: 25px;
  background-color: var(--light-green-color);

  overflow: auto;
}

.subscriptions table {
  overflow: hidden;
  text-align: center;
  width: 100%;
  border-radius: 8px;
}

.subscriptions table th {
  color: var(--light-blue-color);
}

.subscriptions table th,
.subscriptions table td {
  font-size: 18px;
  padding: 15px;
}

.subscriptions h6 {
  font-size: 18px;
  color: var(--h-color);
  margin-bottom: 1.5rem;
}

/* End Section */

</style>