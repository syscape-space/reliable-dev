<template>  
    <div class="container">
      <Navbar/>
    </div>
    <div class="row w-100 mx-0 px-0">
        <div class="col-md-6 px-0 ">
          <div class="p-5">
            <div class="text-center mt-5">
              <img style="width: 100px;" :src="base_url+'/assets/images/login-1-logo.svg'" alt="">
            </div>
            <div class="register text-center  ">
              <p class="my-4 ">ليس لديك حساب؟ 
                <router-link :to="{name:'Register'}"
                  href="#"
                  style="color: #048e81;"  
                class="">قم بانشاء حساب الان</router-link></p>
              <h3 class="mb-4"> تسجيل الدخول</h3>
            
            </div>
            <form action="" class="login-form text-center" style="max-width: 400px;margin: auto;">
              <small class="d-inline-block mb-4 text-end mx-auto" 
                style="max-width: 300px; color: #0995eb;">اتبع التعليمات لتسهيل عملية التسجيل وستكون كذلك
                قادرة على استكشاف الداخل.
              </small>
              <!--- Error Will Validate Here -->
              <div class="errors">
                <div class="alert alert-danger" v-for="error in errors" :key="error">
                  <strong>{{ error }}</strong>
                </div>
              </div>
              <div class="auth-login mb-4 text-center  position-relative">
                <input type="text" class="pe-5 form-control" placeholder="   البريد الالكتروني" v-model="email"> <!-- Phone number -->
                <img class="img-lllo" style="width: 20px; position: absolute; right: 10px;"
                :src="base_url+'/assets/images/login-user.svg'" alt="">
              </div>
              <div class="auth-login text-center  position-relative">
                <input type="password" class="pe-5 form-control" placeholder="رمز المرور " v-model="password"> <!-- Password -->
                <img class="img-lllo" style="width: 12px; position: absolute; right: 10px;"
                :src="base_url+'/assets/images/login-pass.svg'" alt="">
              </div>
              <div class="mt-3 d-flex align-items-center justify-content-between">
                <div>
                  <label for="">نسيت كلمة المرور ؟</label>
                </div>
                <div class="">
                  <label for="">تذكرني</label>
                  <input type="checkbox" style="vertical-align: middle;">
                </div>
              </div>
              <div>
                <button class="login-btn" @click.prevent="loginFun()">الدخول الان</button>
              </div>
              <div class="social-btn d-flex align-items-center justify-content-between" >
                <button>
                  فيس بوك 
                  <img 
                      style="width: 20px;"
                      :src="base_url+'/assets/images/login-facebook.svg'" alt="">
                </button>
                <button>
                  جوجل
                  <img style="width: 19px;" :src="base_url+'/assets/images/google-llc.png'" alt="">
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 login-page">
          <div class="text-center mt-5">
            <img style="width: 150px;" :src="base_url+'/assets/images/login-1-logo.svg'" alt="">
          </div>
        </div>
      </div>
</template>

<script>
import Navbar from '../../components/partials/LayoutNavBar.vue'
import api from "../../utils/api";

export default {
  components : { Navbar } ,
  data() {
    return {
      email: "",
      password: "",
      errors: null,
      base_url:base_url,
    };
  },
  methods:{
    loginFun() {
          api
            .post("/login", {
              email: this.email,
              password: this.password,
            })
            .then((response) => {
              let token = response.data.data.access_token ;
              // saving token to localSorage 
              localStorage.setItem("token", token );
              alert("Loggened Successfully");
              // route for u_index page
              this.$router.push({ name: "profilePage" });
            })
            // error.response.data.errors
            .catch((e) => {
              this.errors = e.response.data.errors;
              // if (e.response.data.errors) {
              //   this.errors = e.response.data.errors;
              // } else {
              //   alert(e.response.data["message"]);
              //   this.errors = null;
              // }
            });
    },
  }
}
</script>