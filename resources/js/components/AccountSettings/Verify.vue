<template>
    <div class="row w-100 mx-0 px-0">
        <div class="col-md-6 px-0 ">
          <div class="p-5">
            <div class="text-center mt-5">
              <img style="width: 100px;" :src="base_url+'/assets/images/login-1-logo.svg'" alt="">
            </div>
            <div class="register text-center  ">
              
              <h3 class="my-5">  {{ $root._t("app.make_sure_about_mobile") }}  </h3>

            
            </div>
            <form action="" class="login-form text-center" style="max-width: 400px;margin: auto;">
              <small class="d-inline-block mb-4 text-end mx-auto" 
                style="max-width: 300px; color: #0995eb;">
                {{ $root._t("app.verify_message_sent") }}
              </small>
              <div class="number-active d-flex flex-wrap justify-content-between"
                style="max-width:350px;margin:auto">
                <input type="text" placeholder="0">
                <input type="text" placeholder="0">
                <input type="text" placeholder="0">
                <input type="text" placeholder="0">
                <input type="text" placeholder="0">
              </div>
              <div style="max-width: 350px;" class="mx-auto">
                <button class="login-btn mt-5" @click.prevent="verify()"> {{ $root._t("app.verify_mobile") }} </button>
              </div>
              <div class="social-btn d-flex align-items-center justify-content-between" >
                
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 login-page">
          <div class="text-center mt-5">
            <img style="width: 150px;" :src="base_url+'/assets/images/login-logo.svg'" alt="">
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
    verify(){
      this.$router.push({ name: "Success" });
    }
  }
}
</script>