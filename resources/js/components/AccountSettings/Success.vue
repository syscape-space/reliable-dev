<template>
    <div class="row w-100 mx-0 px-0">
        <div class="col-md-6 px-0 ">
          <div class="p-5">
            <div class="text-center mt-5">
              <img style="width: 100px;" :src="base_url+'/public/assets/images/login-1-logo.svg'" alt="">
            </div>
            <div class="register text-center  ">
              
              <h3 class="my-5 fw-bold">  {{ $root._t("app.verification_done") }} </h3>
              <div style="max-width: 350px;" class="mx-auto">
                <button class="login-btn " style="margin-top: 200px;" @click.prevent="goToLogin()">   
                  {{ $root._t("app.login") }}  
                </button>
              </div>
            
            </div>
          
          </div>
        </div>
        <div class="col-md-6 login-page">
          <div class="text-center mt-5">
            <img style="width: 150px;" :src="base_url+'/public/assets/images/login-logo.svg'" alt="">
          </div>
        </div>
      </div>
</template>
<script>
export default {
  data(){
    return{
      base_url : base_url
    }
  },
    methods:{
        goToLogin(){
            this.$router.push({ name: "Login" });
        }
    }
}
</script>