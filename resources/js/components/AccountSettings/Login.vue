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
              <p class="my-4 "> {{ $root._t("app.do_you_have_account") }}
                <router-link :to="{name:'Register'}"
                  href="#"
                  style="color: #048e81;"  
                class=""> {{ $root._t("app.create_account_now") }} </router-link></p>
              <h3 class="mb-4">  {{ $root._t("app.login") }} </h3>
            
            </div>
            <form action="" class="login-form text-center" style="max-width: 400px;margin: auto;">
              <small class="d-inline-block mb-4 text-end mx-auto" 
                style="max-width: 300px; color: #0995eb;">
                {{ $root._t("app.folow_instructions") }}
              </small>
              <!--- Error Will Validate Here -->
              <div class="errors">
                <div class="alert alert-danger" v-for="error in errors" :key="error">
                  <strong>{{ error }}</strong>
                </div>
              </div>
              <div class="auth-login mb-4 text-center  position-relative">
                <input type="number" class="pe-5 form-control" placeholder="   رقم التحقق" v-model="id_number"> <!-- Phone number -->
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
                  <label for=""> {{ $root._t("app.do_you_forget_password") }}  </label>
                </div>
                <div class="">
                  <label for=""> {{ $root._t("app.remember_me") }} </label>
                  <input type="checkbox" style="vertical-align: middle;">
                </div>
              </div>
              <div>
                <button class="login-btn" @click.prevent="loginFun()"> {{ $root._t("app.login_now") }} </button>
              </div>
              <div class="social-btn d-flex align-items-center justify-content-between" >
                <button>
                  {{ $root._t("app.facebook") }} 
                  <img 
                      style="width: 20px;"
                      :src="base_url+'/assets/images/login-facebook.svg'" alt="">
                </button>
                <button>
                  {{ $root._t("app.google") }} 
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
      id_number: "",
      password: "",
      errors: null,
      base_url:base_url,
    };
  },
  methods:{
    loginFun() {
          api
            .post("/v2/login", {
              id_number: this.id_number,
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