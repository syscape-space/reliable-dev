<template>
  <div class="container">
    <Navbar />
  </div>
  <div class="row w-100 mx-0 px-0">
    <div class="col-md-6 px-0">
      <div class="p-5">
        <div class="text-center mt-5">
          <img
            style="width: 100px"
            :src="base_url+'/assets/images/login-1-logo'.svg"
            alt=""
          />
        </div>
        <div class="register text-center">
          <p class="my-4">
            ليس لديك حساب؟
            <a href="#" style="color: #048e81" class="">قم بانشاء حساب الان</a>
          </p>
          <h3 class="mb-4">تسجيل الدخول</h3>
        </div>
        <form
          action=""
          class="login-form text-center"
          style="max-width: 400px; margin: auto"
        >
          <small
            class="d-inline-block mb-4 text-end mx-auto"
            style="max-width: 300px; color: #0995eb"
            >اتبع التعليمات لتسهيل عملية التسجيل وستكون كذلك قادرة على استكشاف
            الداخل.
          </small>
          <!--- Error Will Validate Here -->
          <div class="errors">
            <div class="alert alert-danger" v-for="error in errors" :key="error">
              <strong>{{ error }}</strong>
            </div>
          </div>
            <div class="auth-login mb-4 text-center position-relative">
            <input
              type="text"
              class="pe-5 form-control"
              placeholder="الاسم"
              v-model="name"
            />
            <img
              class="img-lllo"
              style="width: 20px; position: absolute; right: 10px"
              :src="base_url+'/assets/images/login-user.svg'"
              alt=""
            />
          </div>
          <div class="auth-login mb-4 text-center position-relative">
            <input
              type="text"
              class="pe-5 form-control"
              placeholder="رقم الجوال"
              v-model="mobile"
            />
            <img
              class="img-lllo"
              style="width: 20px; position: absolute; right: 10px"
              :src="base_url+'/assets/images/login-user.svg'"
              alt=""
            />
          </div>
          <div class="auth-login mb-4 text-center position-relative">
            <input
              type="text"
              class="pe-5 form-control"
              placeholder="   البريد الالكتروني"
              v-model="email"
            />
            <img
              class="img-lllo"
              style="width: 29px; position: absolute; right: 10px"
              :src="base_url+'/assets/images/email-login.svg'"
              alt=""
            />
          </div>
          <div class="auth-login text-center position-relative">
            <input
              type="password"
              class="pe-5 form-control"
              placeholder="رمز المرور "
              v-model="password"
            />
            <img
              class="img-lllo"
              style="width: 12px; position: absolute; right: 10px"
              :src="base_url+'/assets/images/login-pass.svg'"
              alt=""
            />
          </div>

          <div>
            <button class="login-btn" @click.prevent="registerFun()">انشاء حساب</button>
          </div>
          <div
            class="social-btn d-flex align-items-center justify-content-between"
          >
            <button>
              فيس بوك
              <img
                style="width: 20px"
                :src="base_url+'/assets/images/login-facebook.svg'"
                alt=""
              />
            </button>
            <button>
              جوجل
              <img
                style="width: 19px"
                :src="base_url+'/assets/images/google-llc.png'"
                alt=""
              />
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-6 login-page">
      <div class="text-center mt-5">
        <img style="width: 150px" :src="base_url+'/assets/images/login-logo.svg'" alt="" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Navbar from "../../components/partials/LayoutNavBar.vue";

export default {
  components: { Navbar },
  name: "Register",
  data() {
    return {
      name : "" ,
      mobile: "",
      email: "",
      password: "",
      errors: null
    };
  },
  methods: {
     
    registerFun() {

      axios
        .post("https://law-mawthuq.com/reliable/public/api/v2/register", {
          name : this.name ,
          mobile: this.mobile,
          email: this.email,
          password: this.password,
        } )
        .then((response) => {

          alert("Account is created");
          
          let token = response.data.data.access_token ;
          // saving token to localSorage 
          localStorage.setItem("token", token );
          // route for u_index page
          this.$router.push({ name: "profilePage" });
        })
        
        .catch((e) => {
          this.success = "" ;
          this.errors = e.response.data.errors;
        });
    },
  },
};
</script>
