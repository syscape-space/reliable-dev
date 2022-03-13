<template>
    <section>
      <div class="dash">
        <div class="head-dash">
          <div>
            <div
              class="pt-4 text-center mawtheq-head d-flex justify-content-center"
              >
              <p class="m-0">
                <img
                  :src="base_url+'/assets/images/dash-mawthq.svg'"
                  class="ms-2"
                  alt=""
                  srcset=""
                />
                موثق
              </p>
            </div>
            <div class="text-center py-4">
              <div class="image-user position-relative d-inline-block">
                <img :src="base_url+'/assets/images/dash-user.png'" alt="" srcset="" />
                <img
                  style="position: absolute; bottom: 0; left: 0"
                  :src="base_url+'/assets/images/dash-edit.svg'"
                  alt=""
                  srcset=""
                />
              </div>
              <h4
                class="mt-3"
                style="color: #fff; font-size: 16px; margin-bottom: 0px"
              >
                {{ name }}
              </h4>
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
                  <span>الرئيسية</span>
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
                  <span>حسابى</span>
                </router-link>
              </li>
              <li>
                <router-link :to="{ name : 'palance' }">
                  <img
                    :src="base_url+'/assets/images/dash-balance.svg'"
                    style="width: 19px"
                    alt=""
                    srcset=""
                  />
                  <span>الرصيد</span>
                </router-link>
              </li>
              <li>
                <a href="#">
                  <img
                    :src="base_url+'/assets/images/dash-project.svg'"
                    style="width: 19px"
                    alt=""
                    srcset=""
                  />
                  <span>مشاريعى</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <img
                    :src="base_url+'/assets/images/dash-remem.svg'"
                    style="width: 18px"
                    alt=""
                    srcset=""
                  />
                  <span>تذكارى</span>
                </a>
              </li>
              <li>
                <a href="#"> موثق </a>
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
      base_url : base_url
    }
  },
  mounted() {
    this.currentUser();
  },
  methods: {
    currentUser() {
      api
        .get("/account?token=" + localStorage.getItem("token") )
        .then((response) => {
          this.name = response.data.user.name
        })
        // error.response.data.errors
        .catch((e) => {
          this.errors = e.response.data.errors;
          console.log(e.response);
        });
    },
  },
};
</script>