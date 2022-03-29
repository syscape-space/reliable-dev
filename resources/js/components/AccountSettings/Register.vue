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
              {{ $root._t("app.already_have_account") }} ?
            <router-link :to="{name:'Login'}" style="color: #048e81" class=""> {{ $root._t("app.login") }} </router-link>
          </p>
          <h3 class="mb-4"> {{ $root._t("app.register") }} </h3>
        </div>
        <form
          action=""
          class="login-form text-center"
          style="max-width: 400px; margin: auto"
        >
          <small
            class="d-inline-block mb-4 text-end mx-auto"
            style="max-width: 300px; color: #0995eb"
            >
            {{ $root._t("app.folow_instructions") }}
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
              type="number"
              class="pe-5 form-control"
              placeholder="id number"
              v-model="id_number"
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
            <button class="login-btn" @click.prevent="registerFun()"> {{ $root._t("app.create_account") }} </button>
          </div>
          <div
            class="social-btn d-flex align-items-center justify-content-between"
          >
            <button>
              {{ $root._t("app.facebook") }}
              <img
                style="width: 20px"
                :src="base_url+'/assets/images/login-facebook.svg'"
                alt=""
              />
            </button>
            <button>
              {{ $root._t("app.google") }}
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
    <div class="col-md-6 login-page" id="pageLoginImage2">
      <div class="text-center mt-5">
        <img style="width: 150px" :src="base_url+'/assets/images/login-logo.svg'" alt="" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Navbar from "../../components/partials/LayoutNavBar.vue";
import api from "../../utils/api";

export default {
  components: { Navbar },
  name: "Register",
  data() {
    return {
      name : "" ,
      firstname : "" ,
      midname : "" ,
      lastname : "" ,
      mobile: "",
      email: "",
      password: "",
      id_number : "" ,
      errors: null , 
      base_url : base_url
    };
  },
  methods: {
     
    registerFun() {

      let Fullname = this.name ;
      let ourNameSplitter = Fullname.split(" ");
      if( ourNameSplitter.length === 1){
        this.firstname = ourNameSplitter[0];
        this.midname = null ;
        this.lastname = null ;
      }else if( ourNameSplitter.length === 2 ){
        this.firstname = ourNameSplitter[0];
        this.midname = ourNameSplitter[1];
        this.lastname = null ;
      }else{
        this.firstname = ourNameSplitter[0];
        this.midname = ourNameSplitter[1];
        this.lastname = ourNameSplitter[2];
      }

      api
        .post("/v2/register", {
          name : this.name ,
          first_name : this.firstname ,
          middle_name : this.midname , 
          last_name : this.lastname ,
          mobile: this.mobile,
          email: this.email,
          id_number : this.id_number ,
          password: this.password,
        } )
        .then((response) => {

          this.$root.alertSuccess("Account is created");
          
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
